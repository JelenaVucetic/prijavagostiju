@extends('layouts.app')

@section('content')

{{-- Create Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj korisnika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label for="firstname">Ime</label>
                  <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" required minlength="3" maxlength="50" value="{{ old('firstname') }}">
              </div>
              <div class="form-group">
                <label for="lastname">Prezime</label>
                <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="lastname" required  minlength="3" maxlength="50" value="{{ old('lastname') }}">
               </div>
               <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input id="username" style="float: right;width: 50%;border-radius: 5px;" type="text" name="username" required  minlength="3" maxlength="50" value="{{ old('username') }}">
               </div>
               <div class="form-group">
                <label for="email">Email</label>
                <input id="email" style="float: right;width: 50%;border-radius: 5px;" type="email" name="email" required  minlength="3" maxlength="50" value="{{ old('email') }}">
               </div>
               <div class="form-group">
                <label for="password">Lozinka</label>
                <input id="password" style="float: right;width: 50%;border-radius: 5px;" type="password" name="password" required >
               </div>
               <div class="form-group">
                <label for="password_confirmation">Potvrdi lozinku</label>
                <input id="password" style="float: right;width: 50%;border-radius: 5px;" type="password" name="password_confirmation" required >
               </div>
               <div class="form-group">
                   <label for="role">Uloga</label>
                   <select name="role" id="" style="float: right;width: 232px;padding: 5px;border-radius: 5px;">
                       <option value="1">Admin</option>
                       <option value="2">Informator</option>
                       <option value="3">Inspektor</option>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-user-form" >
        @csrf
        @method('PATCH')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname">Ime</label>
                <input id="firstname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="firstname" required minlength="3" maxlength="50">
            </div>
            <div class="form-group">
              <label for="lastname">Prezime</label>
              <input id="lastname" style="float: right;width: 50%;border-radius: 5px;" type="text" name="lastname" required  minlength="3" maxlength="50">
             </div>
             <div class="form-group">
              <label for="username">Korisničko ime</label>
              <input id="username" style="float: right;width: 50%;border-radius: 5px;" type="text" name="username" required  minlength="3" maxlength="50">
             </div>
             <div class="form-group">
              <label for="email">Email</label>
              <input id="email" style="float: right;width: 50%;border-radius: 5px;" type="email" name="email" required  minlength="3" maxlength="50">
             </div>
             <div class="form-group">
                <label for="password">Stara Lozinka</label>
                <input id="password" style="float: right;width: 50%;border-radius: 5px;" type="password" name="password" required  >
               </div>
             <div class="form-group">
              <label for="new_password">Nova Lozinka</label>
              <input id="new_password" style="float: right;width: 50%;border-radius: 5px;" type="password" name="new_password" required  >
             </div>
             <div class="form-group">
              <label for="password_confirmation">Potvrdi lozinku</label>
              <input id="password" style="float: right;width: 50%;border-radius: 5px;" type="password" name="password_confirmation" required >
             </div>
             <div class="form-group">
                 <label for="role">Uloga</label>
                 <select name="role" id="" style="float: right;width: 232px;padding: 5px;border-radius: 5px;">
                     <option value="1">Admin</option>
                     <option value="2">Informator</option>
                     <option value="3">Inspektor</option>
                 </select>
             </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary  confirm-btn">Save changes</button>
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
    <h1 style="text-align:center;margin: 30px 0;">Korisnici</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="float: right;margin: 40px 0;">Dodaj korisnika <img style="width:50px;" src="/images/plus.png" alt=""></button>
    <table id="table">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Korisnicko ime</th>
                <th>Uloga</th>
                <th>Status</th>
                <th>Izmijeni</th>
                <th>Aktiviraj/Deaktiviraj</th>
                <th>Izbirši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->username}}</td>
                <td>fjkdsk</td>
                @if ($user->active == 1)
                   <td>Aktivan</td>
                @else 
                    <td>Nije aktivan</td>
                @endif
                <td>
                    <button type="button" class="btn btn-info test"  data-toggle="modal" data-target="#editModal" 
                                    data-id="{{$user->id}}"
                                    data-name="{{$user->name}}"
                                    data-lastname="{{$user->lastname}}"
                                    data-username="{{$user->username}}"
                                    data-email = "{{$user->email}}"
                                    data-active="{{$user->active}}"
                                    data-role="{{$user->role}}">
                            Izmijeni
                    </button>
                </td>
                @if ($user->active == 1)
                    <td><button type="button" class="btn btn-primary">Deaktiviraj</button></td>
                @else 
                    <td><button type="button" class="btn btn-primary">Aktiviraj</button></td>
                @endif
               
                <td>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
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