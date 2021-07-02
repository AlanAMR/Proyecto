@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/roles')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
    
    <form id="nuevo-rol" method="post" action="{{url('/administracion/roles/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Rol</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
            </div>
        </div>


        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Modulo / Seccion</th>
                        <th>Tipo</th>
                        <th>Identificador</th>
                        <th>¿Asignar?</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->tabla}}</td>
                            <td>{{$permiso->tipo}}</td>
                            <td>{{$permiso->identificador}}</td>
                            <td>
                                <input type="checkbox" name="permiso[{{$permiso->id}}]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/roles')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nuevo-rol').submit();">
            Añadir Rol
        </button>
    </div>
</div>

@endsection