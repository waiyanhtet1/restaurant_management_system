<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kitchen Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  {{-- toaster alert --}}
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="/dist/img/breakfast_psiw.svg" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">WYH Restaurant</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Kitchen Panel</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
     <div class="content">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Orders Table</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table text-center table-hover">
                      <thead>
                        <tr>
                          <th>Table Number</th>
                          <th>Dish Name</th>
                          <th>Quantity</th>
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
                        <td>
                            @if ($status[$order->status] == 'new')
                                <span class="badge bg-success">New</span>
                                @elseif($status[$order->status] == 'processing')
                                <span class="badge bg-primary">Processing</span>
                            @endif
                        </td>
                        <td>
                         @if ($status[$order->status] == 'new')
                         <a href="/kitchen/{{$order->id}}/approve" class="btn btn-primary">Approve</a>
                         @else
                         <a href="/kitchen/{{$order->id}}/done" class="btn btn-success">Done</a>
                         @endif
                        </td>
                        <td><a href="/kitchen/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>

<script>
// toast alert
  $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('message'))
                toastr.success('{{ Session::get('message') }}');
            @endif
        });
</script>        
</body>
</html>
