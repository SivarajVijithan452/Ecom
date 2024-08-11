<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table {
            margin-top: 20px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.slider')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="container mt-4">
            <h2 class="mb-4">Order Details</h2>
            <table class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>Customer Name</th>
                  <th>Customer Address</th>
                  <th>Customer Phone</th>
                  <th>Product Title</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Print</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $order)
                <tr>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->rec_address }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ $order->product->Title }}</td>
                  <td>{{ $order->product->price }}</td>

                  <td><img src="/products/{{ $order->product->image }}" alt="Product Image" class="img-fluid" style="max-width: 100px;"></td>
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
                  <td>
                    <a href="{{ url('on_the_way', $order->id) }}" class="btn btn-primary">On the Way</a>
                    <a href="{{ url('delivered', $order->id) }}" class="btn btn-success">Delivered</a>
                  </td>
                  <td>
                    <a href="{{url('print',$order->id)}}" class="btn btn-secondary">Print</a>
                  </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
  </body>
</html>
