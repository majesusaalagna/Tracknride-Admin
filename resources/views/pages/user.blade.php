@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="card">
              <div class="card-header">
              <a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
                <h2>LIST OF {{ Request::path() == "users" ? 'REGISTERED' : 'ARCHIVED' }} COMMUTERS</h2>
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
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $i=1; @endphp
                   @foreach($users as $key => $item)
                    @if(Request::path() == "users" && ISSET($item['isArchive']) && $item['isArchive'] != null && $item['isArchive'] == TRUE)
                      @continue
                    @elseif(Request::path() == "archive_commuters" && (!ISSET($item['isArchive']) || ISSET($item['isArchive']) && $item['isArchive'] != null && $item['isArchive'] == FALSE))
                      @continue
                    @endif
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $item['email'] }}</td>
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['phone'] }}</td>

                      <td>
                        @if(Request::path() == "users")
                          <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-warning archive">Archive</button>
                          
                          @if(ISSET($item['disable']))
                            <button type="button" name="{{ $item['name'] }}" id="{{ $key }}" class="btn btn-success enable">Enable</button>
                          @else
                            <button type="button" name="{{ $item['name'] }}" email="{{ $item['email'] }}" id="{{ $key }}" class="btn btn-danger disable">Disable</button>
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

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>

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

      emailjs.init("user_iFHxqjEKhcUHNngPeL8NE");

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
          firebase.database().ref().child('users').child(id).update({
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
          firebase.database().ref().child('users').child(id).child('isArchive').remove()
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
          const email = $(e.currentTarget).attr('email');
          if(reason.trim().length > 0) {
            const id = $(e.currentTarget).attr('id');
            firebase.database().ref().child('users').child(id).child("disable").update({
              isDisable: true,
              reason: reason
            })
              .then(() => {

                var templateParams = {
                  to_name: name,
                  from_name: 'Track&Ride Admin',
                  message: "Your account has been disabled because it was used in a way that violates Track N Ride Policies.",
                  to_email: email
                };

                emailjs.send('service_a9dy0ud', 'template_77yci37', templateParams)
                  .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    window.location.reload();
                  }, function(error) {
                    console.log('FAILED...', error);
                  });

              })
              .catch(err => console.log(err.message));
          } 
        }
      });

      $('body').on('click', '.enable', (e) => {
        const name = $(e.currentTarget).attr('name');

        if(confirm("This account has been disabled. Are you sure to enable again "+ name +"?")) {
          const id = $(e.currentTarget).attr('id');
          const email = $(e.currentTarget).attr('email');
          firebase.database().ref().child('users').child(id).child('disable').remove()
            .then(() => {
              window.location.reload();
            })
            .catch(err => console.log(err.message));
        }
      });


    });
  </script>
@stop