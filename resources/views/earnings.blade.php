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

@section('css')
    <link rel="stylesheet" herf="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" herf="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" herf="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" herf="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
    
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  
  <script>
    $(document).ready(() => {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    });
  </script>
@stop