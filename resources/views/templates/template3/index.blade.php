<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Venue - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Venue - Responsive HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{asset('plantillas/template3/img/favicon.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,700,800,900" rel="stylesheet" type="text/css">

    <!-- Libs CSS -->
    <link href="{{asset('plantillas/template3/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/v-nav-menu.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/v-animation.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/v-bg-stylish.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/v-shortcodes.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/css/theme-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/plugins/owl-carousel/owl.theme.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

    <!-- Current Page CSS -->
    <link href="{{asset('plantillas/template3/plugins/rs-plugin/css/settings.css')}}" rel="stylesheet" />
    <link href="{{asset('plantillas/template3/plugins/rs-plugin/css/custom-captions.css')}}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('plantillas/template3/css/custom.css')}}">
</head>

<body class="no-page-top">

    <!--Header-->
    <!--Set your own background color to the header-->
    <header class="semi-transparent-header" data-bg-color="rgba(9, 103, 139, 0.36)" data-font-color="#fff">
        <div class="container">

            <!--Site Logo-->
            <div class="logo" data-sticky-logo="{{asset('plantillas/template3/img/logo-white.png')}}" data-normal-logo="{{asset('plantillas/template3/img/logo.png')}}">
                <a href="index.html">
                    <img alt="Venue" src="{{asset('plantillas/template3/img/logo.png')}}" data-logo-height="35">
                </a>
            </div>
            <!--End Site Logo-->

            <div class="navbar-collapse nav-main-collapse collapse">

                <!--Header Search-->
                <div class="search" id="headerSearch">
                    <a href="#" id="headerSearchOpen"><i class="fa fa-search"></i></a>
                    <div class="search-input">
                        <form id="headerSearchForm" action="#" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="q" id="q" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <span class="v-arrow-wrap"><span class="v-arrow-inner"></span></span>
                    </div>
                </div>
                <!--End Header Search-->

                <!--Main Menu-->
                <nav class="nav-main mega-menu one-page-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li class="active">
                            <a data-hash href="#home"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a data-hash href="#features"><i class="fa fa-fire"></i>Features</a>
                        </li>
                        <li>
                            <a data-hash href="#why-us"><i class="fa fa-location-arrow"></i>Why Us</a>
                        </li>
                        <li>
                            <a data-hash href="#describe"><i class="fa fa-flash"></i>Describe</a>
                        </li>
                        <li>
                            <a data-hash href="#services"><i class="fa fa-umbrella"></i>Services</a>
                        </li>
                        <li>
                            <a data-hash href="#screenshots"><i class="fa fa-laptop"></i>Screenshots</a>
                        </li>
                        <li>
                            <a data-hash href="#download"><i class="fa fa-download"></i>Download</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle menu-icon" href="#"><i class="fa fa-umbrella"></i>Menu <i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Blog - Standard</a></li>
                                <li><a href="#">Blog - Small</a></li>
                                <li><a href="#">Blog - Masonry</a></li>
                                <li><a href="#">Blog – Fullwidth Masonry</a></li>
                                <li class="dropdown-submenu">
                                    <a href="#">Blog Posts</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Standard Post</a></li>
                                        <li><a href="#">Slideshow Post</a></li>
                                        <li><a href="#">Full Width Post</a></li> 
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!--End Main Menu-->
            </div>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </header>
    <!--End Header-->

    <div id="container">

        <!--Set your own slider options. Look at the v_RevolutionSlider() function in 'theme-core.js' file to see options-->
        <div class="home-slider-wrap fullwidthbanner-container" id="home">
            <div class="v-rev-slider" data-slider-options='{ "startheight": 700 }'>

                <ul>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="600">

                        <img src="{{asset('plantillas/template3/img/slider/image2.png')}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                        <div class="tp-caption v-caption-big-white sfl stl"
                            data-x="450"
                            data-y="245"
                            data-speed="600"
                            data-start="600"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            THE LAST TEMPLATE
                            <br />
                            YOU'LL HAVE TO BUY
                        </div>

                        <div class="tp-caption v-caption-h1 sfl stl"
                            data-x="450"
                            data-y="360"
                            data-speed="700"
                            data-start="1200"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            Built on cutting edge technology.<br>
                            Create modern design using Venue.
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="450"
                            data-y="450"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <a href='#' class="btn v-btn v-second-light">GET IT NOW!</a>
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="605"
                            data-y="450"
                            data-speed="600"
                            data-start="2200"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <a href='#' class="btn v-btn v-second-light">FIND OUT MORE</a>
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="110"
                            data-y="130"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <!--<a href='#' class="btn v-btn v-third-light">GET IT NOW!</a>-->
                            <img src="{{asset('plantillas/template3/img/iphone2.png')}}" />
                        </div>



                        <!--<div class="v-slider-overlay overlay-colored"></div>-->
                    </li>
                </ul>
            </div>

            <div class="shadow-right"></div>
        </div>

        <div class="v-page-wrap no-bottom-spacing">

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-small"></div>
            </div>

            <!--Features-->
            <div class="container" id="features">

                <div class="row center">

                    <div class="col-sm-12">
                        <p class="v-smash-text-large-2x">
                            <span>Amazing Features</span>
                        </p>
                        <div class="horizontal-break"></div>
                        <p class="lead" style="color: #999;">
                            Responsive &amp; optimized for mobile devices.<br>
                            Completely without coding skills!
                        </p>
                    </div>
                    <div class="v-spacer col-sm-12 v-height-standard"></div>
                </div>

                <div class="row features">

                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box left-icon v-animation pull-top" data-animation="fade-from-left" data-delay="300">
                            <div class="feature-box-icon small">
                                <i class="fa fa-laptop v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Super Design Layout</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent
                                            per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-left" data-delay="600">
                            <div class="feature-box-icon small">
                                <i class="fa fa-vimeo-square v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Retina Graphic Display</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent per
                                            conubia nostra, per inceptos himenaeos nulla nunc duil.
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-left" data-delay="900">
                            <div class="feature-box-icon small">
                                <i class="fa fa-cloud-download v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Regular Updates & Support</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent per
                                            conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <img class="img-responsive phone-image v-animation" data-animation="fade-from-bottom" data-delay="250" src="{{asset('plantillas/template3/img/landing/single-iphone.png')}}" />
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box left-icon v-animation pull-top" data-animation="fade-from-right" data-delay="300">
                            <div class="feature-box-icon small">
                                <i class="fa fa-tablet v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Responsive Web Design</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent per
                                    conubia nostra, per inceptos himenaeos nulla nunc dui.
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-right" data-delay="600">
                            <div class="feature-box-icon small">
                                <i class="fa fa-lightbulb-o v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Aweosme Design Layout</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.<br />
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-right" data-delay="900">
                            <div class="feature-box-icon small">
                                <i class="fa fa-google-plus v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Social Media Friendly</h3>
                                <div class="feature-box-text-inner">
                                    Class aptent taciti sociosqu ad litora torquent per
                                    conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Features-->

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-standard"></div>
            </div>

            <!--Why Us-->
            <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="why-us">
                <div class="container">
                    <div class="row app-brief">
                        <div class="col-sm-6">
                            <img class="img-responsive phone-image v-animation" data-animation="fade-from-left" data-delay="250" src="{{asset('plantillas/template3/img/landing/2-iphone-left.png')}}" />
                        </div>

                        <div class="col-sm-6">
                            <p class="v-smash-text-large-2x pull-top">
                                <span>Explain why it's best</span>
                            </p>
                            <div class="horizontal-break left"></div>
                            <p class="v-lead">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>

                            <div class="v-spacer col-sm-12 v-height-small"></div>

                            <ul class="v-list-v2">
                                <li class="v-animation" data-animation="fade-from-right" data-delay="150"><i class="fa fa-check"></i><span class="v-lead">Simple & with endless possibilties.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="300"><i class="fa fa-check"></i><span class="v-lead">Everything is perfectly orgainized for future.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="450"><i class="fa fa-check"></i><span class="v-lead">Sliders give you the opportunity to showcase.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Multiple layout for home pages, portfolio & blog.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="750"><i class="fa fa-check"></i><span class="v-lead">The best way to grow your business</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="900"><i class="fa fa-check"></i><span class="v-lead">Lorem ipsum dolor sit amet, consectetur.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Why Us-->

            <!--Describe-->
            <div class="v-parallax v-bg-stylish" id="describe">
                <div class="container">
                    <div class="row app-brief">
                        <div class="col-sm-6">
                            <p class="v-smash-text-large-2x pull-top">
                                <span>Great way to describe your app</span>
                            </p>
                            <div class="horizontal-break left"></div>
                            <p class="v-lead">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>

                            <p class="v-lead">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>

                        <div class="col-sm-6">
                            <img class="img-responsive phone-image v-animation" data-animation="fade-from-right" data-delay="300" src="{{asset('plantillas/template3/img/landing/2-iphone-right.png')}}" />
                        </div>
                    </div>
                </div>
            </div>
            <!--End Describe-->

            <!--Services-->
            <div class="v-parallax v-parallax-video v-bg-stylish" id="services" style="background-image: url({{asset('plantillas/template3/img/slider/slider4.jpg')}});">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="0">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-laptop v-icon"></i>
                                </div>
                                <div class="feature-box-text clearfix">
                                    <h3>Incredibly Responsive</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.
                                        </p>

                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="200">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-leaf v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Fully Customizible</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.<br />
                                        </p>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="400">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-scissors v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Interactive Elements</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.<br />
                                        </p>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="v-bg-overlay overlay-colored"></div>
                    </div>
                </div>
            </div>
            <!--End Services-->

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-big"></div>
            </div>

            <div class="container">
                <div class="row center v-counter-wrap">
                    <div class="col-sm-3">
                        <i class="fa fa-building v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="6218" data-speed="1000" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Line Of Code Written</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <i class="fa fa-flash v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="1448" data-speed="1500" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Cups Of Coffee</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <i class="fa fa-laptop v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="2650" data-speed="2000" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Fineshed Projects</h6>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <i class="fa fa-umbrella v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="5265" data-speed="2500" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Lorem Input Amet</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-standard"></div>
            </div>

            <!--Screenshots-->
            <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="screenshots">
                <div class="container">
                    <div class="row center">
                        <div class="col-sm-12">
                            <p class="v-smash-text-large-2x">
                                <span>Screenshots</span>
                            </p>
                            <div class="horizontal-break"></div>
                            <p class="lead" style="color: #999;">
                                Responsive & optimized for mobile devices.
                            </p>
                        </div>
                        <div class="v-spacer col-sm-12 v-height-standard"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="carousel-wrap">

                                <div class="owl-carousel" data-plugin-options='{"items": 4, "singleItem": false, "pagination": true}'>
                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/1.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/1.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/2.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/2.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/3.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/3.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/4.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/4.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/1.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/1.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{asset('plantillas/template3/img/landing/2.jpg')}}" class="attachment-full">
                                            <a class="view" href="img/landing/2.jpg" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Lorem ipsum dolor sit amet.</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Screenshots-->

            <!--Download-->
            <div class="v-parallax v-bg-stylish v-bg-stylish-v10" id="download" style="background-image: url({{asset('plantillas/template3/img/slider/slider4.jpg')}});">

                <div class="container">
                    <div class="row center">

                        <div class="col-sm-12">

                            <div class="v-content-wrapper">
                                <p class="v-smash-text-large-2x">
                                    <span>Download the app on</span>
                                </p>

                                <div class="v-spacer col-sm-12 v-height-standard"></div>

                                <div id="intro_stores">
                                    <a href="#">
                                        <img src="{{asset('plantillas/template3/img/landing/appstore.png')}}" alt="appstore_icon"></a>
                                    <a href="#">
                                        <img src="{{asset('plantillas/template3/img/landing/google.png')}}" alt="google_icon"></a>
                                    <a href="#">
                                        <img src="{{asset('plantillas/template3/img/landing/amazon.png')}}" alt="amazon_icon"></a>
                                </div>

                                <div class="v-spacer col-sm-12 v-height-big"></div>

                                <p class="v-smash-text-large-2x">
                                    <span>Subscribe Now!</span>
                                </p>

                                <div class="v-spacer col-sm-12 v-height-small"></div>

                                <form class="subscription-form form-inline">

                                    <input type="email" name="EMAIL" placeholder="Your Email" class="subscriber-email form-control input-box">
                                    <a href="#" type="submit" class="subscriber-button btn v-btn v-medium-button no-three-d v-belize-hole"><i class="fa fa-fire"></i>Subscribe</a>
                                </form>
                            </div>

                        </div>

                        <div class="v-bg-overlay overlay-colored"></div>
                    </div>
                </div>
            </div>
            <!--End Download-->

            <!--Call Us-->
            <div class="v-parallax v-bg-stylish" id="contact-us">
                <div class="container">
                    <div class="row center">
                        <div class="col-sm-8 col-sm-offset-2">
                            <p class="v-smash-text-large-2x">
                                <span>Call us today!</span>
                            </p>
                            <br />
                            <p class="lead" style="color: #999;">
                                +181 500 600 1
                            </p>
                            <div class="horizontal-break"></div>

                            <div class="v-spacer col-sm-12 v-height-small"></div>



                            <form action="#" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Your name <span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Your email address <span class="required">*</span></label>
                                            <input type="email" value="" maxlength="100" class="form-control" name="email" id="email1">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Website</label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="website" id="website">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Comment <span class="required">*</span></label>
                                            <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="Textarea1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <br />
                                        <button name="submit" type="submit" id="sendmesage" class="btn v-btn no-three-d">Send Message</button>
                                    </div>
                                </div>
                            </form> 

                        </div>
                    </div>

                    <div class="row">
                        <div class="v-spacer col-sm-12 v-height-small"></div>
                    </div>

                    <div class="row center">
                        <ul class="social-icons large center">
                            <li class="twitter"><a href="http://www.twitter.com/#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                            <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                            <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                            <li class="vimeo"><a href="http://www.vimeo.com/#" target="_blank"><i class="fa fa-vimeo-square"></i><i class="fa fa-vimeo-square"></i></a></li>
                            <li class="tumblr"><a href="http://tumblr.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i><i class="fa fa-tumblr"></i></a></li>
                            <li class="skype"><a href="skype:#" target="_blank"><i class="fa fa-skype"></i><i class="fa fa-skype"></i></a></li>
                            <li class="linkedin"><a href="#" target="_blank"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>
                            <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End Call Us-->
        </div>

        <!--Footer-Wrap-->
        <div class="footer-wrap">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <section class="widget">
                                <img alt="Venue" src="{{asset('plantillas/template3/img/logo-white.png')}}" style="height: 40px; margin-bottom: 20px;">
                                <p class="pull-bottom-small">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel,
                                    congue sed ligula auctor fringill torquent per conubia nostra.
                                    Class aptent taciti sociosqu ad litora conubia nostra.
                                </p>
                                <p>
                                    <a href="page-about-us-2.html">Read More →</a>
                                </p>
                            </section>
                        </div>
                        <div class="col-sm-3">
                            <section class="widget">
                                <div class="widget-heading">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="footer-contact-info">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-building"></i>Your Company </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-map-marker"></i>1 Liberty St New York, NY 5006 </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-phone"></i><strong>Phone:</strong> (123) 456-7890</p>
                                        </li>
                                    </ul>
                                    <br />

                                    <ul class="social-icons standard">
                                        <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                                        <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                                        
                                        <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                                        <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
 
                        <div class="col-sm-3">
                            <section class="widget">
                                <div class="widget-heading">
                                    <h4>Recent Works</h4>
                                </div>
                                <ul class="portfolio-grid">
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-1.jpg')}}" />
                                            <span class="tooltip">Phasellus enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-2.jpg')}}" />
                                            <span class="tooltip">Phasellus enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-3.jpg')}}" />
                                            <span class="tooltip">Phasellus enim<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-4.png')}}" />
                                            <span class="tooltip">Lorem Imput<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-5.jpg')}}" />
                                            <span class="tooltip">Phasellus Enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="{{asset('plantillas/template3/img/thumbs/project-6.jpg')}}" />
                                            <span class="tooltip">Phasellus Enim<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright">
                <div class="container">
                    <p>© Copyright 2014 by Venue. All Rights Reserved.</p>
                    <nav class="footer-menu std-menu">
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Portfolio</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Buy Now</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--End Footer-Wrap-->
    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Libs -->
    <script src="{{asset('plantillas/template3/js/jquery.min.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/jquery.easing.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/jquery.fitvids.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/jquery.carouFredSel.min.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/theme-plugins.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('plantillas/template3/js/imagesloaded.js')}}"></script>

    <script src="{{asset('plantillas/template3/js/view.min.js?auto')}}"></script>

    <script src="{{asset('plantillas/template3/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('plantillas/template3/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

    <script src="{{asset('plantillas/template3/js/theme-core.js')}}"></script>
</body>
</html>
