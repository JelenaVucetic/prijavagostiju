@extends('layouts.app')

@section('content')
{{-- Edit modal --}}

<div class="modal fade" id="editDebtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-debt-form" >
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Razduži stanodavca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname">Ime</label>
                <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" disabled >
            </div>
            <div class="form-group">
              <label for="lastname">Prezime</label>
              <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="lastname" disabled  >
             </div>
             <div class="form-group">
                  <label for="date_of_birth">Datum rođenja</label>
                  <input type="date" id="date_of_birth" name="date_of_birth" value="" min="2020-07-01" max="2030-12-31" style="float: right;width: 50%;padding: 5px;" disabled>
              </div>
              <div class="form-group">
                <label for="jmbg">Jmbg</label>
                <input id="jmbg" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="jmbg" disabled  >
               </div>
               <div class="form-group">
                <label for="address">Adresa</label>
                <input id="address" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="address" disabled  >
               </div>
               <div class="form-group">
                <label for="city_id">Grad</label>
                  <select name="city_id" id="city_id" style="float: right;width: 50%;padding: 5px;color: gray;border: 1px solid gray;border-radius: 5px;" disabled>
                      @foreach ($cities as $city)
                          <option value="{{$city->id}}">{{$city->name}}</option>
                      @endforeach
                  </select>
              </div>
               <div class="form-group">
                <label for="total">Ukupno zaduženje</label>
                <input id="total" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="total" disabled  >
               </div>
               <div class="form-group">
                <label for="amount">Iznos za razduživanje</label>
                <input id="amount" style="float: right;width: 50%;border-radius: 5px;" type="text"  name="amount" required>
               </div>
               <input type="hidden" id="totalNew" name="totalNew">
               <input type="hidden" id="debtid" name="debtid">
               <input type="hidden" id='landlordid' name="landlordid">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
          <button type="button" class="btn btn-primary  confirm-debt-btn">Sačuvaj</button>
        </div>
      </div>
    </div>
    </form>
  </div>
{{-- End of Edit Modal --}}


<div class="container">
<h1 style="text-align: center;margin:30px 0;">Zaduženja</h1>

    <table id="debt-table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum Rođenja</th>
                <th>JMBG</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Zaduženje</th>
                <th>Razduži</th>
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
                <td>{{$landlord->name}}</td>
                <td>{{$landlord->debt}}</td>
                <td><button class="btn btn-info"
                    data-toggle="modal" data-target="#editDebtModal" 
                                    data-id="{{$landlord->id}}"
                                    data-debtid="{{$landlord->debtId}}"
                                    data-firstname="{{$landlord->firstname}}"
                                    data-lastname="{{$landlord->lastname}}"
                                    data-jmbg="{{$landlord->jmbg}}"
                                    data-birth="{{$landlord->date_of_birth}}"
                                    data-address="{{$landlord->address}}"
                                    data-city="{{$landlord->cityId}}"
                                    data-name="{{$landlord->name}}"
                                    data-total="{{$landlord->debt}}">
                        Razudži
                    </button>
                </td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection