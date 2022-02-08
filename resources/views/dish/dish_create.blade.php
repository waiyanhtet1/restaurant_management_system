@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Dish</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dish Submit</li>
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
                
                  <a href="/dishes" class="btn btn-warning"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        
                    <form action="/dishes" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    <div class="form-group">
                        <label for="">Dish Name</label>
                        <input type="text" name="dishname" class="form-control" value="{{old('dishname')}}">
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="dishcategory" class="form-control">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="dishimage" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="dishprice" class="form-control">
                    </div>
                        <button type="submit" class="btn btn-warning w-25 float-right">Submit</button>
                    </form>
                
                </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection