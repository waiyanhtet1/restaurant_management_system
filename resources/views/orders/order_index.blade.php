@extends('layouts.orderlayout')
@section('ordercontent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Submit Orders</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ordersubmit') }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach ($dishes as $dish)
                                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                <div class="card shadow-lg" style="width: 11rem; height: 21rem;">
                                  <img src="{{ url('/images/'.$dish->image) }}" style="height: 130px;" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="card-title mb-2"><b>{{ $dish->name }}</b></h3>
                                    <p class="card-text"><i class="fas fa-chart-pie"></i> {{ $dish->category->name }}</p>
                                    <p class="card-text">Price: {{ $dish->price }} Kyts.</p>
                                </div>
                                <div class="card-footer">
                                    <input type="number" name="{{ $dish->id }}" class="form-control text-center" max="10" min="1">
                                </div>
                                </div>
                                </div>
                                @endforeach
                              </div>
          
                <div class="form-group mt-4">
                    <select name="table" class="form-control w-50">
                        <option value="" disabled selected>Select Table</option>
                        @foreach ($tables as $table)
                            <option value="{{$table->id}}">{{$table->number}}</option>
                        @endforeach
                    </select>
                </div>
                    <button type="submit" class="btn btn-warning float-right w-25">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
