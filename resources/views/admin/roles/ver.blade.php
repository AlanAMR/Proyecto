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
	
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Rol: </label> {{$rol->valor}}
            </div>
        </div>


        <div class="col-md-8">
            <label> Permisos </label>

            <table class="table">
                <thead>
                    <tr>
                        <th>Modulo / Seccion</th>
                        <th>Tipo</th>
                        <th>Identificador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->tabla}}</td>
                            <td>{{$permiso->tipo}}</td>
                            <td>{{$permiso->identificador}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
    </div>

    <hr>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        <a href="{{url('administracion/roles')}}">
            <button class="btn btn-danger ">
                Regresar
            </button>
        </a>
</div>

@endsection