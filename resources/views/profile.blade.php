@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h1 class="text-center">ADMIN PROFILE</h1>
@stop

@section('content')
<br> 
<div class="card card-secondary card-outline" style="width: 30rem; width:800px; margin:0 auto;">
              <div class="card-body box-profile">
              <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="vendor/adminlte/dist/img/profile.jpg">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Track N' Ride - Admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                </ul>
                <button type="submit" class="btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#modal-default">Update</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form action="{{route('profile')}}" method="POST">
                    @csrf
                    @method('PUT')
                       <div class="form-group">
                           <label for="name"><strong>Name:</strong></label>
                           <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                       </div>
                        <div class="form-group">
                           <label for="email"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email">
                       </div>
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                   </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


            
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop