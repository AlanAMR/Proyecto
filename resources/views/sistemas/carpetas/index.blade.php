@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/carpetas/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Carpeta Compartida. <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/accesos/carpetas/cargar_csv')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Subir CSV / Excel <i class="fa fa-plus-circle"></i>
    </button>
</a>
@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Ruta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($carpetas as $carpeta)
                    <tr>
                        <th>{{$carpeta->id}}</th>
                        <th>{{$carpeta->conexion}}</th>
                        <th>{{$carpeta->identificador}}</th>
                        <th>{{$carpeta->ruta}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/accesos/carpetas/ver/'.$carpeta->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/accesos/carpetas/modificar/'.$carpeta->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$carpeta->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$carpeta->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$carpeta->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$carpeta->id}}">Eliminar carpeta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina la carpeta: {{$carpeta->identificador}} 

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/accesos/carpetas/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$carpeta->id}}">
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
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Ruta</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection