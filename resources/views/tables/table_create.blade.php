@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Table Create</li>
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
            <div class="card shadow-lg">
              <div class="card-body">
                  <a href="/tables" class="btn btn-warning mb-3"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    <form action="{{route('tablestore')}}" method="POST" class="mx-auto w-50"  enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="">Table Name or Number</label>
                            <input type="text" name="tablename" class="form-control">
                        </div>
                        <label for="" class="form-label">Level:</label>
                        <input type="range" class="form-control-range" min="1" max="3" step="1" name="tablelevel">  
                        <small>Classic</small>
                        <small style="margin-left: 12rem;">Medium</small>
                        <small style="margin-left: 14rem;">VIP</small>
                        <div class="form-group mt-5 float-right">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection