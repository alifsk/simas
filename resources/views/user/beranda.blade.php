@extends('user.v_template')
@section('title','Beranda')
@section('content')

<!-- ======= About Section ======= -->
<div id="beranda" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Visi & Misi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <h1 class="sec-head">Visi</h1>
              @foreach ($visi as $v)
                  <p>{{ $v->isi }}</p>
              @endforeach
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <h1 class="sec-head">Misi</h1>
              <ul>
                @php( $no = 1 )
                @foreach ($misi as $m)
                  <li>
                    <p>{{$no++}}.&nbsp;{{ $m->isi }}</p>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- End misi-->
      </div>
    </div>
</div><!-- End About Section -->

@endsection

@section('home-menu-active')
active
@endsection