@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('rh/empleados/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Empleado <i class="fa fa-plus-circle"></i>
    </button>
</a>

@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($empleados as $empleado)
                    <tr>
                        <th>{{$empleado->id}}</th>
                        <th>{{$empleado->clave}}</th>
                        <th>{{$empleado->nombre}}</th>
                        <th>{{$empleado->telefono1}}</th>
                        <th>{{$empleado->telefono2}}</th>
                        <th>{{$empleado->correo}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{url('rh/empleados/ver/'.$empleado->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver datos</button> 
                                </a>

                                <a href="{{url('rh/empleados/modificar/'.$empleado->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                            </div>


                        </th>
                    </tr>
            	@endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection