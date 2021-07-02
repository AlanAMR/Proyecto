@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/computadoras/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Computadora <i class="fa fa-plus-circle"></i>
    </button>
</a>

@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nº Serie</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>Sistema Operativo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($computadoras as $computadora)
                    <tr>
                        <th>{{$computadora->id}}</th>
                        <th>{{$computadora->num_serie}}</th>
                        <th>{{$computadora->marca}}</th>
                        <th>{{$computadora->modelo}}</th>
                        <th>{{$computadora->procesador}}</th>
                        <th>{{$computadora->sistema_operativo}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('almacen/computadoras/ver/'.$computadora->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('almacen/computadoras/modificar/'.$computadora->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$computadora->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$computadora->id}}" tabindex="-1" role="dialog" aria-labelledby="modalcomputadoralabel{{$computadora->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalcomputadoralabel{{$computadora->id}}">Eliminar computadora</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina la computadora: {{$computadora->id}} | {{$computadora->num_serie}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/almacen/computadoras/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$computadora->id}}">
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
                    <th>Nº Serie</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>Sistema Operativo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection