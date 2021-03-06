<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Telsa Solutions</title>
        <link rel="icon" type="image/x-icon" href="{{asset('telsa/assets/img/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{asset('telsa/js/all.js')}}" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="{{asset('telsa/css/montserrat.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('telsa/css/droid.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('telsa/css/robot.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('telsa/css/slider.css')}}" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('telsa/css/styles.css')}}" rel="stylesheet" />
    </head>

    
    <body id="page-top" style="">
        <!-- Navigation-->  
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{('telsa/assets/img/portfolio/Telsa solutions tm.png')}}"/></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Acerca de Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contacto</a></li>


                        @guest
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('ingresar')}}">Ingresar</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nickname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{url('utilerias/redireccion/rol')}}">
                                        Ir a la parte administrativa
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading text-uppercase">Bienvenidos a TelsaSolutions <span class="trade-mark">TM</span> </div>
                <div class="masthead-heading text-uppercase">Adelante Hacia el Futuro</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#contact">Contactanos</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">En Telsa Solutions somos expertos en dise??ar e implementar proyectos de infraestructura y soluciones de valor agregado para sectores estrat??gicos: Telecom, IT, Energ??a y Construcci??n. Nuestro principal objetivo es la satisfacci??n de nuestros clientes al asegurar la entrega desus proyectos en tiempo y forma aplicando t??cnicas ??giles de manejo de proyectos y tecnolog??a de punta en la implementaci??n de los mismos. 
                    </h3>
                </div>
                <div class="row text-center">

                    <div class="col-md-3">
                        <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/Telsa Commerce.jpg')}}" alt="" style="max-height: 300px"/>
                        
                        <h4 class="my-3">Commerce</h4>
                        <p class="text-muted">COMERCIALIZACI??N - Arrendamiento y comercializaci??n de maquinaria, equipos de medici??n y miscel??neos.</p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/Telsa Consulting.jpg')}}" alt="" style="max-height: 300px"/>
                        
                        <h4 class="my-3">Consulting</h4>
                        <p class="text-muted">SERVICIO PAQUETIZADO - Ubicaci??n del major professional para brindar  servicios paquetizados de  cualquier perfil t??cnico, seguimiento al desempe??o.</p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/Telsa Networks.jpg')}}" alt="" style="max-height: 300px"/>
                        
                        <h4 class="my-3">Networks</h4>
                        <p class="text-muted">SOPORTE A REDES, SEGURIDAD Y AUTOMATIZACI??N - Polizas de mantenimiento IT, dise??o de sistemas  de seguridad,CCTV, LAN, WAN,  servicios en la nube y virtualizaci??n.</p>
                    </div>

                    <div class="col-md-3">
                        <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/Telsa Services.jpg')}}" alt="" style="max-height: 300px"/>
                        
                        <h4 class="my-3">Services</h4>
                        <p class="text-muted">INFRAESTRUCTURA - Dise??o, digitalizaci??n, implementaci??n, construcci??n, operaci??n y mantenimiento de infraestructura de telecomunicaciones.</p>
                    </div>
                    

                </div>
            </div>
        </section>

        <section class="page-section" id="slider">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Slider</h2>
                    <h3 class="section-subheading text-muted">
                        Slider 
                    </h3>
                </div>
                <div class="row">
                        <div class="col-lg-3 col-md-3">
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="{{asset('telsa/assets/img/portfolio/TelsaSolutions Commerce.png')}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="{{asset('telsa/assets/img/portfolio/TelsaSolutions Consulting.png')}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="{{asset('telsa/assets/img/portfolio/TelsaSolutions Networks.png')}}" alt="Third slide">
                                    </div>
                                  </div>
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>   
                        <div class="col-lg-3 col-md-3">
                            
                        </div>
                </div>
                
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/01-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Threads</div>
                                <div class="portfolio-caption-subheading text-muted">Illustration</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/02-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Explore</div>
                                <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/03-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Finish</div>
                                <div class="portfolio-caption-subheading text-muted">Identity</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/04-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Lines</div>
                                <div class="portfolio-caption-subheading text-muted">Branding</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/05-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Southwest</div>
                                <div class="portfolio-caption-subheading text-muted">Website Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('telsa/assets/img/portfolio/06-thumbnail.jpg')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Window</div>
                                <div class="portfolio-caption-subheading text-muted">Photography</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Acerca de Nosotros</h2>
                                                <br />
                                                <br />
                    <h3 class="section-subheading text-muted">En TelsaSolutions somos expertos en dise??ar e implementar proyectos de infraestructura y soluciones de valor agregado para sectores estrat??gicos: Telecom, IT, Energ??a y Construcci??n. Nuestro principal objetivo es la satisfacci??n de nuestros clientes al asegurar la entrega de sus proyectos en tiempo y forma aplicando t??cnicas ??giles de manejo de proyectos y tecnolog??a de punta en la implementaci??n de los mismos.</h3>
                            
                    <h2 class="section-heading text-uppercase">Misi??n</h2>    
                          
                                                <br />
                                                <br />
                    <h3 class="section-subheading text-muted">Telsa Solutions es una compa????a creada para brindar soluciones empresariales en los sectores tecnol??gicos, cumpliendo los m??s altos est??ndares de calidad exigidos por nuestros clientes.</h3>

                    <h2 class="section-heading text-uppercase">Visi??n</h2>  
                             
                                                <br />
                                                <br />
                    <h3 class="section-subheading text-muted">Ser una empresa altamente confiable y reconocida a nivel nacional e internacional en los sectores de telecomunicaciones, TI e infraestructura, ofreciendo calidad y confianza a nuestros clientes gracias a su capital humano y su versatilidad.</h3>

                </div>
                <ul class="timeline">
                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Se Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/peaple-1.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/peaple-2.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-60y-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/peaple-3.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/peaple-4.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactanos</h2>
                    <h3 class="section-subheading " style="color:white;">Mejores soluciones solo con Telsa.</h3>
                </div>



                <form method="post" action="{{url('/enviarmail')}}">
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Tu Nombre *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Tu Correo *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Tu telefono *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="message" id="message" placeholder="Escribe Aqui tu Mensaje *" required="required" data-validation-required-message="Please enter a message." rows="6"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-left">Copyright ?? Derechos Reservados a TelsaSolutions<span class="mini-trade-mark">TM</span> 2021</div>
                    <div class="col-lg-6 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/01-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Threads</li>
                                        <li>Category: Illustration</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/02-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Explore</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/03-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Finish</li>
                                        <li>Category: Identity</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/04-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Lines</li>
                                        <li>Category: Branding</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/05-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Southwest</li>
                                        <li>Category: Website Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('telsa/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('telsa/assets/img/portfolio/06-full.jpg')}}" alt="" />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2020</li>
                                        <li>Client: Window</li>
                                        <li>Category: Photography</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <script type="text/javascript">
              function load() {
                alert("{{$message}}");
              }
              window.onload = load;
            </script>
        @endif
        <!-- Bootstrap core JS-->
        <script src="{{asset('telsa/js/jquery.min.js')}}"></script>
        <script src="{{asset('telsa/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Third party plugin JS-->
        <script src="{{asset('telsa/js/jquery.easing.min.js')}}"></script>
        <!-- Contact form JS-->
        <script src="{{asset('telsa/assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('telsa/assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('telsa/js/scripts.js')}}"></script>
    </body>
</html>
