@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/smtp/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar conexion SMTP <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/conexiones/smtp/cargar_csv')}}">
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
                    <th>Servidor</th>
                    <th>Identificador</th>
                    <th>Dominio</th>
                    <th>Protocolo de acceso</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($conexiones as $conexion)
                    <tr>
                        <th>{{$conexion->id}}</th>
                        <th>{{$conexion->servidor}}</th>
                        <th>{{$conexion->identificador}}</th>
                        <th>{{$conexion->dominio}}</th>
                        <th>{{$conexion->protocolo_acceso}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/conexiones/smtp/ver/'.$conexion->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/conexiones/smtp/modificar/'.$conexion->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$conexion->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$conexion->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$conexion->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$conexion->id}}">Eliminar conexion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina la conexion: {{$conexion->identificador}} 

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/conexiones/smtp/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$conexion->id}}">
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
                    <th>Servidor</th>
                    <th>Identificador</th>
                    <th>Dominio</th>
                    <th>Protocolo de acceso</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection