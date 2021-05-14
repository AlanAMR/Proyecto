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
                    <p>Be the first to know about the new templates.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-12">
                    <form class="form-inline">
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Correo electronico</label>
                                <input type="email" class="form-control" id="email" placeholder="Correo electronico">
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">  
                                <label for="phone" class="sr-only">Telefono</label>
                                <input type="text" class="form-control" id="phone" placeholder="Telefono">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="message" class="sr-only">Mensaje</label>
                            <textarea maxlength="5000" rows="5" class="form-control" name="message" id="message" placeholder="Mensaje"></textarea>
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
    
    @extends('home.scripts')

    </body>
</html>

