@extends('layouts.app')

@section('content')
<div class="container">
<h1 style="text-align:center;margin: 30px 0;">LOGOVI</h1>
<table id="logs-table">
    <thead>
        <tr>
            <th>Korisničko Ime</th>
            <th>Uloga</th>
            <th>Datum</th>
            <th>Aktivnost</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>{{$log->name}}</td>
            <td>{{$log->role}}</td>
            <td>{{$log->created_at}}</td>
            <td>{{$log->activity}}</td>             
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection