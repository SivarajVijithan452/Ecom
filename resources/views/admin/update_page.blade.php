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
        .form-group img {
            display: block;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
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
          <div class="container-fluid"></div>
            <h2>Update Product</h2>
            <div>
        <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{$data->Title}}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{$data->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}">
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity" value="{{$data->quantity}}">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="{{$data->category}}">{{$data->category}}</option>
                    @foreach ($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <img src="/products/{{$data->image}}" width="120">
            </div>

            <div class="form-group">
                <label>New Image</label>
                <input type="file" name="image">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update Product">
            </div>
        </form>
    </div>
          </div>
      </div>
    </div>
    @include('admin.adminjs')
  </body>
</html>