@extends('layouts.app')

@section('content')

{{-- Create Modal --}}
<div class="modal fade" id="landlordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('landlords.store') }}" method="POST">
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj Stanodavca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
          
              <div class="form-group">
                  <label for="firstname">Ime</label>
                  <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" required value="{{ old('firstname') }}" >
              </div>
              <div class="form-group">
                <label for="lastname">Prezime</label>
                <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="lastname" required value="{{ old('lastname') }}" >
               </div>
               <div class="form-group">
                    <label for="date_of_birth">Datum rođenja</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', date('Y-m-d'))}}"  min="1920-01-07" max="2030-12-31"  style="float: right;width: 50%;padding: 5px;" value="{{ old('date_of_birth') }}">
                </div>
                <div class="form-group">
                    <label for="jmbg">JMBG</label>
                    <input 
                    oninput="javascript: if (this.value.length > this.maxLength ) this.value = this.value.slice(0, this.maxLength);"
                    type = "number"
                    maxlength = "13" minlength="13" id="jmbg" name="jmbg"  style="float: right;width: 50%;border-radius: 5px;"  value="{{ old('jmbg') }}"  >
                </div>
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input id="address" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="address" required  value="{{ old('address') }}" >
                </div>
                <div class="form-group">
                    <label for="city_id">Grad</label>
                      <select name="city_id" id="city_id" style="float: right;width: 50%;padding: 5px;">
                          @foreach ($cities as $city)
                              <option value="{{$city->id}}">{{$city->name}}</option>
                          @endforeach
                      </select>
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

<div class="modal fade" id="editLandlordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-landlord-form" >
        @csrf
        @method('PATCH')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmijeni stanodavca</h5>
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
                  <label for="date_of_birth">Datum rođenja</label>
                  <input type="date" id="date_of_birth" name="date_of_birth"  min="1920-01-07" max="2030-12-31"  style="float: right;width: 50%;padding: 5px;">
              </div>
              <div class="form-group">
                  <label for="jmbg">JMBG</label>
                  <input type="number" id="jmbg" name="jmbg"  style="float: right;width: 50%;padding: 5px;"  oninput="javascript: if (this.value.length > this.maxLength ) this.value = this.value.slice(0, this.maxLength);"  maxlength = "13">
              </div>
              <div class="form-group">
                  <label for="address">Adresa</label>
                  <input id="address" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="address" required  >
              </div>
              <div class="form-group">
                  <label for="city_id">Grad</label>
                    <select name="city_id" id="city_id" style="float: right;width: 50%;padding: 5px;">
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
          <button type="button" class="btn btn-primary  confirm-landlord-btn">Sačuvaj</button>
        </div>
      </div>
    </div>
    </form>
  </div>
{{-- End of Edit Modal --}}
{{-- Delete modal --}}

<div class="modal fade" id="deleteLandlordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form id="delete-landlord-form" method="post" >
      @csrf
      @method('DELETE')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Da li ste sigurni da želite da obrišete stanodavca?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="firstname_landlord">Ime</label>
              <input type="text" name="" id="firstname_landlord" disabled style="float: right;width: 50%;border-radius: 5px;">
          </div>
          <div class="form-group">
              <label for="lastname_landlord">Prezime</label>
              <input type="text" name="" id="lastname_landlord" disabled style="float: right;width: 50%;border-radius: 5px;">
          </div>
          <div class="form-group">
              <label for="jmbg_landlord">JMBG</label>
              <input type="text" name="" id="jmbg_landlord" disabled style="float: right;width: 50%;border-radius: 5px;">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="button" class="btn btn-primary  confirm-delete-landlord-btn">Da</button>
      </div>
    </div>
  </div>
  </form>
</div>
{{-- End of Delete Modal --}}

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
    <h1 style="text-align:center;margin: 30px 0;">Stanodavci</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#landlordModal" style="float: right;margin: 40px 0;">Dodaj Stanodavca <img style="width:50px;" src="/images/plus.png" alt=""></button>
    <table id="guest-table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum rođenja</th>
                <th>JMBG</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Izmijeni</th>
                <th>Obriši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($landlords as $landlord)
            @php
                $landlord_city = \App\Landlord::find($landlord->id);
            @endphp
            <tr>
                <td>{{$landlord->firstname}}</td>
                <td>{{$landlord->lastname}}</td>
                <td>{{$landlord->date_of_birth}}</td>             
                <td>{{$landlord->jmbg}}</td> 
                <td>{{$landlord_city->city->name}}</td>
                <td>{{$landlord->address}}</td>
                <td>
                    <button type="button" class="btn btn-info test"  data-toggle="modal" data-target="#editLandlordModal" 
                                    data-id="{{$landlord->id}}"
                                    data-city= {{$landlord_city->city->id}}
                                    data-firstname="{{$landlord->firstname}}"
                                    data-lastname="{{$landlord->lastname}}"
                                    data-birth="{{$landlord->date_of_birth}}"
                                    data-jmbg="{{$landlord->jmbg}}"
                                    data-address="{{$landlord->address}}">
                            Izmijeni
                    </button>
                </td>        
                <td>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteLandlordModal" 
                                    data-id="{{$landlord->id}}"
                                    data-firstname="{{$landlord->firstname}}"
                                    data-lastname="{{$landlord->lastname}}"
                                    data-jmbg="{{$landlord->jmbg}}">
                                    Izbriši
                    </button>
                </td>
                      
                     
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection