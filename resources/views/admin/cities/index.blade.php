@extends('layouts.app')

@section('content')

{{-- Create Modal --}}
<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj Grad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
              <div class="form-group">
                  <label for="name">Ime</label>
                  <input id="name" style="float: right;width: 50%;border-radius: 5px;" type="text" name="name" required required value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="local_tax_underage" style="width: 45%;">Boravišna taksa za maljoletna lica</label>
                <input id="local_tax_underage" style="float: right;width: 50%;border-radius: 5px;" type="number" step="0.01" name="local_tax_underage" required required value="{{ old('local_tax_underage') }}" >
               </div>
               <div class="form-group">
                <label for="local_tax_adult" style="width: 45%;">Boravišna taksa za punoljetna lica</label>
                <input id="local_tax_adult" style="float: right;width: 50%;border-radius: 5px;" type="number" name="local_tax_adult" required  value="{{ old('local_tax_adult') }}">
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

<div class="modal fade" id="editCityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-city-form" >
        @csrf
        @method('PATCH')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmijeni grad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Ime</label>
                <input id="name" style="float: right;width: 50%;border-radius: 5px;" type="text" name="name" required minlength="3" maxlength="50">
            </div>
            <div class="form-group">
              <label for="local_tax_underage">Boravišna taksa za maljoletna lica</label>
              <input id="local_tax_underage" style="float: right;width: 50%;border-radius: 5px;" type="text" name="local_tax_underage" required  minlength="3" maxlength="50">
             </div>
             <div class="form-group">
              <label for="local_tax_adult">Boravišna taksa za punoljetna lica</label>
              <input id="local_tax_adult" style="float: right;width: 50%;border-radius: 5px;" type="text" name="local_tax_adult" required  minlength="3" maxlength="50">
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
          <button type="button" class="btn btn-primary  confirm-city-btn">Sačuvaj</button>
        </div>
      </div>
    </div>
    </form>
  </div>
{{-- End of Edit Modal --}}

{{-- Delete modal --}}

<div class="modal fade" id="deleteCityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form id="delete-city-form" method="post" >
      @csrf
      @method('DELETE')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Da li ste sigurni da želite da obrišete ovaj grad?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="city_name">Ime</label>
              <input type="text" name="" id="city_name" disabled style="float: right;width: 50%;border-radius: 5px;">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="button" class="btn btn-primary  confirm-delete-city-btn">Da</button>
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
    @if(session()->has('message-error'))
    <div class="alert alert-danger">
            {{ session()->get('message-error') }}
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
    <h1 style="text-align:center;margin: 30px 0;">Gradovi</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#cityModal" style="float: right;margin: 40px 0;">Dodaj Grad <img style="width:50px;" src="/images/plus.png" alt=""></button>
    <table id="city-table">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Boravišna taksa za maljoletna lica</th>
                <th>Boravišna taksa za punoljetna lica</th>
                <th>Izmijeni</th>
                <th>Izbirši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
            <tr>
                <td>{{$city->name}}</td>
                <td>{{$city->local_tax_underage}}&euro;</td>
                <td>{{$city->local_tax_adult}}&euro;</td>
                <td>
                    <button type="button" class="btn btn-info test"  data-toggle="modal" data-target="#editCityModal" 
                                    data-id="{{$city->id}}"
                                    data-name="{{$city->name}}"
                                    data-underage="{{$city->local_tax_underage}}"
                                    data-adult="{{$city->local_tax_adult}}">
                            Izmijeni
                    </button>
                </td>        
                <td>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteCityModal"
                        data-id="{{$city->id}}"
                        data-name="{{$city->name}}">
                    Izbriši</button>

                </td>
                      
                     
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection