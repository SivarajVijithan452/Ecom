<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
  .orders-table {
      margin-top: 20px;
  }

  .orders-table th, .orders-table td {
      text-align: center;
      vertical-align: middle;
  }
</style>
</head>

<body>
  <div class="hero_area">
      @include('home.header')
      @include('home.slider')
  </div>

  <div class="container orders-table mt-4">
      <h2 class="mb-4">My Orders</h2>
      <table class="table table-striped table-bordered">
          <thead class="thead-dark">
              <tr>
                  <th>Product Title</th>
                  <th>Product Price</th>
                  <th>Status</th>
                  <th>Product Image</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
              <tr>
                  <td>{{ $order->product->Title }}</td>
                  <td>LKR.{{ $order->product->price }}</td>
                  <td>
                      @if($order->status == 'in progress')
                          <span class="badge badge-warning">{{ $order->status }}</span>
                      @elseif ($order->status == 'On the Way')
                          <span class="badge badge-info">{{ $order->status }}</span>
                      @elseif ($order->status == 'Delivered')
                          <span class="badge badge-success">{{ $order->status }}</span>
                      @else
                          <span>{{ $order->status }}</span>
                      @endif
                  </td>
                  <td><img src="products/{{ $order->product->image }}" alt="Product Image" class="img-fluid" style="max-width: 100px;"></td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>

  @include('home.footer')

  <!-- Include your JavaScript files -->
  <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
  <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
  <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
  <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>

</html>
