@extends('home.template')

@section('body')

<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url({{asset('plantillas/template9/images/img_bg_1.jpg')}}); height: 150px" >
    <div class="overlay"></div>
</header>

<div id="gtco-features">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Algunas Demos</h2>
                <p>Puedes modificar algunos datos de las demos al momento de vizualizarlas. </p>
            </div>
        </div>

        <div class="row row-pb-md">
            <div class="col-md-12">
                <ul id="gtco-portfolio-list">

                    @foreach($templates as $temp)
                        <li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('plantillas/imagenes/img'.$temp->id.'.PNG')}}); ">
                            <a href="{{url('demos/ver/'.$temp->id)}}" target="_blank" class="color-1">
                                <div class="case-studies-summary">
                                    <span>{{$temp->tipo}}</span>
                                    <h2>{{$temp->nombre}}</h2>
                                </div>
                            </a>
                        </li>
                    @endforeach

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
@endsection