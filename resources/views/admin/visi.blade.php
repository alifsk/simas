@extends('admin.v_template')
@section('title','Visi')
@section('content')

<div class="container-wrapper">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-12">
                    @if($jumlah_visi == 0)
                    <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($visi as $v)
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            {{ $v->isi }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                    <button class="edit btn btn-success" id="btn-edit" data-id="{{ $v->id }}"><i class="fa fa-pencil-square-o"></i> Edit</button>
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
                                <label for="visi" class="col-sm-12">Visi</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="isi" id="isi"></textarea>
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
        $('#modal-judul').html("Tambah Data Visi"); //valuenya tambah pegawai baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
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
                    url: "{{ route('visi.store') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function(data) { //jika berhasil 
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var table = $('#tableVisi').dataTable(); //inialisasi datatable
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
    $('#btn-edit').on('click', function() {
        var data_id = $(this).data('id');
        $.get('visi/' + data_id + '/edit', function(data) {
            $('#modal-judul').html("Edit Data Visi");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');

            //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
            $('#id').val(data.id);
            $('#isi').val(data.isi);
        })
    });
</script>
@endsection