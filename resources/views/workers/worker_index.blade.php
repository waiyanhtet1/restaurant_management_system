
@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Workers List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Workers List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('workercreate')}}" class="btn btn-warning mb-3 shadow-lg">New<i class="fas fa-plus ml-2"></i></a>

              <div class="card-tools">
                <form action="{{ route('searchworker') }}" method="GET">
                <div class="input-group input-group-sm mt-2 shadow-lg" style="width: 250px;">
                  <input type="text" name="query" class="form-control float-right" placeholder="Search Worker" value="{{ request()->input('query')}}">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-warning">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                </form>
              </div>

            </div>
            <div class="card-body">
            <div class="row">
              @foreach ($workers as $worker)
                  
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill shadow-lg">
                  <div class="card-header text-muted border-bottom-0">
                    {{ $worker->role->name }}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{$worker->name}}</b></h2>
                        <p class="text-muted text-sm"><b>Gender: </b>{{ $worker->gender }}</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $worker->content }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:  09 - {{ $worker->phone }}</li>
                          <li class="small">Register : {{$worker->created_at->diffForHumans()}}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ url('/images/'.$worker->image) }}" alt="user-avatar" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      {{-- <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a> --}}
                      <a href="{{ route('workeredit',$worker->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-user"></i> More info
                      </a>
                    </div>
                  </div>
                  </div>
                </div>
              @endforeach

              </div>
            </div>
            <div class="mx-auto">
              {{$workers->links()}}
            </div>
          </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection