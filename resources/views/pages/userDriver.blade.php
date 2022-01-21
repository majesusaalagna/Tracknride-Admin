@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="card">
<div class="card-header">
<a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
                <h2>LIST OF REGISTERED DRIVERS</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Drivers License</th>
                    <th>Car Details</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                   @foreach($userDriver as $key => $item)
                  <tr>
                     <td>{{ $i++ }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                    <td></td>
                   
                    <td><a href="{{ url('car-details/'.$key) }}"><i>See Car Details</i></a></td>
                  
                <td> </td>
                  </tr>
                  @endforeach
               
                  </tbody>
                  
                </table>
               
              </div>
              <!-- /.card-body -->
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop