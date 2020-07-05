@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('message-error'))
    <div class="alert alert-danger">
            {{ session()->get('message-error') }}
        </div>
    @endif
    <h1>REGISTRACIJA GOSTA</h1>
   <table class="table table-striped">
       <thead>
           <th scope="col">Ime</th>
           <th scope="col">Prezime</th>
           <th scope="col">Pol</th>
           <th scope="col">Datum rođenja</th>
           <th scope="col">Državljanstvo</th>
           <th scope="col">Vrsta putne isprave</th>
           <th scope="col">Broj putne isprave</th>
           <th scope="col">Datum važenja putne isprave</th>
       </thead>
       <tbody>
           <tr  scope="row">
            <td>{{$guest->firstname}}</td>
            <td>{{$guest->lastname}}</td>
            <td>{{$guest->gender}}</td>
            <td>{{$guest->date_of_birth}}</td>
            <td>{{$guest->state->name}}</td>
            <td>{{$guest->travel_document}}</td>
            <td>{{$guest->travel_document_number}}</td>
            <td>{{$guest->expiration_date}}</td>
           </tr>    
       </tbody>
   </table>
   <div>
    <form action="{{route('debt')}}" method="POST">
        <input type="hidden" name="guset_id" value="{{$guest->id}}">
        <input type="hidden" name="date_of_birth" value="{{$guest->date_of_birth}}">
        @csrf
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Datum prijave</th>
                <th scope="col">Datum odjave</th>
                <th scope="col">Oslobođen plaćanja</th>
                <th scope="col">Stanodavac</th>
                <th scope="col">Prijavi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="date" name="check_in" min="2020-07-01" max="2030-12-31" ></td>
                <td><input type="date" name="check_out" min="2020-07-01" max="2030-12-31" ></td>
                <td style="text-align: center;" ><input type="checkbox" name="payment_free" class="" id="checkbox1"></td>
                <td>
                    <select name="landlord_id" id="landlord_id" style="width: 100%;padding: 5px;">
                        @foreach ($landlords as $landlord)
                            <option value="{{$landlord->id}}">{{$landlord->firstname}}</option>
                        @endforeach
                    </select>
                </td>
                <td><button type="submit" class="btn btn-success">Prijavi</button></td>
              </tr>
            </tbody>
          </table>
       </form>
   </div>
</div>
@endsection