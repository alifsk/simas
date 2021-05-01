@extends('user.v_template')
@section('title','Pemasukan')
@section('content')

<div class="container" style="margin: 7%;">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pemasukan Kas Masjid</h2>
                    </div>
                </div>
            </div>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>&nbsp; Total Pemasukan Kas Masjid</h4>
                <h1>{{$total_pemasukan}},-</h1>
            </div>
        </div>
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

@endsection

@section('extendsjs')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).ready(function() {
        $('#tablePemasukan').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            responsive: true,
            ajax: {
                url: "{{ route('user/pemasukan') }}",
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
            ],
            order: [
                [0, 'asc']
            ]
        });
    });
</script>
@endsection

@section('kas-menu-active')
active
@endsection