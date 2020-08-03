<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MA2XM') }}</title>
    <meta name="description" content="MA2XM MA2XCOM">
    <!-- Favicon -->
    <link href="{{ asset('landing') }}/images/marker.png" rel="icon" type="image/png">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('landing') }}/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
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
                                            <div>support@ma2xm.com</div>
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
                                    <a href="#">
                                        <div class="logo_text">MA2X<span>M</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="#">Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                    <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
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
                                <form action="#" class="header_search_form">
                                    <input type="search" class="search_input" placeholder="Search" required="required">
                                    <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
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
                <form action="#" class="header_search_form menu_mm">
                    <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                    <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="index.html">Home</a></li>
                    <li class="menu_mm"><a href="#">About</a></li>
                    <li class="menu_mm"><a href="#">Courses</a></li>
                    <li class="menu_mm"><a href="#">Blog</a></li>
                    <li class="menu_mm"><a href="#">Page</a></li>
                    <li class="menu_mm"><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
        
        <!-- Home -->

        <div class="home">
            <div class="home_slider_container">
                <!-- Home Slider -->
                <div class="owl-carousel owl-theme home_slider">
                    <!-- Home Slider Item -->
                    <div class="owl-item">
                        <div class="home_slider_background" style="background-image:url({{ asset('landing') }}/images/home_slider_1.jpg)"></div>
                        <div class="home_slider_content">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="home_slider_title">VERIFY YOUR SKILLS</div>
                                        <div style="font-family: 'Roboto Slab', serif;
font-size: 36px;
font-weight: 700;
line-height: 1.2;
color: #384158;"> AND UNLOCK OPPORTUNITY</div>
                                        <div class="home_slider_subtitle">Find Your Online Exam</div>
                                        <div class="home_slider_form_container">
                                            <form action="#" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
                                                <div class="d-flex flex-row align-items-center justify-content-start">
                                                    <input type="search" class="home_search_input" placeholder="Keyword Search" required="required">
                                                    <select class="dropdown_item_select home_search_input">
                                                        <option>Category Courses</option>
                                                        <option>Category</option>
                                                        <option>Category</option>
                                                    </select>
                                                    <select class="dropdown_item_select home_search_input">
                                                        <option>Select Price Type</option>
                                                        <option>Price Type</option>
                                                        <option>Price Type</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="home_search_button">search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->

        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Popular Categories</h2>
                            <div class="section_subtitle">
							<p>Select the category you are interested in and find out which exams are available. </p>
							</div>
                        </div>
                    </div>
                </div>
			

