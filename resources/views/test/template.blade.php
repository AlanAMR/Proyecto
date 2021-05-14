<!doctype html>
<html lang="en">
  <!--  Inicia la carga de la cabecera de la pagina -->
  @extends('test.header')
  <!--  Finaliza la carga de la cabecera de la pagina -->

  <!--  Inicia la seccion body -->
  <body>
    <h1>{{$titulo}}</h1>

    <!-- Inicia la seecion de prueba -->
    <main>
    	@yield('test')
    </main>
    <!-- Finaliza la seccion de prueba-->
    <!--  Inicia la carga de el footer de la pagina -->
  	@extends('test.footer')
  	<!--  Finaliza la carga de el footer de la pagina -->
  </body>
  <!--  Finaliza la seccion body -->
</html>
