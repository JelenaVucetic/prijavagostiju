@extends('layouts.app')

@section('content')

<div class="container">
<h1 style="text-align: center;margin:30px 0;">Statistika</h1>
<input type="hidden" id="number" value="{{$number}}">
@php
    $c = 0;
@endphp
@foreach ($landlords as $landlord)
    <input type="hidden" id="landlord{{$c}}" value="{{$landlord->firstname}}">
    <input type="hidden" id="debt{{$c}}" value="{{$landlord->debt}}">
    @php
        $c++;
    @endphp
@endforeach
<canvas id="myChart"></canvas>
  
</div>
@endsection