<div class="row">
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/professional-development.html" title="Professional Development">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Professional Development"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/professional-development.html" title="Professional Development">
                                Professional Development
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/personal-development.html" title="Personal Development">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Personal Development"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/personal-development.html" title="Personal Development">
                                Personal Development
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/art-and-design-creativity.html" title="Art, Design &amp; Creativity">
                                <div class="category-list__item__image">
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" alt="Art, Design &amp; Creativity"><path d="M12 3a9 9 0 0 0 0 18 1.5 1.5 0 0 0 1.1-2.5c-.2-.3-.4-.6-.4-1 0-.8.7-1.5 1.5-1.5H16a5 5 0 0 0 5-5c0-4.4-4-8-9-8zm-5.5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3-4a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3 4a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/art-and-design-creativity.html" title="Art, Design &amp; Creativity">
                                Art, Design &amp; Creativity
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/computer-science.html" title="Computer Science">
                                <div class="category-list__item__image">
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" alt="Computer Science"><path d="M0 0h24v24H0z" fill="none"></path><path d="M20 18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zM4 6h16v10H4V6z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/computer-science.html" title="Computer Science">
                                Computer Science
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/education-and-teaching.html" title="Education and teaching">
                                <div class="category-list__item__image">
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" alt="Education and teaching"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5 13.2v4l7 3.8 7-3.8v-4L12 17l-7-3.8zM12 3L1 9l11 6 9-5v7h2V9L12 3z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/education-and-teaching.html" title="Education and teaching">
                                Education and teaching
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/health-and-medecine.html" title="Health &amp; Medicine">
                                <div class="category-list__item__image">
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" alt="Health &amp; Medicine"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.5 3A6 6 0 0 0 12 5a6 6 0 0 0-4.5-2C4.5 3 2 5.4 2 8.5c0 3.8 3.4 6.9 8.6 11.5l1.4 1.4 1.4-1.4c5.2-4.6 8.6-7.7 8.6-11.5 0-3-2.4-5.5-5.5-5.5zm-4.4 15.6h-.2C7.1 14.2 4 11.4 4 8.5 4 6.5 5.5 5 7.5 5c1.5 0 3 1 3.6 2.4h1.8C13.5 6 15 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.9-3.1 5.7-7.9 10z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/health-and-medecine.html" title="Health &amp; Medicine">
                                Health &amp; Medicine
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/mathematics.html" title="Mathematics">
                                <div class="category-list__item__image">
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" alt="Mathematics"><path d="M0 0h24v24H0z" fill="none"></path><path d="M18 4H6v2l6.5 6L6 18v2h12v-3h-7l5-5-5-5h7z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/mathematics.html" title="Mathematics">
                                Mathematics
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/science.html" title="Science">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" alt="Science"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7 18c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm4-2c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm5.6 17.6c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/science.html" title="Science">
                                Science
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/humanities.html" title="Humanities">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Humanities"><path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4 .83 6 1v13h2v-6h2v6h2V9c2-.17 4.14-.5 6-1l-.5-2zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"></path><path fill="none" d="M0 0h24v24H0z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/humanities.html" title="Humanities">
                                Humanities
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/data-science.html" title="Data Science">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Data Science"><path d="M22 6.92l-1.41-1.41-2.85 3.21C15.68 6.4 12.83 5 9.61 5 6.72 5 4.07 6.16 2 8l1.42 1.42C5.12 7.93 7.27 7 9.61 7c2.74 0 5.09 1.26 6.77 3.24l-2.88 3.24-4-4L2 16.99l1.5 1.5 6-6.01 4 4 4.05-4.55c.75 1.35 1.25 2.9 1.44 4.55H21c-.22-2.3-.95-4.39-2.04-6.14L22 6.92z"></path><path fill="none" d="M0 0h24v24H0z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/data-science.html" title="Data Science">
                                Data Science
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/programming.html" title="Programming">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Programming"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/programming.html" title="Programming">
                                Programming
                            </a>
                        </div>
                    </div>
                                                                            <div class="category-list__item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="category-list__item__image-container block block--animate">
                            <a href="categorie/engineering.html" title="Engineering">
                                <div class="category-list__item__image">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" alt="Engineering"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"></path></svg>
                                </div>
                            </a>
                        </div>
                        <div class="category-list__item__title">
                            <a href="categorie/engineering.html" title="Engineering">
                                Engineering
                            </a>
                        </div>
                    </div>
                            </div>
				
				<!--
                <div class="row features_row">
                    
                    <!-- Features Item
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('landing') }}/images/icon_1.png" alt=""></div>
                            <h3 class="feature_title">The Experts</h3>
                            <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
                        </div>
                    </div>

                    <!-- Features Item 
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('landing') }}/images/icon_2.png" alt=""></div>
                            <h3 class="feature_title">Book & Library</h3>
                            <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
                        </div>
                    </div>

                    <!-- Features Item 
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('landing') }}/images/icon_3.png" alt=""></div>
                            <h3 class="feature_title">Best Courses</h3>
                            <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
                        </div>
                    </div>

                    <!-- Features Item 
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('landing') }}/images/icon_4.png" alt=""></div>
                            <h3 class="feature_title">Award & Reward</h3>
                            <div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>

        <!-- Popular Courses -->

        <div class="courses">
            <div class="section_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing') }}/images/courses_background.jpg" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Popular Online Exams</h2>
                            <div class="section_subtitle">
							</div>
                        </div>
                    </div>
                </div>
                <div class="row courses_row">
                    
                    <!-- Exam -->
                    <div class="col-lg-4 course_col">
                        <div class="course">
                            <div class="course_image"><img src="{{ asset('landing') }}/images/course_1.jpg" alt=""></div>
                            <div class="course_body">
                                <h3 class="course_title"><a href="course.html">Software Training</a></h3>
                                <div class="course_teacher">Mr. John Taylor</div>
                                <div class="course_text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="course_footer">
                                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                    
                                   <!-- <div class="course_price ml-auto">Show More</div>-->
                                    <div class="course_price ml-auto">
									<a class="course_price ml-auto" href="">Show More</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exam -->
                    <div class="col-lg-4 course_col">
                        <div class="course">
                            <div class="course_image"><img src="{{ asset('landing') }}/images/course_1.jpg" alt=""></div>
                            <div class="course_body">
                                <h3 class="course_title"><a href="course.html">Software Training</a></h3>
                                <div class="course_teacher">Mr. John Taylor</div>
                                <div class="course_text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="course_footer">
                                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                    
                                   <!-- <div class="course_price ml-auto">Show More</div>-->
                                    <div class="course_price ml-auto">
									<a class="course_price ml-auto" href="">Show More</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Exam -->
                    <div class="col-lg-4 course_col">
                        <div class="course">
                            <div class="course_image"><img src="{{ asset('landing') }}/images/course_1.jpg" alt=""></div>
                            <div class="course_body">
                                <h3 class="course_title"><a href="course.html">Software Training</a></h3>
                                <div class="course_teacher">Mr. John Taylor</div>
                                <div class="course_text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                </div>
                            </div>
                            <div class="course_footer">
                                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                    
                                   <!-- <div class="course_price ml-auto">Show More</div>-->
                                      <div class="course_price ml-auto">
									<a class="course_price ml-auto" href="">Show More</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col examsall">
                        <div class="courses_button trans_200"><a href="#">view all exams</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events -->

   
   <div class="container-fluid" style="background-color:#4f4f4f;height:100%;padding:30px 0px;">
	<div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title" style="color:white">Certification Process</h2>
                            <div class="section_subtitle"><p style="color:white;margin: 30px 5px 10px;text-align: center;">The world needs Superheroes. Will you answer the call?</p></div>
                        </div>
                    </div>
                </div>
  <div class="row events_row">
    <div class="col-6-12 ml-auto mr-auto text-center" style="width:75%;  height:100%;">
    <img class="img-fluid" src="/landing/images/CERTLOGO.png">
    </div>
          
                </div>
