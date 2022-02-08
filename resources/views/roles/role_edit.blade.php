@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit "{{$role->name}}" Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role Edit</li>
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
              <div class="card-body">
                  <a href="/roles" class="btn btn-warning"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        
                    <form action="{{ route('roleupdate',$role) }}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Role Name</label>
                        <input type="text" name="rolename" class="form-control" 
                        value="{{$role->name}}">
                    </div>
                        <button type="submit" class="btn btn-warning w-25 float-right">Edit</button>
                    </form>
                
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection