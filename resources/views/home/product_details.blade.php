<!DOCTYPE html>
<html>

<head>
  <title>Product Details</title>
  @include('home.css')
  <style>
    .img-design {
      padding: 30px;
    }

    .product-details {
      display: flex;
      align-items: flex-start; /* Align items to the top */
    }

    .product-details .img-container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .product-details .details-container {
      flex: 1;
      padding: 20px;
    }

    .details-container h6 {
      margin: 10px 0;
      font-size: 18px;
    }

    .details-container > div {
      margin-bottom: 10px; /* Add space between details */
    }

    .details-container > div strong {
      font-weight: bold;
      display: block; /* Ensure strong tags are block-level for new lines */
    }
    .description-container {
      margin-top: 20px; /* Adjust spacing */
      text-align: justify;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  <!-- Product details -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Latest Products</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="box">
            <div class="product-details">
              <div class="img-container img-design">
                <img src="/products/{{$data->image}}" width="400">
              </div>
              <div class="details-container detail-box">
                <div>
                <h6>{{$data->Title}}</h6>
                <div class="description-container">
                  Description: <strong>{{$data->description}}</strong>
                </div><br>
                  Price: <strong>LKR {{$data->price}}</strong><br>
                  Category: <strong>{{$data->category}}</strong><br>
                  Available quantity: <strong>{{$data->quantity}}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end of product details -->

  @include('home.footer')

</body>

</html>
