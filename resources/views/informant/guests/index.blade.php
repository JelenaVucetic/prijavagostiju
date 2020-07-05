@extends('layouts.app')

@section('content')

{{-- Create Modal --}}
<div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('guests.store') }}" method="POST">
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj Gosta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
          
              <div class="form-group">
                  <label for="firstname">Ime</label>
                  <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" required value="{{ old('firstname') }}">
              </div>
              <div class="form-group">
                <label for="lastname">Prezime</label>
                <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="lastname" required value="{{ old('lastname') }}"  >
               </div>
               <div class="form-group">
                <label for="gender">Pol</label>
                   <select name="gender" id="gender"  style="float: right;width: 50%;padding: 5px;">
                       <option value="Muški">Muški</option>
                       <option value="Ženski">Ženski</option>
                   </select>
               </div>
               <div class="form-group">
                    <label for="date_of_birth">Datum rođenja</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="" min="1920-07-01" max="2030-12-31"  style="float: right;width: 50%;padding: 5px;"  value="{{ old('date_of_birth', date('Y-m-d'))}}" >
                </div>
                <div class="form-group">
                    <label for="state_id">Državljanstvo</label>
                    <select name="state_id" id="state_id"  style="float: right;width: 50%;padding: 5px;" style="float: right;width: 50%;padding: 5px;">
                        @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel_document">Vrsta putna isprave</label>
                    <select name="travel_document" id="travel_document"  style="float: right;width: 50%;padding: 5px;">
                        <option value="Lična karta">Lična karta</option>
                        <option value="Pasoš">Pasoš</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel_document_number">Broj putne isprave</label>
                    <input id="travel_document_number" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="travel_document_number" required value="{{ old('travel_document_number') }}" >
                </div>
                <div class="form-group">
                    <label for="expiration_date">Datum važenja putne isprave</label>
                    <input type="date" id="expiration_date" name="expiration_date" value="" min="2020-07-01" max="2030-12-31"  style="float: right;width: 50%;padding: 5px;"  value="{{ old('date_of_birth', date('Y-m-d'))}}" >
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button> 
            <button type="submit" class="btn btn-primary">Unesi</button>
        </div>
  
      </div>
    </div>
</form>
  </div>
{{--   End of Crete Modal --}}

{{-- Edit modal --}}

<div class="modal fade" id="editGuestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-guest-form" >
        @csrf
        @method('PATCH')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmijeni gosta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname">Ime</label>
                <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" required >
            </div>
            <div class="form-group">
              <label for="lastname">Prezime</label>
              <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="lastname" required  >
             </div>
             <div class="form-group">
                <label for="gender">Pol</label>
                 <select name="gender" id="gender" style="float: right;width: 50%;padding: 5px;">
                     <option value="Muški">Muški</option>
                     <option value="Ženski">Ženski</option>
                 </select>
             </div>
             <div class="form-group">
                  <label for="date_of_birth">Datum rođenja</label>
                  <input type="date" id="date_of_birth" name="date_of_birth" value="" min="2020-07-01" max="2030-12-31" style="float: right;width: 50%;padding: 5px;">
              </div>
              <div class="form-group">
                <label for="state_id">Državljanstvo</label>
                  <select name="state_id" id="state_id" style="float: right;width: 50%;padding: 5px;">
                      @foreach ($states as $state)
                          <option value="{{$state->id}}">{{$state->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="travel_document">Vrsta putna isprave</label>
                  <select name="travel_document" id="travel_document" style="float: right;width: 50%;padding: 5px;">
                      <option value="Lična karta">Lična karta</option>
                      <option value="Pasoš">Pasoš</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="travel_document_number">Broj putne isprave</label>
                  <input id="travel_document_number" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="travel_document_number" required  >
              </div>
              <div class="form-group">
                  <label for="expiration_date">Datum važenja putne isprave</label>
                  <input type="date" id="expiration_date" name="expiration_date" value="" min="2020-01-07" max="2030-12-31" style="float: right;width: 50%;padding: 5px;"style="float: right;width: 50%;padding: 5px;">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
          <button type="button" class="btn btn-primary  confirm-guest-btn">Sačuvaj</button>
        </div>
      </div>
    </div>
    </form>
  </div>
{{-- End of Edit Modal --}}

<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
  @endif
    <h1 style="text-align:center;margin: 30px 0;">Gosti</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#guestModal" style="float: right;margin: 40px 0;">Dodaj Gosta <img style="width:50px;" src="/images/plus.png" alt=""></button>
    <table id="guest-table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Pol</th>
                <th>Datum rođenja</th>
                <th>Državljanstvo</th>
                <th>Vrta putne isprave</th>
                <th>Broj putne isprave</th>
                <th>Datum važenja putne isprave</th>
                <th>Prijavi</th>
                <th>Izmijeni</th>
                <th>Obriši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guests as $guest)
            @php
                $guest_state = \App\Guest::find($guest->id);
            @endphp
            <tr>
                <td>{{$guest->firstname}}</td>
                <td>{{$guest->lastname}}</td>
                <td>{{$guest->gender}}</td>
                <td>{{$guest->date_of_birth}}</td>              
                <td>{{$guest_state->state->name}}</td>
                <td>{{$guest->travel_document}}</td>
                <td>{{$guest->travel_document_number}}</td>
                <td>{{$guest->expiration_date}}</td>
                <td> <a href="{{route('guests.show',$guest->id)}}"><button class="btn btn-success">Prijavi</button></a> </td>
                <td>
                    <button type="button" class="btn btn-info test"  data-toggle="modal" data-target="#editGuestModal" 
                                    data-id="{{$guest->id}}"
                                    data-state= {{$guest_state->state->id}}
                                    data-firstname="{{$guest->firstname}}"
                                    data-lastname="{{$guest->lastname}}"
                                    data-gender="{{$guest->gender}}"
                                    data-birth="{{$guest->date_of_birth}}"
                                    data-document="{{$guest->travel_document}}"
                                    data-docnumber="{{$guest->travel_document_number}}"
                                    data-expiration="{{$guest->expiration_date}}">
                            Izmijeni
                    </button>
                </td>        
                <td>
                    <form action="{{ route('guests.destroy', $guest->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Izbriši</button>
                    </form>
                </td>
                      
                     
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection