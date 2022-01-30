@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="card">
<div class="card-header">
<a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
                <h2>LIST OF {{ Request::path() == "userDrivers" ? 'REGISTERED' : 'ARCHIVED' }} DRIVERS</h2>
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
                    <th>Car Details</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $i=1; @endphp
                   @foreach($userDriver as $key => $item)
                    @if(Request::path() == "userDrivers" && ISSET($item['isArchive']) && $item['isArchive'] != null && $item['isArchive'] == TRUE)
                      @continue
                    @elseif(Request::path() == "archive_userDrivers" && (!ISSET($item['isArchive']) || ISSET($item['isArchive']) && $item['isArchive'] != null && $item['isArchive'] == FALSE))
                      @continue
                    @endif
                  <tr>
                     <td>{{ $i++ }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                   
                    <td><a href="{{ url('car-details/'.$key) }}"><i>See Car Details & Credentials</i></a></td>

                    <td>
                      @if(Request::path() == "userDrivers")
                        <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-warning archive">Archive</button>

                        @if(ISSET($item['disable']))
                          <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-success enable">Enable</button>
                        @else
                          <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-danger disable">Disable</button>
                        @endif

                        @if(!ISSET($item['isApprove']) || (ISSET($item['isApprove']) && $item['isApprove'] == false))
                          <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-info approve">Approve</button>
                        @else
                          <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-warning disapprove">Disapprove</button>
                        @endif
        
                      @else
                        <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-success unarchive">Unarchive</button>
                      @endif
                    </td>

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

  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script>
  <script>
    const firebaseConfig = {
      apiKey: "AIzaSyBj5lVfz6WfCLgDFwhODLRO_KrVeyxqJ9k",
      authDomain: "track-n-ride.firebaseapp.com",
      databaseURL: "https://track-n-ride-default-rtdb.firebaseio.com",
      projectId: "track-n-ride",
      storageBucket: "track-n-ride.appspot.com",
      messagingSenderId: "488803270714",
      appId: "1:488803270714:web:fc5230fe29505cf6a73503",
      measurementId: "G-L4Z1PDT1RB"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
  </script>
  
  <script>
    $(document).ready(() => {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
      });


      $('body').on('click', '.archive', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("Are you sure to archive "+ name +"?")) {
          const id = $(e.currentTarget).attr('id');
          firebase.database().ref().child('drivers').child(id).update({
            isArchive: true
          })
            .then(() => {
              window.location.reload(); 
            })
            .catch(err => console.log(err.message));
        }
      });

      $('body').on('click', '.unarchive', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("Are you sure to unarchive "+ name +"?")) {
          const id = $(e.currentTarget).attr('id');
          firebase.database().ref().child('drivers').child(id).child('isArchive').remove()
            .then(() => {
              window.location.reload();
            })
            .catch(err => console.log(err.message));
        }
      });

      $('body').on('click', '.disable', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("Are you sure to disable "+ name +"? This user will not be able to login their account.")) {
          const reason = prompt("Enter a reason to Disable");
          if(reason.trim().length > 0) {
            const id = $(e.currentTarget).attr('id');
            firebase.database().ref().child('drivers').child(id).child("disable").update({
              isDisable: true,
              reason: reason
            })
              .then(() => {
                window.location.reload(); 
              })
              .catch(err => console.log(err.message));
          } 
        }
      });

      $('body').on('click', '.enable', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("This account has been disabled. Are you sure to enable again "+ name +"?")) {
          const id = $(e.currentTarget).attr('id');
          firebase.database().ref().child('drivers').child(id).child('disable').remove()
            .then(() => {
              window.location.reload();
            })
            .catch(err => console.log(err.message));
        }
      });

      $('body').on('click', '.approve', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("Did you already check this user credential? Are you sure to approve "+ name +" as a Driver?")) {
          const id = $(e.currentTarget).attr('id');
          firebase.database().ref().child('drivers').child(id).update({
            isApprove: true
          })
            .then(() => {
              window.location.reload(); 
            })
            .catch(err => console.log(err.message));
        }
      });

      $('body').on('click', '.disapprove', (e) => {
        const name = $(e.currentTarget).attr('name');
        if(confirm("This user is already approved as Driver. Are you sure to disapprove "+ name +"?")) {
          const id = $(e.currentTarget).attr('id');
          firebase.database().ref().child('drivers').child(id).child('isApprove').remove()
            .then(() => {
              window.location.reload();
            })
            .catch(err => console.log(err.message));
        }
      });

    });
  </script>
@stop