@extends('home.template')

@section('body')

<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url({{asset('plantillas/template9/images/img_bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                <div class="display-t">
                    <div class="display-tc">
                        <h1 class="animate-box" data-animate-effect="fadeInUp">Desarrollo Web y Soporte Tecnico </h1>
                        <h2 class="animate-box" data-animate-effect="fadeInUp"> Soluciones Tecnologicas de alto nivel para tu empresa</h2>
                        <p class="animate-box" data-animate-effect="fadeInUp"><a href="#" class="btn btn-white btn-lg btn-outline">Pro Code</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="gtco-features-3">
    <div class="gtco-container">
        <div class="gtco-flex">
            <div class="feature feature-1 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-inner">
                    <span class="icon">
                        <i class="fas fa-palette"></i>
                    </span>
                    <h3>Soporte Tecnico.</h3>
                    <p>Brindamos soluciones a los problemas de tus sistemas administrativos; basados en la infraestructura tecnológica e informática de tu empresa. </p>
                    <p><a href="#" class="btn btn-white btn-outline">Ver mas</a></p>
                </div>
            </div>
            <div class="feature feature-2 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-inner">
                    <span class="icon">
                        <i class="fas fa-store"></i>
                    </span>
                    <h3>Desarrollo Web.</h3>
                    <p>Desarrollo Web, Diseño y Aplicaciones Web Administrativas para todo el entorno de tu empresa. </p>
                    <p><a href="#" class="btn btn-white btn-outline">Ver mas</a></p>
                </div>
            </div>
            <div class="feature feature-3 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-inner">
                    <span class="icon">
                        <i class="fas fa-code"></i>
                    </span>
                    <h3>Servidores y Redes.</h3>
                    <p>Administracion de Servidores y Soporte y Diseño de Infraestructura de Redes y Switching. </p>
                    <p><a href="#" class="btn btn-white btn-outline">Ver mas</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="gtco-features">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Que nos distinge</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="ti-vector"></i>
                    </span>
                    <h3>Pixel Perfect</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="ti-tablet"></i>
                    </span>
                    <h3>Totalmente Responsivo</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="ti-settings"></i>
                    </span>
                    <h3>Desarrollo</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
                    <span class="icon">
                        <i class="ti-ruler-pencil"></i>
                    </span>
                    <h3>Diseño Web</h3>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="gtco-portfolio" class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Nuestros ultimos trabajos</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>

        <div class="row row-pb-md">
            <div class="col-md-12">
                <ul id="gtco-portfolio-list">
                    <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_1.jpg')}}); "> 
                        <a href="#" class="color-1">
                            <div class="case-studies-summary">
                                <span>Web Design</span>
                                <h2>View the Earth from the Outer Space</h2>
                            </div>
                        </a>
                    </li>
                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_2.jpg')}}); ">
                        <a href="#" class="color-2">
                            <div class="case-studies-summary">
                                <span>Illustration</span>
                                <h2>Sleeping in the Cold Blue Water</h2>
                            </div>
                        </a>
                    </li>


                    <li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_3.jpg')}}); ">
                        <a href="#" class="color-3">
                            <div class="case-studies-summary">
                                <span>Illustration</span>
                                <h2>Building Builded by Man</h2>
                            </div>
                        </a>
                    </li>
                    <li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_4.jpg')}}); ">
                        <a href="#" class="color-4">
                            <div class="case-studies-summary">
                                <span>Web Design</span>
                                <h2>The Peaceful Place On Earth</h2>
                            </div>
                        </a>
                    </li>

                    <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_5.jpg')}}); "> 
                        <a href="#" class="color-5">
                            <div class="case-studies-summary">
                                <span>Web Design</span>
                                <h2>I'm Getting Married</h2>
                            </div>
                        </a>
                    </li>
                    <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/template9/images/img_6.jpg')}}); ">
                        <a href="#" class="color-6">
                            <div class="case-studies-summary">
                                <span>Illustration</span>
                                <h2>Beautiful Flowers In The Air</h2>
                            </div>
                        </a>
                    </li>
                </ul>       
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center animate-box">
                <a href="{{asset('/proyectos')}}" class="btn btn-white btn-outline btn-lg btn-block">Ver todos nuestros trabajos</a>
            </div>
        </div>

        
    </div>
</div>

<div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Metricas</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
                    <span class="icon">
                        <i class="ti-settings"></i>
                    </span>
                    <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Creativity Fuel</span>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
                    <span class="icon">
                        <i class="ti-face-smile"></i>
                    </span>
                    <span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Clientes satisfechos</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
                    <span class="icon">
                        <i class="ti-briefcase"></i>
                    </span>
                    <span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Proyectos realizados</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                <div class="feature-center">
                    <span class="icon">
                        <i class="ti-time"></i>
                    </span>
                    <span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Hours Spent</span>

                </div>
            </div>
                
        </div>
    </div>
</div>

<div id="gtco-products">
    <div class="gtco-container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Productos</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="owl-carousel owl-carousel-carousel">
                <div class="item">
                    <img src="{{asset('plantillas/template9/images/img_1.jpg')}}" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
                </div>
                <div class="item">
                    <img src="{{asset('plantillas/template9/images/img_2.jpg')}}" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
                </div>
                <div class="item">
                    <img src="{{asset('plantillas/template9/images/img_3.jpg')}}" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
                </div>
                <div class="item">
                    <img src="{{asset('plantillas/template9/images/img_4.jpg')}}" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection