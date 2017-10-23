<!DOCTYPE html>
<html>
<head>
    <title>Online Pharmacy || BD Trusted Online Pharmacy</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Vue js application" />

    {{-- <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/custom.css" />

    <!--_______________ SCRIPT FILE _______________________________________-->
      <script type="text/javascript" src="{{url('/')}}/js/jquery.min.js"></script>
      <script type="text/javascript" src="{{url('/')}}/js/tether.min.js"></script>
      <script type="text/javascript" src="{{url('/')}}/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="{{url('/')}}/js/jsFunction.js"></script>
      <script type="text/javascript" src="{{url('/')}}/js/script.js"></script>
    {{-- @stack('scripts') --}}
</head>
<body>
    <!--top-bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <!--top left -->
                <div class="mr-auto">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown list-inline-item">
                            <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Customer Service
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="dropdown-item"><a href="">Live Chat</a></li>
                                <li class="dropdown-item"><a href="">FAQs</a></li>
                                <li class="dropdown-item"><a href="">Contact info</a></li>
                                <li class="dropdown-item"><a href="">How it works</a></li>
                            </ul>
                        </li>
                        <li class="list-inline-item"><i class="fa fa-phone"></i> +02748585634</li>
                        <li class="list-inline-item"><i class="fa fa-envelope"></i> info@pharmacy.com</li>
                    </ul>
                </div>
                <!--top right -->
                <div class="text-right">
                    <ul class="list-unstyled list-inline">
                        @guest
                            <li class="list-inline-item"><a  data-toggle="modal" data-target=".login-form" href="">Login </a> </li> or
                            <li class="list-inline-item"><a data-toggle="modal" data-target=".sign-up-form" href="">Sign Up </a></li>
                        @else
                            <li class="dropdown list-inline-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                            <li class="list-inline-item"><a class="text-success" href="{{url('/')}}/track">Track Order</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--logo and search-bar -->
    <div class="logo-search">
        <div class="container">
            <div class="row">
                <!--top left -->
                <div class="col-md-6">
                    <div class="logo">
                        <div class="logo-text">
                            <a class="text-success " href="{{url('/')}}"><b class="text-primary">Online </b>Pharmacy</a>
                        </div>
                        <img src="{{url('/')}}/images/Bangladesh-Flag.png" width="20px" />
                        <span class="text-muted text-micro">BD Trusted Online Pharmacy</span>
                    </div>
                </div>
                <!--top right -->
                <div class="col-md-6">
                    <form class="searchForm" method="get" action="{{route("search")}}">
                      <div class="input-group c-input" style="width:400px;">
                        <input id="search" data-ajax-url="{{route("live.search")}}" type="text" name="s" class="form-control" placeholder="Examples: Bayer Contour, OneTouch Ultra" autocomplete="off" >
                        <span class="input-group-btn c-btn">
                            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Search</button>
                        </span>
                       </div>
                       <ul id="results" class='list-unstyled'></ul>
                    </form>
                    {{-- <ul class="list-unstyled list-inline pull-right">
                        <li class="list-inline-item">

                        </li>
                         <li class="list-inline-item">
                            <button class="btn btn-circle" id="callShape">Shape <img src="{{url('/')}}/images/medicine-icon.png" alt="" width="25px"></button>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!--logo and menu-bar -->
    <div class="menu-bar">
        <nav class="navbar navbar-toggleable-sm navbar-default">
          <div class="container">
              <ul class="navbar-nav  mr-auto">
                  @foreach ($cat  as $cat)
                      <li class="nav-item dropdown">
                        <a class="nav-link" href=""  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{$cat->name}}
                        </a>
                        @if ($cat->subCategories->count())
                            <ul class="dropdown-menu">
            		            <div class="row">
            			            <div class="col-sm-12">
            				            <ul class="multi-column-dropdown">
            					            {{-- <li><a>Action</a></li> --}}
            					            @foreach ($cat->subCategories as $scat)
                                                <li><a href="{{url('/')}}/view/{{$cat->url_slug}}/{{$scat->url_slug}}">{{$scat->name}}</a></li>
            					            @endforeach
            				            </ul>
            			            </div>
            		            </div>
            	            </ul>
                        @endif
                      </li>
                  @endforeach
                  <li class="nav-item dropdown">
                    <a class="nav-link" href=""  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Other Services </a>
                    <ul class="dropdown-menu multi-column columns-3">
    		            <div class="row">
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Vahicle</a></li>
    					            <li><a href="#">Ambulance</a></li>
    					            <li><a href="#">Wheel Chare</a></li>
    					            <li><a href="#">Strecher</a></li>
    				            </ul>
    			            </div>
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Service</a></li>
    					            <li><a href="#">Online Doctor</a></li>
    					            <li><a href="#">Direct Doctor</a></li>
    					            <li><a href="#">Mentor</a></li>
    					            <li><a href="#">Guide</a></li>
    				            </ul>
    			            </div>
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Action</a></li>
    					            <li><a href="#">Another action</a></li>
    					            <li><a href="#">Something else here</a></li>
    					            <li><a href="#">Separated link</a></li>
    					            <li><a href="#">One more separated link</a></li>
    				            </ul>
    			            </div>
    		            </div>
    	            </ul>
                  </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link btn-circle btn btn-outline-success" href="{{url('/')}}/cart"  id="navbarDropdownMenuLink" >
                            <span class=""><i class="fa fa-shopping-cart"></i></span>
                            (<span id="total-cart"></span>)
                        </a>
                        <div id="item-display"> </div>
                    </li>
                </ul>
          </div>
        </nav>
    </div>
    @yield('content')
    <!--footer -->
    <footer class="footer1">
    <div class="container">
    <div class="row"><!-- row -->
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Useful links</h1>
                                <ul>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Success Stories</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> PG Courses</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Achiever's Batch</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Regular Batch</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Test & Discussion</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Fast Track T & D</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- widgets column left end -->
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Useful links</h1>
                                <ul>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Test Series Schedule</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Postal Coaching</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  PG Dr. Bhatia Books</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  UG Courses</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Satellite Education</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Study Centres</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i>  State P.G. Mocks</a></li>
                                    <li><a  href="#" target="_blank"><i class="fa fa-angle-double-right"></i> Results</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- widgets column left end -->
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Useful links</h1>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Enquiry Form</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Online Test Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Grand Tests Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Subject Wise Test Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Test Centres</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Admission Form</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Computer Live Test</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- widgets column left end -->
                    <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                                <h1 class="title-widget">Contact Detail </h1>
                                <div class="footerp">
                                    <h2 class="title-median">Webenlance Pvt. Ltd.</h2>
                                    <p><b>Email id:</b> <a href="mailto:info@webenlance.com">info@webenlance.com</a></p>
                                    <p><b>Helpline Numbers </b>
                                    <b style="color:#ffc106;">(8AM to 10PM):</b>  +91-8130890090, +91-8130190010  </p>
                                    <p><b>Corp Office / Postal Address</b></p>
                                    <p><b>Phone Numbers : </b>7042827160, </p>
                                    <p> 011-27568832, 9868387223</p>
                                </div>
                                <div class="social-icons">
                                    <ul class="nomargin">
                                        <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
                                        <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
                                        <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
                                        <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
    </footer>
    <!--header-->
    <div class="footer-bottom">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    				<div class="copyright">
    					© 2015, Webenlance, All rights reserved
    				</div>
    			</div>
    			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    				<div class="design">
    					 <a href="#">Franchisee </a> |  <a target="_blank" href="http://www.webenlance.com">Web Design & Development by Webenlance</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <!--log in and sign up form -->
    <div class="modal fade login-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="loginmodal-container">
            	<h3 class="text-center">Login</h3><br>
                <img id="loader" style="display:none; margin: 20px 50px;" src="{{url('/')}}/images/loader.gif" width="200px" alt="">
                <div  class="alert " role="alert" style="display:none;"></div>
            	<form method="POST" id="log-in" action="{{ route('login') }}">
                    {{ csrf_field() }}
            		<div class="form-group">
                        <label for="email" class="control-label">E-Mail Address</label>
            		    <input class="form-control" type="text" name="email" required autofocus>
            		</div>
            		<div class="form-group">
                        <label for="Password" class="control-label">Password</label>
            		   <input class="form-control form-group" type="password" name="password" required>
            		</div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label> <input type="checkbox" name="remember" > Remember Me </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="sign-in" class="btn btn-primary" value="Login">
                        <a class="btn btn-link" href="{{ route('password.request') }}"> Forgot Your Password? </a>
                    </div>
            	  </form>
                <div class="login-help">
                  <a id="sign-up-form"  data-toggle="modal" data-target=".sign-up-form" href="" data-dismiss="modal">Sign Up</a> - <a href="#">Forgot Password</a>
                </div>
            </div>
  		</div>
	</div>

      <div class="modal fade sign-up-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    	  <div class="modal-dialog">
    			<div class="loginmodal-container">
      				<h3 class="text-center">Sign Up</h3><br>
                    <img id="loader" style="display:none; margin: 20px 50px;" src="{{url('/')}}/images/loader.gif" width="200px" alt="">
                    <div  class="alert " role="alert" style="display:none;"></div>
      			  <form id="sign-up" method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label for="name" class="control-label">Name</label>
                          <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label">E-Mail Address</label>
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                      </div>
                      <div class="form-group">
                          <label for="password" class="control-label">Password</label>
                          <input id="password" type="password" class="form-control" name="password" required>
                      </div>
                      <div class="form-group">
                          <label for="password-confirm" class="control-label">Confirm Password</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                      <div class="form-group">
                          <button type="submit" id="register" class="btn btn-primary"> Register </button>
                      </div>
      			  </form>
      			  <div class="login-help">
      				   <a  data-toggle="modal" data-target=".login-form" href="" data-dismiss="modal">LogIn</a>
      			  </div>
    			</div>
  		</div>
	  </div>
</body>
</html>
