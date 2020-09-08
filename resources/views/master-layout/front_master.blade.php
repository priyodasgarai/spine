<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/web-asset/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/web-asset/fonts/font-awesome.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/web-asset/css/selectize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/web-asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/web-asset/css/user.css')}}">

	
  
</head>
<body>
    <div class="page sub-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header class="hero has-dark-background">
            <div class="hero-wrapper">
                <!--============ Secondary Navigation ===============================================================-->
               <div class="secondary-navigation">
                    <div class="container">
                        <ul class="left">
                            <li>
                            <span>
                                <i class="fa fa-phone"></i> +1 123 456 789
                            </span>
                            </li>
                        </ul>
                        <!--end left-->
                        <ul class="right">
                           
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
                        <!--end right-->
                    </div>
                    <!--end container-->
                </div>
                @yield('secondary-navigation')  
                <!--============ End Secondary Navigation ===========================================================-->
                <!--============ Main Navigation ====================================================================-->
               @yield('main-navigation')  
               
                <!--============ End Main Navigation ================================================================-->
                <!--============ Hero Form ==========================================================================-->
                 @yield('Hero-Form')  
              
                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
              @yield('page-title')  
               
                <!--============ End Page Title =====================================================================-->
                <div class="background">
                    <div class="background-image">
                        <img src="{{asset('public/web-asset/img/hero-background-image-01.jpg')}}" alt="">
                    </div>
                    <!--end background-image-->
                </div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </header>
        <!--end hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
     @yield('main-content')    
     
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="footer">
            <div class="wrapper">
                 @yield('footer-container')    
                  @yield('footer-background')    
            <div class="background">
      <div class="background-image original-size" style="background-color: #363636">
<!--                        <img src="{{asset('public/web-asset/img/footer-background-icons.jpg')}}" alt="">-->
                    </div>
                    <!--end background-image-->
                </div>
              
                <!--end background-->
            </div>
        </section>
        <!--end footer-->
    </div>
    <!--end page-->

	<script src="{{asset('public/web-asset/js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/web-asset/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/web-asset/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
	<script src="{{asset('public/web-asset/js/selectize.min.js')}}"></script>
	<script src="{{asset('public/web-asset/js/masonry.pkgd.min.js')}}"></script>
	<script src="{{asset('public/web-asset/js/icheck.min.js')}}"></script>
	<script src="{{asset('public/web-asset/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('public/web-asset/js/custom.js')}}"></script>

</body>
</html>
