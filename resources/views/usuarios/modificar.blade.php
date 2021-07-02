@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/usuarios')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="modificar-usuario" method="post" action="{{url('/administracion/usuarios/actualizar')}}">
    
    @csrf
    <input type="hidden" name="id" value="{{$usuario->id}}">

    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$usuario->name}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="nickname" class="form-label">Sobrenombre</label>
                <input type="text" name="nickname" class="form-control" placeholder="Sobrenombre" value="{{$usuario->nickname}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="rol" class="form-label">Rol</label>

                <select name="rol" class="form-control" id="rol" aria-label="Rol">
                  <option selected>{{$usuario->rol}}</option>
                  @foreach($roles as $rol)
                    @if($rol->valor != $usuario->rol)
                        <option value="{{$rol->id}}">{{$rol->valor}}</option>
                    @endif  
                @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control" id="rol" aria-label="status">
                  @switch($usuario->status)
                      @case('0')
                        <option selected value="0">Baja</option>
                      @endcase
                      @case('1')
                        <option selected value="1">Activo</option>
                      @endcase
                  @endswitch
                  <option value="0">Baja</option>
                  <option value="1">Activo</option>

                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="password" class="form-label">Nueva contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" value="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="confirmpassword" class="form-label">Confirmar contraseña</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Contraseña" value="">
            </div>
        </div>


    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/usuarios')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('modificar-usuario').submit();">
            Actualizar Datos
        </button>
    </div>
</div>

@endsection