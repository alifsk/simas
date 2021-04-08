@extends('admin.v_template')
@section('title','Pemasukan')
@section('content')

<div class="container-wrapper">
    <div class="box">
        <div class="box-header">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Total Pemasukan Kas Masjid</h4>
                <h1>{{$total_pemasukan}},-</h1>
            </div>
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
                    <table id="tablePemasukan" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Sumber Dana</th>
                                <th>Jumlah</th>
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
                                <label for="tgl" class="col-sm-12">Tanggal</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="tgl_pemasukan" name="tgl_pemasukan" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-12">Sumber Dana</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="sumber_dana_id" id="sumber_dana_id">
                                        @foreach($sumber_dana as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="col-sm-12">Jumlah</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-12">Keterangan</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>
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
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->

<!-- MULAI MODAL KONFIRMASI DELETE-->
<div class="modal modal-danger fade" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PERHATIAN</h4>
            </div>
            <div class="modal-body">
                <p><b>Jika menghapus Pemasukan maka</b></p>
                <p>*data tersebut akan hilang selamanya, Apakah Anda Yakin?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" name="tombol-hapus" id="tombol-hapus">Hapus</button>
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
        $('#tablePemasukan').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            responsive: true,
            ajax: {
                url: "{{ route('pemasukan.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'tgl_pemasukan',
                    name: 'tgl_pemasukan'
                },
                {
                    data: 'nama',
                    name: 'sumber_dana.nama'
                },
                {
                    data: 'jumlah_pemasukan',
                    name: 'jumlah_pemasukan'
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
                    url: "{{ route('pemasukan.store') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function(data) { //jika berhasil 
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var table = $('#tablePemasukan').dataTable(); //inialisasi datatable
                        table.fnDraw(false); //reset datatable
                        swal({
                            title: "Kerja Bagus!",
                            text: "Data Berhasil disimpan.",
                            icon: "success",
                        });
                    },
                    error: function(data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                        $('#tombol-simpan').html('Simpan');
                    }
                });
            }
        })
    }

    //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
    //ketika class edit-post yang ada pada tag body di klik maka
    $('body').on('click', '.edit-post', function() {
        var data_id = $(this).data('id');
        $.get('pemasukan/' + data_id + '/edit', function(data) {
            $('#modal-judul').html("Edit Data Pemasukan");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');

            //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
            $('#id').val(data.id);
            $('#tgl_pemasukan').val(data.tgl_pemasukan);
            $('#sumber_dana_id').val(data.sumber_dana_id);
            $('#jumlah_pemasukan').val(data.jumlah_pemasukan);
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

            url: "pemasukan/" + dataId, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function() {
                $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
            },
            success: function(data) { //jika sukses
                setTimeout(function() {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var table = $('#tablePemasukan').dataTable();
                    table.fnDraw(false); //reset datatable
                });
                swal("Data Berhasil dihapus!");
            }
        })
    });
</script>
@endsection