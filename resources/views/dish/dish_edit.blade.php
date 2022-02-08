@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Dish</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dish Edit</li>
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
                        
                    <form action="/dishes/{{$dish->id}}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Dish Name</label>
                        <input type="text" name="dishname" class="form-control" value="{{old('dishname',$dish->name)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="dishcategory" class="form-control">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"{{$cat->id == $dish->category_id ? 'selected': ''}}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="">Image</label><br>
                    <div class="form-group" style="display: grid; place-items: center;">
                        <img src="{{ url('/images/'.$dish->image) }}" style="width: 350px;height: 300px;object-fit: contain;">
                        <input type="file" name="dishimage" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="dishprice" class="form-control"( value="{{ old('dishprice',$dish->price) }}">
                    </div>
                        <button type="submit" class="btn btn-warning w-25 float-right">Edit</button>
                    </form>
                
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="callout callout-danger">
                        <h5>I am a danger callout!</h5>
      
                        <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                          soul,
                          like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Remove this Dish?</h3>
                    </div>
                    <div class="card-body">
                      <div id="accordion">
                        <div class="card card-danger">
                          <div class="card-header">
                            <h4 class="card-title w-100">
                              <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                Danger Zone
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="/dishes/{{$dish->id}}" method="post"> @csrf
                                @method('DELETE')
                                <p>Want to remove "{{$dish->name}}" dish ?</p>
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this item?');">DELETE</button>
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
        </div>
      </div>
    </div>
  </div>
@endsection