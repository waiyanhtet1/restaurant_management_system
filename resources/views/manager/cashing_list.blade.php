@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cash out for Table "{{$table->number}}"</h1>
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
                  <a href="/cashing" class="btn btn-warning">Back</a>
                <table class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>Dish Name</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>At</th>
                        <th>Price</th> 
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->dish->name}}</td>
                            <td>
                                @if ($status[$order->status] == "having")
                                    <span class="badge bg-warning">Having</span>
                                    @else
                                    <span class="badge bg-success">Ready</span>
                                @endif
                            </td>
                            <td>{{$order->qty}}</td>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                            <td>{{$order->dish->price}}</td>
                            <td>{{ $amounts[] = $order->qty * $order->dish->price }}</td>
                        </tr>
                        @endforeach
                        <tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($amounts as $amount)  
                          @php
                            $total += $amount;
                          @endphp
                        @endforeach
                        <td colspan="4"><h5>Total:</h5></td>
                        <td><h5>{{$total}}</h5></td>
                        </tr>
                    </tbody>
                  </table>
                    <a href="/cashing/{{$table->id}}/print" class="btn btn-secondary mt-3 float-right"><i class="fas fa-print"></i> Print Invoice</a>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection