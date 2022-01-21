@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>DASHBOARD</h1>
@stop

@section('content')

        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_num2}}</h3>
                <p>Ride Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-taxi"></i>
              </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

                
                  <!-- ./col -->
        <div class="col-lg-4 col-6">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>{{$total_num}}</h3>
              <p>Total Commuters</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
              <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-gray">
              <div class="inner">
                
              
                <h3>{{$total_num1}}</h3>
               <p>Total Drivers</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="userDrivers" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        
           <!--Ride info-->
           <div class="card">
             <div class="card-header">
             <h1>Ride Request</h1>
             </div>
           <div class="card-body">
              
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ride ID</th>
                    <th>Date</th>
                    <th>Commuter Name</th>
                    <th>Pick / Drop Address</th>
                    <th>Driver name</th>
                    <th>Vehicle Type</th>
                    <th>Status</th>  
                  </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                  @foreach($rideRequest as $key => $ride)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{  $ride['created_at'] }}</td>
                    <td>{{  $ride['rider_name'] }}</td>
                    <td>PICK-UP ADDRESS:<br>
                       {{  $ride['pickup_address'] }}
                  <br><br> DROP-OFF ADDRESS: <br> 
                      {{  $ride['dropoff_address'] }}  </td>
                      <td> {{  $ride['driver_name'] }}</td>
                    <td>{{  $ride['ride_type'] }}</td>
                    <td>@if ($ride['status'] === 'accepted')
                          <span class="mj_btn btn btn-warning">Accepted</span>
                        @else
                          <span class="mj_btn btn btn-success">Completed</span>
                         
                        @endif
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>

              </div>
        </div>
         
        </div>
         
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop