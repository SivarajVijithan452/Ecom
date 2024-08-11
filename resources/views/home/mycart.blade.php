<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .order-form {
            width: 45%; /* Adjust width as needed */
        }

        .order-form form {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .order-form label {
            font-weight: bold;
        }

        .order-form input[type="text"],
        .order-form textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .order-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .order-form .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .cart-table {
            width: 50%; /* Adjust width as needed */
        }

        .total-value {
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    <!-- end hero area -->
    <div class="container mt-4">
        <div class="order-form">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Receiver Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                </div>

                <div class="form-group">
                    <label>Receiver Address</label>
                    <textarea name="address" class="form-control">{{Auth::user()->address}}</textarea>
                </div>

                <div class="form-group">
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Place Order">
                </div>
            </form>
        </div>

        <div class="cart-table">
            @if($count > 0)
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $value = 0; ?>
                    @foreach ($cart as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->Title }}</td>
                        <td>LKR.{{ $cartItem->product->price }}</td>
                        <td><img src="/products/{{ $cartItem->product->image }}" alt="product image"
                                class="img-fluid" style="max-width: 100px;"></td>
                        <td><a href="{{ url('delete_cart', $cartItem->id) }}"
                                class="btn btn-danger">Remove</a></td>
                    </tr>
                    <?php $value += $cartItem->product->price; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="total-value mt-3">
                <h5>Total Value: LKR. {{ $value }}</h5>
            </div>
            @else
            <div class="alert alert-info">
                Your cart is empty.
            </div>
            @endif
        </div>
    </div>

    @include('home.footer')

</body>

</html>
