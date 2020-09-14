<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/admin-asset/css/bootstrap.min.css')}}"  >

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('public/admin-asset/css/web_custom.css')}}">
<style>
ul#menu li {
  display:inline;
  padding: 5%;
}
</style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- fontawesome -->
 
      <link rel="stylesheet" href="{{asset('public/admin-asset/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/css/ionicons.min.css')}}">

    @yield('title')       
  </head>
  <body>
    <header>
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-md-8 text-center text-md-left">
              <div class="header-contact">
                <a href="mailto:info@domain.com"><img src="{{asset('public/admin-asset/font_images/icon17.png')}}" alt=""> <span class="ml-1">info@domain.com</span></a>
                <a href="tel:+971 56 012 3456" class="ml-4"><!-- <i class="fa fa-phone"></i> --><img src="{{asset('public/admin-asset/font_images/icon18.png')}}" alt=""> <span class="ml-1">+971 56 012 3456</span></a>
              </div>
            </div>
            <div class="col-md-4 text-center text-md-right">
              <div class="login-register-btn d-inline-block">
                  
                  <ul id="menu">
                   @if(!empty(Auth::guard('web')->user()->id))
                          <li>
                                <a href="{{url('profile')}}">
                                    <i class="fa fa-user"></i>{{ucwords(Auth::guard('web')->user()->name)}}
                                </a>
                            </li>
                          <li>
                            <li>
                                <a href="{{url('logout')}}">
                                    <i class="fa fa-sign-out"></i>Logout
                                </a>
                            </li>
                         @else
                            <li>
                                <a href="{{url('login')}}">
                                    <i class="fa fa-sign-in"></i>Login
                                </a>
                            </li>
                            <li>
                                <a href="{{url('registration')}}">
                                    <i class="fa fa-pencil-square-o"></i> Registration 
                                </a>
                            </li>
                        @endif
              </ul>
              
              </div>
            </div>
          </div>
        </div>
      </div>

      <nav class="navbar navbar-expand-xl navbar-light bg-light theme-navbar py-4">
        <div class="container">
        <a class="navbar-brand" href="#">
<!--          <img src="{{asset('public/admin-asset/font_images/logo.png')}}" alt="" width="240">-->
         
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Services
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">F&B</a>
                <a class="dropdown-item" href="#">Retail</a>
                <a class="dropdown-item" href="#">Events</a>
                <a class="dropdown-item" href="#">E-commerce</a>
                <a class="dropdown-item" href="#">Logistics</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item px-xl-0 mt-2 mt-xl-0">
              <a class="nav-link nav-btn ml-xl-3 px-3 text-center" href="#">Book Now</a>
            </li>
            <li class="nav-item px-xl-0 mt-2 mt-xl-0">
              <a class="nav-link nav-btn ml-xl-3 px-3 text-center" href="#">Work With Us</a>
            </li>
          </ul> -->
        </div>
        </div>
      </nav>
    </header>

    <div class="banner">
      <img src="{{asset('public/admin-asset/font_images/img1.jpg')}}" alt="" class="img-fluid">
      <div class="overlay-bg"></div>
      <div class="banner-info">
<!--        <h4 class="text-uppercase semi-bold mb-0">Login</h4>-->
      </div>
    </div>
      <div class="sectn my-5" style="min-height: 450px;margin-left:5%;margin-top:5%">
      <div class="container">
 @yield('container')  
      </div>
    </div>

    <footer>
      <div class="footer-top py-4 py-md-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-xl-4">
              <a href="index.html" class="mb-3 d-inline-block">Logo <!-- <img src="images/logo-footer.png" alt="" width="140"> --> </a>
              <p>Lorem ipsum dolor sit amet consectetur adipiu scingelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul class="fa-ul ml-4 mb-0">
                <li><span class="fa-li" ><i class="fa fa-map-marker-alt"></i></span> Building, Pin-432123234 </li>
                <li class="mt-2"><a href="mailto:info@domain.com"><span class="fa-li"><i class="fa fa-envelope"></i></span> info@domain.com</a></li>
                <li class="mt-2"><a href="tel:+971 56 012 3456"><span class="fa-li"><i class="fa fa-phone"></i></span>+00971 56 012 3456</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-xl-4">
             <!-- <h5 class="mt-4 mt-md-0 mb-3 mb-md-4">Sitelinks</h5>
              <a href="#" class="ml-3 ml-md-4">About Us</a>
              <a href="#" class="ml-3 ml-md-4">Services</a>
              <a href="#" class="ml-3 ml-md-4">Contact Us</a>  -->
            </div>
            <div class="col-md-12 col-xl-4">
              <h5 class="mt-4 mt-md-5 mt-xl-0 mb-3 mb-md-4">Lorem ipsum</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipiu scingelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              
            </div>
          </div>
        </div>
      </div>
      <div class="footer-btm">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-left order-last order-md-first">
              <p class="mt-md-4 mb-3">&copy; Upright Spine Sol 2020 All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-center text-md-right">
              <div class="socials my-3">
                <a href="#" title="facebook"><i class="fa fa-facebook-f"></i></a>
                <a href="#" title="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" title="google +"><i class="fa fa-google-plus-g"></i></a>
                <a href="#" title="pinterest"><i class="fa fa-pinterest-p"></i></a>
                <a href="#" title="youtube"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--     <script src="{{asset('public/admin-asset/js/jquery.min.js')}}"></script>
         Bootstrap 3.3.7 
        <script src="{{asset('public/admin-asset/js/bootstrap.min.js')}}"></script>-->
        <!-- SlimScroll -->
        <script src="{{asset('public/admin-asset/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/admin-asset/js/jquery.min.js')}}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{asset('public/admin-asset/js/bootstrap.min.js')}}"></script>
  </body>
</html>