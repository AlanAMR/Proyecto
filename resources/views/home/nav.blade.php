<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 text-right gtco-contact">
                <ul class="">
                    <li><a href="{{asset('/')}}"><i class="ti-mobile"></i> {{$datos['telefono']}} </a></li>
                    <li><a href="{{asset('/')}}"><i class="ti-twitter-alt"></i> </a></li>
                    <li><a href="{{asset('/')}}"><i class="icon-mail2"></i></a></li>
                    <li><a href="{{$datos['facebook']}}" target="_blank"><i class="ti-facebook"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div id="gtco-logo"><img src="{{asset($datos['logo'])}}" alt="Imagen de Logo" style="top:-50px;position :absolute; max-height: 120px" ></div>
            </div>
            <div class="col-xs-8 text-right menu-1">
                <ul>
                    <li class="<?php if($seccion == 'inicio') echo "active";?>"><a href="{{asset('/')}}">Inicio</a></li>
                    <li class="<?php if($seccion == 'acercade') echo "active";?>"><a href="{{asset('/acercade')}}">Acerca de</a></li>
                    <!-- <li class="<?php if($seccion == 'cotizacion') echo "active";?>"><a href="{{asset('/cotizacion')}}">Cotizacion</a></li> -->
                    <li class="has-dropdown <?php if($seccion == 'servicios') echo "active";?>">
                        <a href="{{asset('/servicios')}}">Servicios</a>
                        <ul class="dropdown">
                            <li><a href="{{asset('/')}}">Diseño Web</a></li>
                            <li><a href="{{asset('/')}}">E-Commerce</a></li>
                            <li><a href="{{asset('/')}}">Desarrollo especializado</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($seccion == 'proyectos') echo "active";?>"><a href="{{asset('/proyectos')}}">Proyectos</a></li>
                    <li class="<?php if($seccion == 'demos') echo "active";?>"><a href="{{asset('/demos')}}">Demos</a></li>


                    @guest
                            <li class=""><a class="" href="{{url('ingresar')}}">Ingresar</a></li>
                        @else

                            <li class="has-dropdown <?php if($seccion == 'servicios') echo "active";?>">
                                <a href="{{asset('/servicios')}}">{{ Auth::user()->nickname }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{url('utilerias/redireccion/rol')}}">Ir a la parte administrativa</a></li>
                                    <li><hr></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest
                </ul>
            </div>
        </div>  
    </div>
</nav>
