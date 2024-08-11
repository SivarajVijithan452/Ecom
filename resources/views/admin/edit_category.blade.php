<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
    .edit-design{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }
    input[type='text']{
        width: 400px;
        height: 50px;
    }
  </style>
  </head>
  <body>
   @include('admin.header')
    @include('admin.slider')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div>
             <h1>Edit Category</h1>
                <div class="edit-design">
                <form action="{{ url('update_category', $data->id) }}" method="POST">
                      @csrf
                      <input type="text" name="category" value="{{ $data->category_name }}">
                      <button type="submit">Update</button>
                  </form>
                </div>
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