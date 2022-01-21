@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h1 class="text-center">ADMIN PASSWORD</h1>
@stop

@section('content')
<br> 
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
   </div>
  @endif
  @if(session()->get('message'))
  <div class="alert alert-success" role="alert">
    <strong>Success: </strong>{{session()->get('message')}}
  </div>
  @endif
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Change Password</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                   <form action="{{route('change_password')}}" method="POST">
                    @csrf
                    @method('PUT')
                       <div class="form-group">
                           <label for="name"><strong>Type New Password:</strong></label>
                           <input type="text" class="form-control" id ="password" name="password" value="{{Auth::user()->password}}">
                       </div>
                       
                        <button class="btn btn-primary" type="submit">Update Password</button>
                   </form>
                </div>
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