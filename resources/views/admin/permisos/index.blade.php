@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/permisos/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Permiso <i class="fa fa-plus-circle"></i>
    </button>
</a>

@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Tabla</th>
                    <th>Tipo</th>
                    <th>Identificador</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($permisos as $permiso)
                    <tr>
                        <th>{{$permiso->id}}</th>
                        <th>{{$permiso->nombre}}</th>
                        <th>{{$permiso->tabla}}</th>
                        <th>{{$permiso->tipo}}</th>
                        <th>{{$permiso->identificador}}</th>
                        <th>
                            <!-- Boton Modal cambiar lista de estados -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$permiso->id}}" >
                              Revocar <i class="fa fa-minus"></i>
                            </button>   

                            <div class="btn-group" role="group" aria-label="Basic example">

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$permiso->id}}" tabindex="-1" role="dialog" aria-labelledby="modalpermisolabel{{$permiso->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalpermisolabel{{$permiso->id}}">Revocar Permiso</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea revocar el permiso: {{$permiso->id}} | {{$permiso->identificador}} al usuario {{$permiso->nombre}}
                                        <hr>
                                        
                                        <form  method="post" action="{{url('/administracion/permisos/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$permiso->id}}">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-danger" name="submit" type="button" value="Eliminar">
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 5px">Cerrar</button>
                                            </div>
                                        </form>
                                              

                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </div>


                        </th>
                    </tr>
            	@endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Tabla</th>
                    <th>Tipo</th>
                    <th>Identificador</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection