@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dishes Control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dishes List</li>
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
                <a href="/dishes/create" class="btn btn-warning shadow-lg">New<i class="fas fa-plus ml-2"></i></a>
                  <div class="card-tools">
                    <form action="{{ route('searchdish') }}" method="GET">
                    <div class="input-group input-group-sm mt-2 shadow-lg" style="width: 250px;">
                      <input type="text" name="query" class="form-control float-right" placeholder="Search Dishes" value="{{ request()->input('query')}}">
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
                      @foreach ($dishes as $dish)
                      <div class="col-sm-6 col-md-4 col-lg-3">
                      <div class="card shadow-lg" style="width: 14rem; height: 21rem;">
                        <img src="{{ url('/images/'.$dish->image) }}" style="height: 130px;" class="card-img-top">
                        <div class="card-body">
                          <h3 class="card-title mb-2"><b>{{ $dish->name }}</b></h3>
                          <p class="card-text"><i class="fas fa-chart-pie"></i> {{ $dish->category->name }}</p>
                          <p class="card-text">Price: {{ $dish->price }} Kyts.</p>
                          <a href="/dishes/{{$dish->id}}/edit" class="btn btn-warning">Edit Info...<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      </div>
                      @endforeach
                    </div>

              </div>
          </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection