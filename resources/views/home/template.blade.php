<!DOCTYPE HTML>
<html>
    <head>
    @extends('home.head')
    </head>
    <body>
        
    <div class="gtco-loader"></div>
    
    <div id="page">

    @extends('home.nav')
    @yield('body')

    

    <div id="gtco-subscribe">
        <div class="gtco-container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2>Contactanos</h2>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-12">
                    <form class="form-inline" method="post" action="{{url('/enviarmail')}}">

                        @csrf
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Nombre</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nombre" required="">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Correo electronico</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Correo electronico" required="">
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">  
                                <label for="phone" class="sr-only">Telefono</label>
                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefono" required="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="message" class="sr-only">Mensaje</label>
                            <textarea maxlength="5000" rows="5" class="form-control" name="message" id="message" placeholder="Mensaje" required=""></textarea>
                        </div>

                        <div class="col-md-12 col-sm-12" style="padding-top: 5px; text-align: center;">
                            <button type="submit" class="btn btn-default">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @extends('home.footer')

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    
    @if ($message = Session::get('success'))
        <script type="text/javascript">
          function load() {
            alert("{{$message}}");
          }
          window.onload = load;
        </script>
    @endif
    
    @extends('home.scripts')

    </body>
</html>

