@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tables</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tables List</li>
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
                  <a href="{{route('tablecreate')}}" class="btn btn-warning mb-3">New <i class="fas fa-plus ml-2"></i></a>
                  <div class="row">
                  @foreach ($tables as $table)
                  <div class="col-lg-3">
                      <div class="position-relative p-3 bg-dark mb-3" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-lg">
                            @if ($table->level_table == "Classic")
                                <div class="ribbon bg-success text-lg">
                                    {{$table->level_table}}
                                </div>
                            @elseif($table->level_table == "Medium")
                                <div class="ribbon bg-warning text-lg">
                                    {{$table->level_table}}
                                </div>
                            @elseif($table->level_table == "VIP")
                                <div class="ribbon bg-danger text-lg">
                                    {{$table->level_table}}
                                </div>
                            @endif
                            
                        </div>
                        Table : <br /><h5>"{{$table->number}}"</h5><br />
                        <small>Created At : {{$table->created_at->diffForHumans()}}</small><br>
                        <a href="{{route('tableedit',$table->id)}}" class="btn btn-secondary float-right">Info<i class="fas fa-arrow-circle-right ml-2"></i></a>
                    </div>

                </div>
                @endforeach
              </div>
            </div>
            <div class="mx-auto">
                {{$tables->links()}}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection