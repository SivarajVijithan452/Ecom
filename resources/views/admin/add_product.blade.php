<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
        .form-group {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }
        .form-group label {
            width: 150px;
            margin-right: 10px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            flex: 1;
        }
        .form-group textarea {
    width: 100%; /* Full width */
    height: 150px; /* Custom height */
    resize: vertical; /* Allow only vertical resizing */
}
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
  </head>
  <body>
   @include('admin.header')
    @include('admin.slider')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Add Product</h1>
            <div>
        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product Title</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" required></textarea>
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="price">
            </div>

            <div class="form-group">
                <label for="">Product Quantity</label>
                <input type="number" name="quantity">
            </div>

            <div class="form-group">
                <label for="">Product Category</label>
                <select name="category" id="">
                    <option value="">Select an Option</option>
                    @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="image">
            </div>

            <div class="form-group">
                <input class="btn-primary" type="submit" value="Add Product">
            </div>
        </form>
    </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>