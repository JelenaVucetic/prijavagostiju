@extends('layouts.app')

@section('content')
<div class="container">
<h1 style="text-align: center;margin:30px 0;">Iznajmljivanja</h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <table id="renting-table">
        <thead>
            <tr>
                <th>Datum prijave</th>
                <th>Datum odjave</th>
                <th>Ukupna cijena</th>
                <th>Informator</th>
                <th>Stanodavac</th>
                <th>Grad</th>
                <th>Gost</th>
                <th>Račun</th>
                <th>Izbriši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
            <tr>
                <td>{{$rent->check_in}}</td>
                <td>{{$rent->check_out}}</td>
                <td>{{$rent->price}}</td>
                <td>{{$rent->userName}}</td>              
                <td>{{$rent->lordFirstname}}</td>
                <td>{{$rent->name}}</td>
                <td>{{$rent->guestFirstname}}</td>
                <td><button class="btn btn-success">Preuzmi</button></td>       
                <td>
                    <form action="/renting/destroy/{{$rent->id}}" method="post">
                        @csrf
                        <input type="hidden" name="rent_id" value="{{$rent->id}}">
                        <button type="submit" class="btn btn-danger">Izbriši</button>
                    </form>
                </td>
                      
                     
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection