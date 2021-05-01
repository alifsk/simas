@extends('admin.v_template')
@section('title','Zakat')
@section('content')

<div class="container-wrapper">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="tableZakat" class="table-responsive table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Zakat</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MULAI MODAL FORM TAMBAH/EDIT-->
<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="modal-judul"></h5>
            </div>
            <div class="modal-body">
                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Jenis Zakat</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="jenis_zakat_id" id="jenis_zakat_id">
                                        @foreach($jenis_zakat as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Tanggal</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Pembayar</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="pembayar" name="pembayar" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Keterangan</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 15px;">Kembali</button>
                                <button type="submit" class="btn btn-primary pull-right" id="tombol-simpan" value="create" style="margin-right: 15px;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer"></div> -->
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->

<!-- MULAI MODAL KONFIRMASI DELETE-->
<div class="modal modal-default-sm fade" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERHATIAN</h4>
            </div>
            <div class="modal-body">
                <p style="text-align: center;"><b>Apakah Anda Yakin?</b></p>
                <p style="text-align: center;">Setelah dihapus, Anda tidak akan dapat memulihkan data ini!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>

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
        $('#modal-judul').html("Tambah Data Baru"); //valuenya tambah pegawai baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
    });

    $(document).ready(function() {
        $('#tableZakat').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            responsive: true,
            ajax: {
                url: "{{ route('zakat.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nama',
                    name: 'jenis_zakat.nama'
                },
                {
                    data: 'tgl',
                    name: 'tgl'
                },
                {
                    data: 'pembayar',
                    name: 'pembayar'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
    //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
    //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
    if ($("#form-tambah-edit").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function(form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                    url: "{{ route('zakat.store') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function(data) { //jika berhasil 
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var table = $('#tableZakat').dataTable(); //inialisasi datatable
                        table.fnDraw(false); //reset datatable
                        swal({
                            title: "Kerja Bagus!",
                            text: "Data Berhasil disimpan.",
                            icon: "success",
                        });
                    },
                    error: function(data) { //jika error tampilkan error pada console
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var table = $('#tableZakat').dataTable(); //inialisasi datatable
                        table.fnDraw(false); //reset datatable
                        swal({
                            title: "Gagal!",
                            text: "Data Tidak Berhasil disimpan.",
                            icon: "error",
                        });
                    }
                });
            }
        })
    }

    //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
    //ketika class edit-post yang ada pada tag body di klik maka
    $('body').on('click', '.edit-post', function() {
        var data_id = $(this).data('id');
        $.get('zakat/' + data_id + '/edit', function(data) {
            $('#modal-judul').html("Edit Data Pembayaran Zakat");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');

            //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
            $('#id').val(data.id);
            $('#jenis_zakat_id').val(data.jenis_zakat_id);
            $('#tgl').val(data.tgl);
            $('#pembayar').val(data.pembayar);
            $('#keterangan').val(data.keterangan);
        })
    });

    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
    $(document).on('click', '.delete', function() {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
    });

    //jika tombol hapus pada modal konfirmasi di klik maka
    $('#tombol-hapus').click(function() {
        $.ajax({

            url: "zakat/" + dataId, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function() {
                $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
            },
            success: function(data) { //jika sukses
                setTimeout(function() {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var table = $('#tableZakat').dataTable();
                    table.fnDraw(false); //reset datatable
                });
                swal("Data Berhasil dihapus!", {
                    icon: "success"
                });
            }
        })
    });

    $(document).on('click', '.print', function() {
        dataId = $(this).attr('id');
        // $('#konfirmasi-modal').modal('show');
    });
</script>
@endsection