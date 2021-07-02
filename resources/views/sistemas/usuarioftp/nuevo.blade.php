@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/ftp')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-ftp" method="post" action="{{url('sistemas/accesos/ftp/crear')}}">
    
    @csrf


    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="conexion_id" class="form-label">Conexion</label>
                
                <select name="conexion_id" class="form-control" required="">
                      <option value="-1">Sin Conexion</option>
                      @foreach($conexiones as $conexion)
                        <option value="{{$conexion->id}}">{{$conexion->servidor}} | {{$conexion->identificador}}</option>
                      @endforeach
                </select>
            </div>
        </div>
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{old('identificador')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario.." value="{{old('usuario')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia" class="form-label">Contraseña</label>
                <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña..." value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia_confirmacion" class="form-label">Confirmacion de Contraseña</label>
                <input type="password" name="contrasenia_confirmacion" class="form-control" placeholder="Contraseña..." value="" required="">
            </div>
        </div>
        

    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/ftp')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-ftp').submit();">
            Añadir Usuario VPN
        </button>
    </div>
</div>

@endsection