</div>
        <!-- Team -->

        <div class="team">
            <div class="team_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing') }}/images/team_background.jpg" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">The Best Authors in Town</h2>
                            <div class="section_subtitle"><p style="text-align:center;">A group of Professionals in their fields of Studies Equipped with Years of Experiences </p></div>
                        </div>
                    </div>
                </div>
                <div class="row team_row">
                    
                    <!-- Team Item -->
                    <div class="col-lg-3 col-md-6 team_col">
                        <div class="team_item">
                            <div class="team_image"><img src="{{ asset('landing') }}/images/team_1.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Jacke Masito</a></div>
                                <div class="team_subtitle">Marketing & Management</div>
                                <div class="social_list">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-lg-3 col-md-6 team_col">
                        <div class="team_item">
                            <div class="team_image"><img src="{{ asset('landing') }}/images/team_2.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">William James</a></div>
                                <div class="team_subtitle">Designer & Website</div>
                                <div class="social_list">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-lg-3 col-md-6 team_col">
                        <div class="team_item">
                            <div class="team_image"><img src="{{ asset('landing') }}/images/team_3.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">John Tyler</a></div>
                                <div class="team_subtitle">Quantum mechanics</div>
                                <div class="social_list">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Item -->
                    <div class="col-lg-3 col-md-6 team_col">
                        <div class="team_item">
                            <div class="team_image"><img src="{{ asset('landing') }}/images/team_4.jpg" alt=""></div>
                            <div class="team_body">
                                <div class="team_title"><a href="#">Veronica Vahn</a></div>
                                <div class="team_subtitle">Math & Physics</div>
                                <div class="social_list">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        

        <!-- Newsletter -->

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
                                                <li>Email: support@ma2xm.com</li>
                                                <li>Phone:  +(212) 525081166</li>
                                                <li>EMSI MARRAKECH, Maroc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-3 footer_col">
                        
                                    <!-- Footer links -->
                                    <div class="footer_section footer_links">
                                        <div class="footer_title">Contact Us</div>
                                        <div class="footer_links_container">
                                            <ul>
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="#">Features</a></li>
                                                <li><a href="courses.html">Courses</a></li>
                                                <li><a href="#">Events</a></li>
                                                <li><a href="#">Gallery</a></li>
                                                <li><a href="#">FAQs</a></li>
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
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
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
</body>
</html>
