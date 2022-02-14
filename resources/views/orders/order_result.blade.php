@extends('layouts.orderlayout')
@section('ordercontent')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Waiter Panel</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders Result</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
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
                                <th>Ready At</th>
                                <th>Status</th>
                                <th>Actions</th>    
                                <th></th>    
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)    
                              <tr>
                              <td>{{ $order->table->number }}</td>
                              <td>{{ $order->dish->name }}</td>
                              <td>{{ $order->qty }}</td>
                              <td>{{ $order->updated_at->diffForHumans() }}</td>
                              <td><span class="badge bg-success">{{ $status[$order->status] }}</span></td>
                              <td>
                                  <a href="/orderserve/{{$order->id}}/serve" class="btn btn-warning">Serve</a>
                              </td>
                              <td>
                                  <a href="/orderserve/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
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
@endsection
