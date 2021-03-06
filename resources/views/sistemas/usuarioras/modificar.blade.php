@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/ras')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="modificar-ras" method="post" action="{{url('sistemas/accesos/ras/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$usuario->id}}">
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="conexion_id" class="form-label">Conexion</label>
                
                <select name="conexion_id" class="form-control" required="">

                    @if($conexion != null)
                        <option value="{{$conexion->id}}">{{$conexion->identificador}}</option>
                    @else
                      <option value="-1">Sin Conexion</option>
                    @endif

                    <option value="-1">Sin Conexion</option>
                    
                      @foreach($conexiones as $con)
                        <option value="{{$con->id}}">{{$con->servidor}} | {{$con->identificador}}</option>
                      @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$usuario->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario.." value="{{$usuario->usuario}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia" class="form-label">Contrase??a</label>
                <input type="password" name="contrasenia" class="form-control" placeholder="Contrase??a..." value="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia_confirmacion" class="form-label">Confirmacion de Contrase??a</label>
                <input type="password" name="contrasenia_confirmacion" class="form-control" placeholder="Contrase??a..." >
            </div>
        </div>




    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/ras')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('modificar-ras').submit();">
            Modificar Usuario RAS / RDP
        </button>
    </div>
</div>

@endsection