@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="card">
    <div class="card-header p-2">
    <a href="{{ URL::previous() }}" class="previous">&laquo; Previous</a>
      <h1>COMMUTERS FEEDBACK</h1>
    </div>
        <div class="card-body">
                <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="vendor/adminlte/dist/img/user7-128x128.png" alt="">
                        <span class="username">
                          <a href="#">Chen Lee</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                            Mabait po yung driver! Tama din po ang singil na pamasahe. Thank you po!
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="vendor/adminlte/dist/img/user7-128x128.png" alt="">
                        <span class="username">
                          <a href="#">Karen Santos</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">14 minutes ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                            Good Service!
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
</div>
</div>
@stop

@section('content')
