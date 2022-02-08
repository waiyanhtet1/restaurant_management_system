@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Roles List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles List</li>
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
        <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">

              <div class="card-tools">
                <form action="{{ route('searchrole') }}" method="GET">
                <div class="input-group input-group-sm mt-1 shadow-lg" style="width: 250px;">
                  <input type="text" name="query" class="form-control float-right" placeholder="Search Role" value="{{ request()->input('query')}}">
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
              @foreach ($roles as $role)
                <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning shadow-lg">
                  <div class="inner">
                    <h5><b>{{ $role->name }}</b></h5>
    
                    <p>Role</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="{{ route('roleedit',$role) }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              @endforeach
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning collapsed-card shadow-lg">
              <div class="card-header">
                <h3 class="card-title">New Role</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('rolestore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="rolename" placeholder="Enter Role Name">
                    </div>
                    <button type="submit" class="btn btn-warning float-right">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    
          
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection