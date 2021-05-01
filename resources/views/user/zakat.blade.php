@extends('user.v_template')
@section('title','Layanan')
@section('content')

<!-- ======= About Section ======= -->
<div id="beranda" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                  <h2>Unit Pelayanan Zakat</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12 text-center">
                <div class="well-middle">
                    <div class="single-well">
                        <img src="{{ url('foto/baznas.png')}}" class="center">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="well-middle">
                    <div class="single-well">
                        <center><h3>Visi</h3></center>
                        <hr width ="20%">
                        <p style="text-align: justify; text-justify: inter-word;">Menjadikan Unit Pelayanan Zakat Baznas Masjid Ma'badul Muttaqin sebagai lembaga pengumpul zakat berbasis Masjid yang amanah dan professional.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="well-middle">
                    <div class="single-well">
                        <center><h3>Misi</h3></center>
                        <hr width ="20%">
                        <ol>
                            <li>Meningkatkan kesadaran umat untuk berzakat melalui amil zakat, sekaligus membimbing umat menuju ibadah kepada Allah SWT.</li>
                            <li>Sebagai pengumpul zakat, sekaligus pengelolaan keuangan masjid yang akuntabel.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="well-middle">
                    <div class="single-well">
                        <center><h3>Dasar Hukum</h3></center>
                        <hr width ="50%">
                        <p style="text-align: justify; text-justify: inter-word;">Berdasarkan Keputusan Ketua Badan Amil Zakat Nasional Nomor 46 Tahun 2018 tentang Pembentukan Unit Pengumpul Zakat Badan Amil Zakat Nasional Masjid Ma'badul Muttaqin.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-lg-6">
                <div class="well-middle">
                    <div class="single-well">
                        <center><h3>Jaringan Muzakki</h3></center>
                        <hr width ="50%">
                        <ol>
                            <li>Jamaah dan pengunjung Masjid Ma'badul Muttaqin</li>
                            <li>Pengusaha atau Individu</li>
                            <li>Lembaga Pemerintahan dan Swasta</li>
                            <li>Mushola-mushola</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                        <center><h3>Pembayaran Zakat, Infak, Sedekah</h3></center>
                        <hr>
                        <p style="text-align: justify; text-justify: inter-word;">Menunaikan zakat dan infak secara langsung dengan menemui amil zakat juga menjadi salah satu pilihan bagi donatur. BAZNAS Masjid Ma'badul Muttaqin melayani pembayaran zakat, infak, sedekah berupa cash. Untuk pembayaran zakat fitrah akan dimulai diawal bulan ramadhan sampai dengan h-2 idul fitri.</p>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i> Tempat: Ruang Pelayanan (Sebelah Barat Tempat Wudhu Wanita)
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i> Hari: Senin - Jumat
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i> Waktu: 09.00 - 15.00 WIB
                            </li>
                            <li>
                                <i class="fa fa-phone-square"></i> Telp: +6285646023469
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                        <h3 class="section-headline text-center">SOP Pelayanan Zakat</h3>
                        <hr>
                        <ol>
                            <li>Mengisi Buku Tamu</li>
                            <li>Memilih Jenis Zakat</li>
                            <ul>
                                <li> - Zakat Mal:</li>
                                <ol>
                                    <li> - Konsultasi pembayaran dengan Amil Zakat berdasarkan</li>
                                    <li> - Menyiapkan uang pembayaran sesuai dengan nominal yang telah ditentukan</li>
                                </ol>
                                <li> - Zakat Fitrah</li>
                                <ol>
                                    <li> - Beras 2,5 kg atau 3,5 liter per orang</li>
                                    <li> - Uang tunai Rp 40.000 per orang</li>
                                </ol>
                            </ul>
                            <li>Melakukan Pembayar Zakat</li>
                            <li>Melakukan Ijab Kabul Zakat</li>
                            <li>Tanda Tangan Bukti Pembayaran Zakat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End About Section -->

@endsection

@section('layanan-menu-active')
active
@endsection