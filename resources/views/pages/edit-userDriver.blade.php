@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@section('content')

<div class="card">

   
</div>
<div class="card"> 
    <div class="card-header">
    <a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
        <h2>Update the Registered User Driver</h2>
    </div>
    <div class="card-body">
                <form action="{{ url('update-userDriver/'.$key) }}" method="POST" >
                @csrf
                @method('PUT')
                
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="name">
                    <i class="fas fa-user"></i></label>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $edituserDriver['name'] }}" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="email"><i class="fas fa-at"></i></label>
                    </div>
                    <input type="text" name="email"  class="form-control" placeholder="" value="{{ $edituserDriver['email'] }}" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="mobile"><i class="fas fa-phone"></i></label>
                    </div>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $edituserDriver['phone'] }}" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
                </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop