@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New Worker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Worker Submit</li>
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
                        
                    <form action="{{ route('workerstore') }}" method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
                    @csrf
                    <div class="form-group">
                        <label for="">Worker Name</label>
                        <input type="text" name="workername" class="form-control" value="{{old('workername')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="workerrole" class="form-control">
                            <option value="" selected disabled>Select Role</option>
                           @foreach ($roles as $role)
                               <option value="{{ $role->id }}">{{ $role->name }}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-gruop">
                        <label for="">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="workergender" id="inlineRadio2" value="Notmention">
                            <label class="form-check-label" for="inlineRadio2">Not Mention</label>
                          </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Image</label>
                        <input type="file" name="workerimage" class="form-control" accept="image/*" value="{{ old('workerimage') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" name="workercontent" class="form-control" value="{{ old('workercontent') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" maxlength="9" placeholder="eg - 123456789" name="workerphone" value="{{ old('workerphone') }}">
                      </div>

                        <button type="submit" class="btn btn-warning w-25 float-right mt-3">Submit</button>
                    </form>
                
                </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection