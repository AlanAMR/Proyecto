@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/contpaq')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="actualizar-contpaq" method="post" action="{{url('sistemas/accesos/contpaq/actualizar')}}">
    
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
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$password->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario.." value="{{$password->usuario}}" required="">
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
        
        <a href="{{url('sistemas/accesos/contpaq')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-contpaq').submit();">
            Actualizar Usuario
        </button>
    </div>
</div>

@endsection