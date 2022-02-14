@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Processing Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders Process</li>
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
                  <table class="table text-center table-hover">
                      <thead>
                        <tr>
                          <th>Table Number</th>
                          <th>Dish Name</th>
                          <th>Quantity</th>
                          <th>At</th>
                          <th>Status</th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)    
                        <tr>
                        <td>{{ $order->table->number }}</td>
                        <td>{{ $order->dish->name }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td>
                          @if ($status[$order->status] == "new")
                          <span class="badge bg-success">New</span>
                          @elseif($status[$order->status] == "processing")
                          <span class="badge bg-primary">Processing</span>
                          @elseif($status[$order->status] == "cancel")
                          <span class="badge bg-danger">Cancel</span>
                          @elseif($status[$order->status] == "ready")
                          <span class="badge bg-secondary">Ready</span>
                          @elseif($status[$order->status] == "having")
                          <span class="badge bg-warning">Having</span>
                          @elseif($status[$order->status] == "paid")
                          <span class="badge bg-success">Paid</span>
                          @endif
                        </td>
                        @endforeach
                      </tbody>
                    </table>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection