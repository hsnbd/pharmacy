<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Vue js application" />

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/custom.css" />

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/tether.min.js"></script>
    {{-- <script type="text/javascript" src="/js/bootstrap.min.js"></script> --}}
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
                        <li class="list-inline-item"><a  data-toggle="modal" data-target=".login-form" href="">Login </a> </li> or
                        <li class="list-inline-item"><a data-toggle="modal" data-target=".sign-up-form" href="">Sign Up </a></li>
                        <li class="list-inline-item"><a class="text-success" href="/track">Track Order</a></li>
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
                <div class="mr-auto">
                    <div class="logo">
                        <div class="logo-text">
                            <a class="text-success " href="/"><b class="text-primary">Online </b>Pharmacy</a>
                        </div>
                        <img src="https://cdn3.iconfinder.com/data/icons/finalflags/256/Bangladesh-Flag.png" width="20px" />
                        <span class="text-muted text-micro">BD Trusted Online Pharmacy</span>
                    </div>
                </div>

                <!--top right -->
                <div class="text-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <form class="form-inline">
                              <div class="input-group c-input" style="width:400px;">
                                <input type="text" class="form-control" placeholder="Examples: Bayer Contour, OneTouch Ultra">
                                <span class="input-group-btn c-btn">
                                    <button class="btn btn-success" type="button"><i class="fa fa-search"></i> Search</button>
                                </span>
                               </div>
                            </form>
                        </li>

                        <li class="list-inline-item">
                            <a class="btn btn-circle" href="">Browse A - Z</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-circle" href="">Shape <img src="/images/medicine-icon.png" alt="" width="25px"></a>
                        </li>
                    </ul>
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
                                                <li><a href="/view/{{$cat->url_slug}}/{{$scat->url_slug}}">{{$scat->name}}</a></li>
            					            @endforeach
            				            </ul>
            			            </div>
            		            </div>
            	            </ul>
                        @endif
                      </li>
                  @endforeach
                  <li class="nav-item dropdown">
                    <a class="nav-link" href=""  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Other Services
                    </a>
                    <ul class="dropdown-menu multi-column columns-3">
    		            <div class="row">
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Action</a></li>
    					            <li><a href="#">Another action</a></li>
    					            <li><a href="#">Something else here</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">Separated link</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">One more separated link</a></li>
    				            </ul>
    			            </div>
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Action</a></li>
    					            <li><a href="#">Another action</a></li>
    					            <li><a href="#">Something else here</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">Separated link</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">One more separated link</a></li>
    				            </ul>
    			            </div>
    			            <div class="col-sm-4">
    				            <ul class="multi-column-dropdown">
    					            <li><a>Action</a></li>
    					            <li><a href="#">Another action</a></li>
    					            <li><a href="#">Something else here</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">Separated link</a></li>
    					            <li class="divider"></li>
    					            <li><a href="#">One more separated link</a></li>
    				            </ul>
    			            </div>
    		            </div>
    	            </ul>
                  </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link outline-success" href="/checkout" >
                            <span class=""><i class="fa fa-shopping-cart"></i></span>
                            (<span id="total-cart">0</span>)
                        </a>
                    </li>
                </ul>
          </div>
        </nav>
    </div>


    @yield('content')



    <!--footer -->
    <!--footer-->
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
      			  <form method="post">
        				<input class="form-control form-group" type="text" name="user" placeholder="email">
        				<input class="form-control form-group" type="password" name="pass" placeholder="Password">
        				<input class="form-control form-group btn-primary" type="submit" name="login" value="Login">
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
      			  <form method="post">
        				<input class="form-control form-group" type="text" name="user" placeholder="email">
        				<input class="form-control form-group" type="password" name="pass" placeholder="Password">
        				<input class="form-control form-group" type="password" name="pass" placeholder="Re-type Password">
        				<input class="form-control form-group btn-primary" type="submit" name="login" value="Login">
      			  </form>

      			  <div class="login-help">
      				   <a  data-toggle="modal" data-target=".login-form" href="" data-dismiss="modal">LogIn</a>
      			  </div>
    			</div>
  		</div>
	  </div>

    @stack('scripts')
</body>
</html>
