@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/correos')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="actualizar-mail" method="post" action="{{url('sistemas/accesos/correos/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$password->id}}">
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="empleado" class="form-label">Empleado</label>
                
                <select name="empleado" class="form-control" required="">

                    @if($empleado != null)
                        <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                    @else
                      <option value="-1">Sin Empleado</option>
                    @endif
                    <option value="-1">Sin Empleado</option>

                      @foreach($empleados as $empleado)
                        <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                      @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="conexion" class="form-label">Conexion</label>
                
                <select name="conexion" class="form-control" required="">

                    @if($conexion != null)
                        <option value="{{$conexion->id}}">{{$conexion->identificador}}</option>
                    @else
                      <option value="-1">Sin Conexion</option>
                    @endif
                    <option value="-1">Sin Conexion</option>

                      @foreach($conexiones as $con)
                        <option value="{{$con->id}}">{{$con->identificador}}</option>
                      @endforeach
                </select>
            </div>
        </div>
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$password->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="form-label">Correo</label>
                <input type="mail" name="email" class="form-control" placeholder="Correo.." value="{{$password->email}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia" class="form-label">Contraseña</label>
                <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña..." value="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia_confirmacion" class="form-label">Confirmacion de Contraseña</label>
                <input type="password" name="contrasenia_confirmacion" class="form-control" placeholder="Contraseña..." value="">
            </div>
        </div>




    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/correos')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-mail').submit();">
            Actualizar Correo
        </button>
    </div>
</div>

@endsection