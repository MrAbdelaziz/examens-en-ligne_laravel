<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MA2XM') }}</title>
    <meta name="description" content="MA2XM MA2X.COM">
    <!-- Favicon -->
    <link href="{{ asset('landing') }}/images/marker.png" rel="icon" type="image/png">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('landing') }}/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('landing') }}/styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/plugins/OwlCarousel2-2.2.1/animate.css">
	
	
	
	<link href="{{ asset('landing') }}/styles/bundles/websitepublic/css/jquery-ui.min.css" media="all" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/css/owl-carousel-2.3.4/owl.carousel.min.css" media="all" rel="stylesheet"/>               
    <link href="{{ asset('landing') }}/styles/bundles/websitepublic/css/jquery.smartbanner.css" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/css/hover-2.3.1/hover-custom.css" media="all" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/bundles/websitepublic/css/style98a9.css" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/css/aos-2.2.0/aos.css" media="all" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/bundles/websitebase/css/path-path-highlight.css" media="all" rel="stylesheet"/>
    <link href="{{ asset('landing') }}/styles/bundles/websitepublic/css/homepage68b3.css" media="all" rel="stylesheet"/>
	
	
	
    <link rel="stylesheet" href="{{ asset('landing') }}/styles/main_styles.css">
    <link rel="stylesheet" href="{{ asset('landing') }}/styles/responsive.css">
</head>
<body>
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
    @endauth
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="top_bar_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                    <ul class="top_bar_contact_list">
                                        <li><div class="question">Have any questions?</div></li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div>+(212) 525081166</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <div>support@ma2x.com</div>
                                        </li>
                                    </ul>
                                    <div class="top_bar_login ml-auto">
                                        <div class="login_button">
                                            @auth
                                            <a href="{{ route('home') }}" style="display:inline-block;">Dashboard</a>
                                            <a href="#" style="display:inline-block;">|</a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display:inline-block;">Logout</a>
                                            @else
                                            <a href="{{ route('register') }}" style="display:inline-block;">Register</a>
                                            <a href="#" style="display:inline-block;">|</a>
                                            <a href="{{ route('login') }}" style="display:inline-block;">Login</a>
                                            @endauth
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>

            <!-- Header Content -->
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href="{{ route('home_path') }}">
                                        <div class="logo_text">MA2X<span>M</span></div>
                                    </a>
                                </div>
                                    <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li id="nv1"><a href="/">Home</a></li>
                                        <li id="nv2"><a href="/about">About</a></li>
                                        <li id="nv3"><a href="/contact">Contact</a></li>
                       
                                    </ul>
                                    <div class="search_button"><i class="fas fa-search" aria-hidden="true"></i></div>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Search Panel -->
            <div class="header_search_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                                <form action="{{ route('search') }}" method="get" class="header_search_form">
                                    <input type="search" name="tag" class="search_input" placeholder="Search">
                                    <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>          
        </header>

        <!-- Menu -->

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
            <div class="search">
                <form action="{{ route('search') }}" method="get" class="header_search_form menu_mm">
                    <input type="search" name="tag" class="search_input menu_mm" placeholder="Search" required="required">
                    <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fas fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="/">Home</a></li>
                    <li class="menu_mm"><a href="/about">About</a></li>
                    <li class="menu_mm"><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
        
        <!-- Home -->

        
             @yield('search')  
        
        
    <!-- Features -->
    <div class="features" style="padding:0px">
	<div>
         @yield('content')
		 </div>
        <div class="newsletter">
            <div class="newsletter_background parallax-window" data-parallax="scroll" style="background:url('http://127.0.0.1:8000/landing/images/newsletter.jpg')" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                            <!-- Newsletter Content -->
                            <div class="newsletter_content text-lg-left text-center">
                                <div class="newsletter_title">sign up for news</div>
                                <div class="newsletter_subtitle">Receive news about MA2XM and online Exmas
</div>
                            </div>

                            <!-- Newsletter Form -->
                            <div class="newsletter_form_container ml-lg-auto">
                                <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                    <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                                    <button type="submit" class="newsletter_button">subscribe</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
            <div class="footer_background" style="background-image:url({{ asset('landing') }}/images/footer_background.png)"></div>
            <div class="container">
                <div class="row footer_row">
                    <div class="col">
                        <div class="footer_content">
                            <div class="row">

                                <div class="col-lg-3 footer_col">
                        
                                    <!-- Footer About -->
                                    <div class="footer_section footer_about">
                                        <div class="footer_logo_container">
                                            <a href="#">
                                                <div class="footer_logo_text">MA2X<span>M</span></div>
                                            </a>
                                        </div>
                                        <div class="footer_about_text">										
                                            <p style="text-transform:lowercase">
											<span style="text-transform:uppercase">M</span>A2XM is an Educational Platform that offers online exams in various categories under the supervision of skilled and talented Authors to help individuals to get certifications</p>
                                        </div>
                                        <div class="footer_social">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-3 footer_col">
                        
                                    <!-- Footer Contact -->
                                    <div class="footer_section footer_contact">
                                        <div class="footer_title">Contact Us</div>
                                        <div class="footer_contact_info">
                                            <ul>
                                                <li>Email: support@ma2x.com</li>
                                                <li>Phone:  +(212) 525081166</li>
                                                <li>EMSI MARRAKECH, Maroc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-3 footer_col">
                        
                                    <!-- Footer links -->
                                    <div class="footer_section footer_links">
                                        <div class="footer_title">Pages</div>
                                        <div class="footer_links_container">
                                            <ul>
                                                <li><a href="/">Home</a></li>
                                                <li><a href="/about">About</a></li>
                                                <li><a href="/contact">Contact</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-3 footer_col clearfix">
                        
                                    <!-- Footer links -->
                                    <div class="footer_section footer_mobile">
                                        <div class="footer_title">Mobile</div>
                                        <div class="footer_mobile_content">
                                            <div class="footer_image"><a href="#"><img src="{{ asset('landing') }}/images/mobile_1.png" alt=""></a></div>
                                            <div class="footer_image"><a href="#"><img src="{{ asset('landing') }}/images/mobile_2.png" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row copyright_row">
                    <div class="col">
                        <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
                            <div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                            <div class="ml-lg-auto cr_links">
                                <ul class="cr_list">
                                    <li><a href="#">Copyright notification</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('landing') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('landing') }}/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('landing') }}/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('landing') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ asset('landing') }}/plugins/easing/easing.js"></script>
    <script src="{{ asset('landing') }}/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="{{ asset('landing') }}/js/custom.js"></script>
	</div>
</body>
</html>
