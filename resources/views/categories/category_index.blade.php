
@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories Control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories List</li>
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
                <a href="/categories/create" class="btn btn-warning shadow-lg">New<i class="fas fa-plus ml-2"></i></a>
                <div class="card-tools">
                  <form action="{{ route('searchcategory') }}" method="GET">
                  <div class="input-group input-group-sm mt-2 shadow-lg" style="width: 250px;">
                    <input type="text" name="query" class="form-control float-right" placeholder="Search Categories" value="{{ request()->input('query')}}">
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
              <div class="row mt-3">
                @foreach ($categories as $cat)
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow-lg">
                    <span class="info-box-icon bg-warning"><i class="fas fa-chart-pie"></i></span>
                        
                    <div class="info-box-content">
                      <span class="info-box-number">{{ $cat->name }}</span>
                      <a href="/categories/{{$cat->id}}/edit" class="text-secondary">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              </div>
              <div class="mx-auto">
                {{$categories->links()}}
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection