@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/permisos')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
    
    <form id="nuevo-permiso" method="post" action="{{url('/administracion/permisos/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <select id="usuario" name="usuario" required="" class="form-control">
                        <option value=""></option>
                    @foreach($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="permiso" class="form-label">Permiso</label>
                <select id="permiso" name="permiso" required="" class="form-control">
                        <option value=""></option>
                    @foreach($permisos as $permiso)
                        <option value="{{$permiso->id}}">{{$permiso->tabla}} | {{$permiso->tipo}} | {{$permiso->identificador}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/permisos')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nuevo-permiso').submit();">
            Añadir Permiso
        </button>
    </div>
</div>

@endsection