@extends('admin.v_template')
@section('title','Dashboard')

@section('content')
<div class="container-wrapper">
    <div class="box">
        <div class="box-body">
            <div class="row">
                {{-- @if (auth()->user()->level == 1) --}}
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h2>{{ $total_pemasukan }}</h2>

                                <p>Pemasukan Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h2>{{ $total_pengeluaran }}</h2>

                                <p>Pengeluaran Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h2>{{ $saldo }}</h2>

                                <p>Saldo Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('pemasukan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h2>{{ $user }}</h2>

                                <p>Pengguna</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                {{-- @elseif (auth()->user()->level == 2)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h2>{{ $total_pemasukan }}</h2>

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
                                <h2>{{ $total_pengeluaran }}</h2>

                                <p>Pengeluaran Kas Masjid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h2>{{ $zakat }}</h2>

                                <p>zakat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('zakat.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif --}}
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
            console.log(result);

            var databulan = [];
            var datatotal = [];
           for(var i=0; i<result.length; i++) {
               databulan[i] = result[i]['bulan'];
               datatotal[i] = parseInt(result[i]['total']);
           }
           console.log(databulan);
           console.log(datatotal);
           if($('#chartPemasukan').length) {
               var date = new Date();
               Highcharts.chart('chartPemasukan', {
                   chart: {
                       type: 'column'
                   },
                   title: {
                       text: 'Grafik Pengeluaran Masjid ' + date.getFullYear()
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
                   series:[ {
                       name: 'Pengeluaran',
                       data: datatotal
                   }]
               });
           }
        }
    });
})
</script>
@endsection