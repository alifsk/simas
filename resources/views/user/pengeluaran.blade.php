@extends('user.v_template')
@section('title','Pengeluaran')
@section('content')
{{-- @extends('user.pemasukan') --}}

<div class="container" style="margin: 7%;">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pengeluaran Kas Masjid</h2>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>&nbsp; Total Pengeluaran Kas Masjid</h4>
                <h1>{{$total_pengeluaran}},-</h1>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="tablePengeluaran" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
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
        $('#tablePengeluaran').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            responsive: true,
            ajax: {
                url: "",
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'tgl_pengeluaran',
                    name: 'tgl_pengeluaran'
                },
                {
                    data: 'jumlah_pengeluaran',
                    name: 'jumlah_pengeluaran'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },

            ],
            order: [
                [0, 'desc']
            ]
        });
    });
</script>
@endsection

@section('kas-menu-active')
active
@endsection