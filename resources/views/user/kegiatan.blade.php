@extends('user.v_template')
@section('title','Kegiatan')
@section('content')

<div id="pricing" class="pricing-area area-padding">
    <div class="container">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Kegiatan Masjid</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach ($kegiatan as $k)
                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 5px;">
                        <div class="card" style="width: 100%; height: 100%;">
                            <div class="card-header" style="height: 30%;">
                                <h5 class="card-title text-center" style="font-weight: bold;">{{$k->nama_kegiatan}}</h5>
                            </div>
                            <div class="card-body">
                              <a class="btn btn-success btn-sm"><i class="fa fa-calendar"></i> Tanggal</a>
                              <h5>{{$k->tgl}}</h5>
                              <a class="btn btn-primary btn-sm"><i class="fa fa-tags"></i> Deskripsi</a>
                              <p>{{$k->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-5 text-center">
                        {{ $kegiatan->links('vendor.pagination.custom') }}
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('kegiatan-menu-active')
active
@endsection