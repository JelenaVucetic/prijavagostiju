@extends('layouts.app')

@section('content')

{{-- Create Modal --}}
<div class="modal fade" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('states.store') }}" method="POST">
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodaj Državu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">        
              <div class="form-group">
                  <label for="name">Naziv</label>
                  <input id="name" style="float: right;width: 50%;border-radius: 5px;" type="text" name="name" required value="{{ old('name') }}">
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

<div class="modal fade" id="editStateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" id="edit-state-form" >
        @csrf
        @method('PATCH')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmijeni državu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Naziv</label>
                <input id="name" style="float: right;width: 50%;border-radius: 5px;" type="text" name="name" required minlength="3" maxlength="50">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
          <button type="button" class="btn btn-primary  confirm-state-btn">Sačuvaj</button>
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
    <h1 style="text-align:center;margin: 30px 0;">Države</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#stateModal" style="float: right;margin: 40px 0;">Dodaj Državu <img style="width:50px;" src="/images/plus.png" alt=""></button>
    <table id="state-table">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Izmijeni</th>
                <th>Izbirši</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($states as $state)
            <tr>
                <td>{{$state->name}}</td>
                <td>
                    <button type="button" class="btn btn-info test"  data-toggle="modal" data-target="#editStateModal" 
                                    data-id="{{$state->id}}"
                                    data-name="{{$state->name}}">
                            Izmijeni
                    </button>
                </td>        
                <td>
                    <form action="{{ route('states.destroy', $state->id)}}" method="post">
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