@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit "{{$category->name}}" Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Edit</li>
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
                  <a href="/categories" class="btn btn-warning"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        
                    <form action="/categories/{{$category->id}}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryname" class="form-control" value="{{old('categoryname',$category->name)}}">
                        <small>Created: {{$category->created_at->diffForHumans()}}</small>
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