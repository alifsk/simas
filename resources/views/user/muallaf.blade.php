@extends('user.v_template')
@section('title','Muallaf')
@section('content')

<div class="container" style="margin: 7%;">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Muallaf Center</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="well-left">
                    <div class="single-well">
                        <h3 class="section-headline text-center">SOP Pelayanan Muallaf</h3>
                        <hr>
                        <ol>
                            <li>Pendaftaran</li>
                            <ul style="margin-left: 2px;">
                                <li> - Mengisi buku tamu</li>
                                <li> - Mengisi form permohonan</li>
                                <li> - Melengkapi persyaratan :</li>
                                <ol>
                                    <li> 1. Pas Foto 3 x 4 : 3 Lembar (background merah)</li>
                                    <li> 2. Surat Pengantar dari RT bagi WNI</li>
                                    <li> 3. Foto Copy KTP</li>
                                    <li> 4. Foto Copy KK</li>
                                    <li> 5. Materai 6000 : 2 Lembar</li>
                                    <li> 6. Menyerahkan Surat Baptis (Asli)</li>
                                    <li> 7. Foto Copy Pasport bagi WNA</li>
                                    <li> 8. Saksi 2 (dua) orang muslim</li>
                                    <li> 9. Foto Copy KTP Saksi 2 Orang (dibawa)</li>
                                </ol>
                            </ul>
                            <li>Verifikasi berkas oleh petugas</li>
                            <li>Persetujuan Pengislaman oleh Pimpinan (Kabid / Wakabid / Kasubid)</li>
                            <li>Proses pengislaman</li>
                                <ul>
                                    <li> - Pembimbing</li>
                                    <li> - Calon Muallaf</li>
                                    <li> - Saksi 2 orang</li>
                                </ul>
                            <li>Tandatangan berkas / Sertifikat</li>
                            <li>Waktu Jam : 09.00 – 15.00 Senin – Jum’at</li>
                            <li>Tempat Ruang Pelayanan Muallaf Masjid Ma'badul Muttaqin.</li>
                        </ol>
                    </div>
                  </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <h3 class="section-subheadline text-center">Persyaratan Masuk Islam</h3>
                            <hr>
                            <ol>
                                <li> Pas Foto 3 x 4 : 3 Lembar (background merah)</li>
                                <li> Surat Pengantar dari RT/RW bagi WNI</li>
                                <li> Foto Copy KTP</li>
                                <li> Foto Copy KK</li>
                                <li> Materai 6000 : 2 Lembar</li>
                                <li> Menyerahkan Surat Baptis (Asli)</li>
                                <li> Foto Copy Pasport bagi WNA</li>
                                <li> Saksi 2 (dua) orang muslim</li>
                                <li> Foto Copy KTP Saksi 2 Orang (dibawa)</li>
                                <li> Mengisi Surat Permohonan Masuk Islam</li>
                                <li> Waktu Jam : 09.00 – 15.00 Senin – Jum’at</li>
                                <li> Tempat Ruang Pelayanan Muallaf Masjid Ma'badul Muttaqin.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- End misi-->
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <span>
                        <a href="javascript:void(0)" class="ready-btn" id="tombol-tambah">Daftar Mualaf</a>
                    </span>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<!-- MULAI MODAL FORM TAMBAH/EDIT-->
<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Nama Lengkap</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama" name="nama" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="jk" id="jk">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Tanggal lahir</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Agama  Sekarang</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="agama" name="agama" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="email" name="email" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Nomor KTP/Pasport</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="ktp" name="ktp" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Tempat Lahir</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="lahir" name="lahir" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Pekerjaan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Kebangsaan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="kebangsaan" name="kebangsaan" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Nomer HP</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="telp" name="telp" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="foto" class="col-sm-12">Foto</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" name="foto" id="foto">
                                    <span>catatan: latar belakang foto berwarna dengan maksimal ukuran 500 kb.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Sesuai KTP/Paspor"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="domisili" id="domisili" placeholder="Alamat Domisili"></textarea>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="col-sm-12">
                                    <input type="checkbox" class="form-check-input" id="pernyataan1" name="pernyataan1" value="Bahwa saya bermaksud untuk mengucapkan Dua Kalimat Syahadat sebagai tanda memeluk Agama Islam, serta akan menjalankan syariat Agama Islam dengan sebaik-baiknya." required>
                                    <label for="name">Bahwa saya bermaksud untuk mengucapkan Dua Kalimat Syahadat sebagai tanda memeluk Agama Islam, serta akan menjalankan syariat Agama Islam dengan sebaik-baiknya.</label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="col-sm-12">
                                    <input type="checkbox" class="form-check-input" id="pernyataan2" name="pernyataan2" value="Bahwa saya memeluk Agama Islam ini dengan sadar dan tulus, tanpa tekanan dari pihak manapun." required>
                                    <label for="name">Bahwa saya memeluk Agama Islam ini dengan sadar dan tulus, tanpa tekanan dari pihak manapun.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Apakah Anda Bersedia mengikuti program pembinaan setelah ikrar syahadat ?</label>
                                <div class="col-sm-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="Bersedia">
                                        <label class="form-check-label" for="inlineRadio1">Bersedia</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pernyataan3" id="pernyataan3" value="Tidak Bersedia">
                                        <label class="form-check-label" for="inlineRadio2">Tidak Bersedia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="btn btn-success" id="tombol-simpan" value="create">Daftar Mualaf</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->

@endsection

@section('extendsjs')
<script>
    // CSRF TOKEN PADA HEADER
    // Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //TOMBOL TAMBAH DATA
    //jika tombol-tambah diklik maka
    $('#tombol-tambah').click(function() {
        $('#button-simpan').val("create-post"); //valuenya menjadi create-post
        $('#id').val(''); //valuenya menjadi kosong
        $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
        $('#modal-judul').html("Daftar Mualaf"); //valuenya tambah pegawai baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
    });

    //Insert company data
    $("body").on("click","#tombol-tambah",function(e){
        e.preventDefault;
        $('#form-tambah-edit').html("Create company");
        $('#submit').val("Create company");
        $('#tambah-edit-modal').modal('show');
        $('#company_id').val('');
        $('#companydata').trigger("reset");
    });

    //Save data into database
    $('body').on('click', '#submit', function (event) {
        event.preventDefault()
        var id = $("#company_id").val();
        var name = $("#name").val();
        var address = $("#address").val();

        $.ajax({
        url: store,
        type: "POST",
        data: {
            id: id,
            name: name,
            address: address
        },
        dataType: 'json',
        success: function (data) {
            
            $('#companydata').trigger("reset");
            $('#modal-id').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                timer: 1500
            })
            get_company_data()
        },
        error: function (data) {
            console.log('Error......');
        }
        });
    });
</script>
@endsection