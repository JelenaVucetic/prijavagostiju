@extends('layouts.app')

@section('content')
<div class="container">
<h1 style="text-align: center;margin:30px 0;">Zaduženja</h1>

    <table id="inspector-debt-table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum Rođenja</th>
                <th>JMBG</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Zaduženje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($landlords as $landlord)         

            <tr>
                <td>{{$landlord->firstname}}</td>
                <td>{{$landlord->lastname}}</td>
                <td>{{$landlord->date_of_birth}}</td>
                <td>{{$landlord->jmbg}}</td>              
                <td>{{$landlord->address}}</td>
                <td>{{$landlord->city->name}}</td>
                <td>{{$landlord->debt}}</td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection