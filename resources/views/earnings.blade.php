@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <div class="card">
              <div class="card-header">
              <a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
                <h2>EARNING REPORTS</h2>
              </div>
          <!-- ./col -->
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Payment Status</th>
                    <th>Ride Date</th>
                    <th>Booking ID</th>
                    <th>Commuters Name</th>
                    <th>Drivers Name</th>
                    <th>Total Fare</th>
                    <th>Discount</th>  
                    <th>Ride Status</th>
                    <th>Driver Earning</th>
                    <th>App Commission</th>  
                    <th>Collect from Driver</th> 
                  </tr>
                  </thead>

                  <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  </tbody>
                  
                </table>
              </div>
        </div>
        
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
@stop

@section('content')