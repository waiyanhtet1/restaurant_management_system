<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurnat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  {{-- data table --}}
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- toaster alert --}}
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout<i class="fas fa-sign-out-alt ml-2"></i></button>
        </form>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/dist/img/breakfast_psiw.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-2 mx-1" style="">
      <span class="brand-text font-weight-light">WYH Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
            {{-- Cashing --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-cash-register m-1"></i>
              <p>Cashing</p>
            </a>
          </li>

          {{-- Tables Control --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-chair m-1"></i>
              <p>Tables Control</p>
            </a>
          </li>

          <!-- Dishes Control-->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active bg-warning text-light">
                <i class="fas fa-hamburger m-1"></i>
              <p>
                Dishes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dishes" class="nav-link {{Request::segment(1) == 'dishes' ? 'active':''}}">
                    <i class="fas fa-utensils m-1"></i>
                  <p>Dishes Control</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/categories" class="nav-link {{Request::segment(1) == 'categories'? 'active': ''}}">
                    <i class="fas fa-cocktail m-1"></i>
                  <p>Category Control</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- worker control  --}}
          <li class="nav-item ">
            <a href="#" class="nav-link  bg-warning text-light">
                <i class="fas fa-users m-1"></i>
              <p>
                Workers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('workerindex')}}" class="nav-link {{Request::segment(1) == 'workers'?'active':''}}">
                    <i class="fas fa-user-cog m-1"></i>
                  <p>Workers Control</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/roles" class="nav-link {{Request::segment(1) == 'roles'?'active':''}}">
                    <i class="fas fa-user-check m-1"></i>
                  <p> Roles Control</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
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
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>

<script>
     $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

// toast alert
  $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('message'))
                toastr.success('{{ Session::get('message') }}');
            @endif
        });
// validation error message
      @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              toastr.error("{{ $error }}");
          @endforeach
      @endif
  </script>
</body>
</html>
