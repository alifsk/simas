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
              <h3 class="section-headline text-center">Visi</h3>
              <hr>
              @foreach ($visi as $v)
                  <p style="text-align: justify; text-justify: inter-word;">{{ $v->isi }}</p>
              @endforeach
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <h3 class="section-headline text-center">Misi</h3>
              <hr>
              <ol>
                @foreach ($misi as $m)
                  <li>
                    {{ $m->isi }}
                  </li>
                @endforeach
              </ol>
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