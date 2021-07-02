@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/laptops/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Laptop <i class="fa fa-plus-circle"></i>
    </button>
</a>

<a href="{{url('almacen/laptops/cargar_csv')}}">
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
                    <th>Nº Serie</th>
                    <th>Estado</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Procesador</th>
                    <th>Sistema Operativo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($laptops as $laptop)
                    <tr>
                        <th>{{$laptop->id}}</th>
                        <th>{{$laptop->num_serie}}</th>
                        <th>
                            @switch($laptop->status)
                            @case(1)
                                En Stock
                            @break
                            @case(2)
                                Asignada
                            @break
                            @case(3)
                                Baja
                            @break
                            @endswitch
                        </th>
                        <th>{{$laptop->marca}}</th>
                        <th>{{$laptop->modelo}}</th>
                        <th>{{$laptop->procesador}}</th>
                        <th>{{$laptop->sistema_operativo}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('almacen/laptops/ver/'.$laptop->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('almacen/laptops/modificar/'.$laptop->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$laptop->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$laptop->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$laptop->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$laptop->id}}">Eliminar laptop</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina la laptop: {{$laptop->id}} | {{$laptop->num_serie}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/almacen/laptops/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$laptop->id}}">
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
                    <th>Estado</th>
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