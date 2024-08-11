<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
   .table-design {
            margin-top: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .table-dec {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            padding: px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
        td {
            background-color: #f8f9fa;
            color: black;
        }
        img {
            max-height: 120px;
            max-width: 120px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }
        .search-container input[type="search"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            outline: none;
            width: 500px;
        }
        .search-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: green;
            color: white;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
            outline: none;
        }
        .search-container input[type="submit"]:hover {
            background-color: darkgreen;
        }
  </style>
  </head>
  <body>
   @include('admin.header')
    @include('admin.slider')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <!-- search bar -->
            <div class="search-container">
                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search...">
                    <input type="submit" class="btn btn-success" value="Search">
                </form>
            </div>
            <!-- product table -->
            <div class="table-design">
                <table class="table-dec">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)
                    <tr>
                        <td>{{$products->Title}}</td>
                        <td>{!!Str::limit($products->description,50)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$products->image}}">
                        </td>
                        <td>
                          <a href="{{url('update_product',$products->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                          <a href="{{url('delete_product',$products->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            <div class="pagination">
                    {{ $product->onEachSide(1)->links() }}
                </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.adminjs')
  </body>
</html>