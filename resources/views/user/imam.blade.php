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
                    <form id="form-imam-sholat">
                        <div class="form-group">
                            <label for="city">Pilih Kabupaten/Kota</label>
                            <select class="form-control" name="city" id="city" required>
                                <option value="">Select Location</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city['id'] }}-{{ $city['nama'] }}">{{ $city['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Pilih Tanggal</label>
                            <input type="date" name="time" id="time" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-success btn-imam-submit" id="btn-imam-submit">Cari</button>
                        <button type="button" class="btn btn-secondary btn-imam-reset" id="btn-imam-reset">Reset</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="imam-info text-secondary" id="imam-info">Please select your location and date to see the prayer schedule</div>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="imam-loading d-none" id="imam-loading">
                        Loading, please wait
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h6 city_name font-weight-bold" id="city-name"></div>
                    <div class="h6 date-text font-weight-bold" id="date-text"></div>
                    <table class="table table-imam d-none mt-5" id="table-imam">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Subuh</th>
                                <th scope="col">Dhuha</th>
                                <th scope="col">Dzuhur</th>
                                <th scope="col">Ashar</th>
                                <th scope="col">Maghrib</th>
                                <th scope="col">Isya'</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="imam-error text-danger d-none" id="imam-error">Error when get your data, please try again</div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

@push('styles')
<style>
    /* Jadwal Sholat loading */
    @keyframes blink {
        50% { 
            color: transparent
        }
    }
    .imam-loading .loader__dot { 
        font-weight: 600;
        animation: 1s blink infinite
    }
    .imam-loading .loader__dot:nth-child(2) { 
        animation-delay: 250ms; 
    }
    .imam-loading .loader__dot:nth-child(3) { 
        animation-delay: 500ms;
    }
</style>
@endpush

@section('extendsjs')
<script>
    // Initiation variables
    var form_imam = $('#form-imam-sholat'),
        imam_loading = $('#imam-loading'),
        imam_error = $('#imam-error'),
        imam_info = $('#imam-info'),
        table_imam = $('#table-imam'),
        locations = $('#city'),
        times = $('#time'),
        city_name = $('#city-name'),
        date_text = $('#date-text')

    $(document).ready(function() {
        // Button submit search jadwal sholat is clicked
        $('#btn-imam-submit').on('click touch', function(e) {
            e.preventDefault()

            // Call form validation for jadwal sholat
            let validation = imam_validation()

            // Checking if validation is true or false
            if (validation === true) {
                imam_loading.removeClass('d-none')
                imam_info.addClass('d-none')
                imam_error.addClass('d-none')
                table_imam.addClass('d-none')
                table_imam.find('tbody tr').html('')
                city_name.html('')
                date_text.html('')

                // Ajax function for send and retrieve data from API jadwal sholat
                $.ajax({
                    type: 'GET',
                    url: "{{ route('result') }}",
                    data: form_imam.serialize(),
                    success: function(result) {
                        imam_loading.addClass('d-none')
                        table_imam.removeClass('d-none')

                        // Set data responses to jadwal sholat table
                        city_name.html('Location : ' +result.city_name)
                        date_text.html('Date : ' +result.data.tanggal)
                        
                        table_imam.find('tbody tr').html(`
                            <td>${result.data.subuh}</td>
                            <td>${result.data.dhuha}</td>
                            <td>${result.data.dzuhur}</td>
                            <td>${result.data.ashar}</td>
                            <td>${result.data.maghrib}</td>
                            <td>${result.data.isya}</td>
                        `)
                    },
                    error: function() {
                        imam_loading.addClass('d-none')
                        imam_error.removeClass('d-none')
                        swal({
                            title: "Error!",
                            text: "Error when get your data, please try again!",
                            icon: "error",
                        })
                    },
                    failed: function() {
                        imam_loading.addClass('d-none')
                        imam_error.removeClass('d-none')
                        swal({
                            title: "Error!",
                            text: "Error when get your data, please try again!",
                            icon: "error",
                        })
                    }
                })
            }
        })

        // Button reset data is clicked
        $('#btn-imam-reset').on('click touch', function(e) {
            imam_info.removeClass('d-none')
            imam_loading.addClass('d-none')
            imam_error.addClass('d-none')
            table_imam.addClass('d-none')
            table_imam.find('tbody tr').html('')
            city_name.html('')
            date_text.html('')

            clear_field()
        })

        $('#time').datepicker({
            format: 'yyyy-mm-dd',
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });

        // Function form validation for jadwal sholat
        function imam_validation() {
            let data_local = locations.val(),
                data_date = times.val()

            if (data_local === '') {
                swal({
                    title: "Warning!",
                    text: "Location must be selected!",
                    icon: "warning",
                });

                return false

            } else if (data_date === '') {
                swal({
                    title: "Warning!",
                    text: "Date cannot be empty!",
                    icon: "warning",
                });

                return false

            } else {
                return true
            }
        }

        // Function clear form jadwal sholat
        function clear_field() {
            locations.val('')
            times.val('')
        }
    })
</script>
@endsection

@section('sholat-menu-active')
active
@endsection