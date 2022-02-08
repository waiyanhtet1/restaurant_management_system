@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit information of "{{ $worker->name }}"</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Worker Edit</li>
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
                  <a href="{{route('workerindex')}}" class="btn btn-warning"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        
                    <form action="{{ route('workerupdate',$worker->id) }}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Worker Name</label>
                        <input type="text" name="workername" class="form-control" value="{{old('workername',$worker->name)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="workerrole" class="form-control">
                            <option value="" selected disabled>Select Role</option>
                           @foreach ($roles as $role)
                               <option value="{{ $role->id }}" {{$role->id == $worker->role_id ? 'selected':''}}>{{ $role->name }}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-gruop">
                        <label for="">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio1" value="Male" 
                            {{ $worker->gender == "Male" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio2" value="Female"
                            {{ $worker->gender == "Female" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio3" value="Notmention"
                            {{ $worker->gender == "Notmention" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio3">Not Mention</label>
                          </div>
                    </div>
                    <label for="" class="mt-3">Image</label>
                    <div class="form-group" style="display: grid; place-items: center;">
                        <img src="{{ url('/images/'.$worker->image) }}" style="width: 150px;height: 150px;object-fit: contain;" class="mb-3">
                        <input type="file" name="workerimage" class="form-control" accept="image/*" value="{{ old('workerimage')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" name="workercontent" class="form-control" value="{{ old('workercontent',$worker->content) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" maxlength="9" placeholder="eg - 123456789" name="workerphone" value="{{ old('workerphone',$worker->phone) }}">
                      </div>

                        <button type="submit" class="btn btn-warning w-25 float-right mt-3">Submit</button>
                    </form>
                
                </div>
            </div>

            
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Fires this Worker?</h3>
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
                            <form action="{{ route('workerdestroy',$worker->id) }}" method="post"> @csrf
                            @method('DELETE')
                            <p>Want to fires "{{$worker->name}}" ?</p>
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this item?');">Remove</button>
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
@endsection