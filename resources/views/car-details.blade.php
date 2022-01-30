@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')


<div class="card"> 
    <div class="card-header">
    <a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
        <h2>Car Details</h2>
    </div>
    <div class="card-body">
        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="name">
                Color</label>
            </div>
                <input name="color" id="color" class="form-control" value="{{ $carDetails['car_color'] }}" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="name">
                Model</i></label>
            </div>
                <input name="model" id="model" class="form-control" value="{{ $carDetails['car_model'] }}" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="name">
                Plate Number</label>
            </div>
                <input name="platenumber" id="platenumber" class="form-control" value="{{ $carDetails['car_number'] }}" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="name">
                Type</i></label>
            </div>
                <input name="cartype" id="cartype" class="form-control" value="{{ $carDetails['type'] }}" aria-describedby="inputGroup-sizing-sm">
        </div>

        @if($credentials != NULL && COUNT($credentials) > 0)
            <h3>Credentials</h3>
            @foreach($credentials as $key => $item)
                <img src="{{ $item['url'] }}" alt="Paris" width="300" height="300">
            @endforeach
        @endif

    </div> 
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop