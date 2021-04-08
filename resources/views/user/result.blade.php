@extends('user.v_template')
@section('title','Jadwal Sholat')
@section('content')

<div class="container">
    <div class="row mt-5 pt-5">
        <table class="table">
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
                    <td>{{ $schedule['subuh'] }}</td>
                    <td>{{ $schedule['dhuha'] }}</td>
                    <td>{{ $schedule['dzuhur'] }}</td>
                    <td>{{ $schedule['ashar'] }}</td>
                    <td>{{ $schedule['maghrib'] }}</td>
                    <td>{{ $schedule['isya'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection