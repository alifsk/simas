@extends('admin.v_template')
@section('title','Dashboard')

@section('content')
<div class="container-wrapper">
    <div class="box">
        <div class="box-body">
            <div class="row">
                @if (auth()->user()->level == 2)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $total_pemasukan }}</h3>

                                <p>Pemasukan Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('pemasukan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $total_pengeluaran }}</h3>

                                <p>Pengeluaran Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-pie"></i>
                            </div>
                            <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $saldo }}</h3>

                                <p>Saldo Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-information-circled"></i>
                            </div>
                            <a href="{{ route('pemasukan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3>{{ $zakat }}</h3>

                                <p>Zakat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cash"></i>
                            </div>
                            <a href="{{ route('zakat.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @elseif (auth()->user()->level == 1)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h3>{{ $khutbah }}</h3>

                                <p>Jadwal</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-time-outline"></i>
                            </div>
                            <a href="{{ route('khutbah.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3>{{ $kegiatan }}</h3>

                                <p>Kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-easel"></i>
                            </div>
                            <a href="{{ route('kegiatan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3>{{ $kegiatan }}</h3>

                                <p>Kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-image"></i>
                            </div>
                            <a href="{{ route('detail_kegiatan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $user }}</h3>

                                <p>Pengguna</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('pengguna.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Statistik Kas Masjid</h3>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive" id="chartPemasukan">
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extendsjs')
<!-- Highchart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url         : "chart",
            type        : "GET",
            dataType    : "JSON",
            success     : function(result) {

                var databulan = [];
                var datapemasukan = [];
                var datapengeluaran = [];

                for(var i = 0; i < result.result_data.length; i++) {
                    databulan[i] = convertMonths(result.result_data[i]['bulan']);
                    datapemasukan[i] = parseInt(result.result_data[i]['data_pemasukan']);
                    datapengeluaran[i] = parseInt(result.result_data[i]['data_pengeluaran']);
                }

                if($('#chartPemasukan').length) {
                    var date = new Date();
                    Highcharts.chart('chartPemasukan', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Grafik Kas Masjid ' + date.getFullYear()
                        },
                        xAxis: {
                            categories: databulan,
                            title: {
                                text: 'Bulan'
                            },
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah (Rp)'
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        colors: ['#00a65a', '#f56954'],
                        series:[ 
                            {
                                name: 'Pemasukan',
                                data: datapemasukan
                            },
                            {
                                name: 'Pengeluaran',
                                data: datapengeluaran
                            }
                        ]
                    });
                }
            }
        });

        function convertMonths(data) {
            if ( data === 1 ) {
                return 'Jan'
            } else if ( data === 2) {
                return 'Feb'
            } else if ( data === 3) {
                return 'Mar'
            } else if ( data === 4) {
                return 'Apr'
            } else if ( data === 5) {
                return 'May'
            } else if ( data === 6) {
                return 'Jun'
            } else if ( data === 7) {
                return 'Jul'
            } else if ( data === 8) {
                return 'Aug'
            } else if ( data === 9) {
                return 'Sep'
            } else if ( data === 10) {
                return 'Oct'
            } else if ( data === 11) {
                return 'Nov'
            } else if ( data === 12) {
                return 'Des'
            }
        }
    })
</script>
@endsection