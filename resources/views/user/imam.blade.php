@extends('user.v_template')
@section('title','Jadwal Imam Sholat')
@section('content')

<div class="container" style="margin: 7%;">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Imam dan Muadzin Masjid</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 table-responsive">
                    <table id="tableImam" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Hari</th>
                                <th scope="col">Imam</th>
                                <th scope="col">Muadzin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imam as $i)
                            <tr>
                                <td>{{ $i->hari }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->muadzin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h5>Jadwal Sholat</h5>
                    <hr>
                    <form action="{{ route('result') }}" method="GET">
                        <div class="form-group">
                            <label for="city">Pilih Kabupaten/Kota</label>
                            <select class="form-control" name="city" id="city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city['id'] }}">{{ $city['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Pilih Tanggal</label>
                            <input type="date" name="time" id="time" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
@section('extendsjs')
<script>
    $('#time').datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
</script>
@endsection