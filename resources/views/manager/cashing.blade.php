@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cashing</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cashing Panel</li>
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
                  @foreach ($tables as $table)
                  <a href="/cashing/{{$table->id}}" class="btn btn-app bg-warning w-25 h-25 shadow-lg">
                    <i class="fas fa-chair m-1"></i> <h6>Cash out for Table "{{$table->number}}"</h6>
                  </a>  
                  @endforeach
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection