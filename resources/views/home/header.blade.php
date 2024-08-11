<!-- header section strats -->
<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.html">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.html">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">

          @if (Route::has('login'))
             
          @auth

          <a href="{{url('myorders')}}" class="btn btn-outline-primary position-relative">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              My Orders
          </a>

          <a href="{{url('mycart')}}" class="btn btn-outline-primary position-relative">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{$count}}
                  <span class="visually-hidden">unread messages</span>
              </span>
          </a>

           <!-- Authentication -->
           <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
             @csrf
             <input class="btn btn-success" type="submit" value="Log Out">
            </form>

            @else

            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>

            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>

          @endauth
        @endif


            

            
            
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->