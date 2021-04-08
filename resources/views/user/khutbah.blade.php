@extends('user.v_template')
@section('title','Khutbah Jumat')
@section('content')

<div class="container" style="margin: 7%;">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Jadwal Khutbah Jumat</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="tableKhutbah" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 10%;">No</th>
                                <th style="width: 20%;">Tanggal</th>
                                <th style="width: 25%;">Nama Pembicara</th>
                                <th style="width: 45%;">Topik</th>
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
        $('#tableKhutbah').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side
            responsive: true,
            ajax: {
                url: "{{ route('user\khutbah.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'tgl',
                    name: 'tgl'
                },
                {
                    data: 'name',
                    name: 'users.name'
                },
                {
                    data: 'topik',
                    name: 'topik'
                },

            ],
            order: [
                [0, 'asc']
            ]
        });
    });
</script>
@endsection