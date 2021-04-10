@extends('user.v_template')
@section('title','Khutbah')
@section('content')

<div id="pricing" class="pricing-area area-padding">
    <div class="container">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Jadwal Khutbah Jumat</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach ($khutbah as $k)
                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 5px;">
                        <div class="card" style="width: 100%; height: 100%;">
                            <div class="card-header" style="height: 25%;">
                                <h5 class="card-title text-center" style="font-weight: bold;"><i class="fa fa-calendar"></i> {{$k->tgl}}</h5>
                            </div>
                            <div class="card-body">
                              <a class="btn btn-success btn-sm"><i class="fa fa-bullhorn"></i> Pembicara</a>
                              <h5>{{$k->name}}</h5>
                              <a class="btn btn-primary btn-sm"><i class="fa fa-tags"></i> Topik</a>
                              <p>{{$k->topik}}</p>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-5 text-center">
                        {{ $khutbah->links('vendor.pagination.custom') }}
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('sholat-menu-active')
active
@endsection