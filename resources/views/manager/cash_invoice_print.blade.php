<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
            <a href="/cashing/{{$table->id}}/checkout" style="text-decoration: none;" class="text-warning">WYH Restaurant</a>
          <small class="float-right">Date: <p id="date"></p></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>{{ auth()->user()->name }}</strong>
        </address>
      </div>
    </div>

    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped text-center">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Dishes</th>
            <th>Price</th>
            <th>Amount</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
                  <tr>
                      <td>{{$order->qty}}</td>
                      <td>{{$order->dish->name}}</td>
                      <td>{{$order->dish->price}}</td>
                      <td>{{ $amounts[] = $order->qty * $order->dish->price}}</td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        
      </div>
      <!-- /.col -->
      <div class="col-6">

        <div class="table-responsive">
          <table class="table">
            <tr>
                @php
                    $total = 0;
                @endphp
                @foreach ($amounts as $amount)  
                  @php
                    $total += $amount;
                  @endphp
                @endforeach
                <td><h5>Total:</h5></td>
                <td><h5>{{$total}}</h5></td>
                </tr>
          </table>
        </div>
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
{{-- <a href="/cashing/{{$table->id}}/checkout" class="btn btn-warning float-right mt-3">Submit Payment</a> --}}
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
</body>
</html>
