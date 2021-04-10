@extends('user.v_template')
@section('title','Gallery')

@section('content')
<!-- ======= Portfolio Section ======= -->
<div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Dokumentasi Kegiatan</h2>
                </div>
            </div>
        </div>
        <div class="row wesome-project-1 fix">
            <!-- Start Portfolio -page -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="awesome-menu ">
                    <ul class="project-menu">
                        <li>
                            <a href="#" class="active" data-filter="*">All</a>
                        </li>
                        @foreach($jenis_kegiatan as $data_jenis)
                        <li>
                            <a href="#" data-filter=".<?= str_replace(' ', '-', $data_jenis->nama) ?>">{{ $data_jenis->nama }}</a>
                        </li>
                        @endforeach
                        {{--<li>
                            <a href="#" data-filter=".development">Development</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".design">Design</a>
                        </li>
                        <li>
                            <a href="#" data-filter=".photo">Photoshop</a>
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="row awesome-project-content">
            <!-- single-awesome-project start -->
            @foreach($kegiatan as $data_kegiatan)
            <div class="col-md-4 col-sm-4 col-xs-12 <?= str_replace(' ', '-', $data_kegiatan->category) ?>">
                <div class="single-awesome-project">
                    <div class="awesome-img">
                        <a href="#">
                            <img src="{{ Storage::url('detailKegiatan/'.$data_kegiatan->image) }}" alt="{{ $data_kegiatan->name }}" class="img-custom-gallery" />
                        </a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                                <a class="venobox custom-venobox d-flex align-items-center justify-content-center" data-gall="myGallery" href="{{ Storage::url('detailKegiatan/'.$data_kegiatan->image) }}">
                                    <div>
                                        <h4>{{ $data_kegiatan->name }}</h4>
                                        <span>{{ $data_kegiatan->category }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- single-awesome-project end -->
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                {{ $kegiatan->links('vendor.pagination.custom') }}
            </div>                            
        </div>
    </div>
</div><!-- End Portfolio Section -->

@endsection

@section('gallery-menu-active')
active
@endsection

@push('styles')
<style>
    .img-custom-gallery {
        width: 100%; 
        aspect-ratio: 1 / 1; 
        object-fit: cover;
    }
    .custom-venobox {
        width: 100%;
        height: 100%;
        aspect-ratio: 1 / 1;
    }
    .project-dec .custom-venobox div h4 {
        padding-top: 0 !important;
        margin-top: 0 !important;
    }
</style>
@endpush