@extends('admin.v_template')
@section('title','Laporan Rekapitulasi')
@section('content')

<div class="container-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Pemasukan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-vertical" action="{{ route('cetak_pemasukan') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body box-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tglAwal" id="tglAwal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tglAkhir" id="tglAkhir">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {{-- <a href="pemasukan/print" class="btn btn-primary" onclick="this.href='cetak_pertanggal/'+document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value" target="_blank"><i class="icon fa fa-print"></i> Cetak</a> --}}
                        <button type="submit" class="btn btn-primary" formtarget="_blank"><i class="icon fa fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- form pengeluaran -->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengeluaran</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-vertical" action="{{ route('cetak_pengeluaran') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body box-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tglAwal" id="tglAwal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tglAkhir" id="tglAkhir">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" formtarget="_blank"><i class="icon fa fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection