@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/servidores/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Servidor <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/servidores/cargar_csv')}}">
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
                    <th>Identificador</th>
                    <th>Numero de Serie</th>
                    <th>Tipo</th>
                    <th>Propietario</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($servidores as $servidor)
                    <tr>
                        <th>{{$servidor->id}}</th>
                        <th>{{$servidor->identificador}}</th>
                        <th>{{$servidor->num_serie}}</th>
                        <th>
                            @switch($servidor->tipo)
                                @case(1)
                                    Servidor Compartido
                                    @break

                                @case(2)
                                    Servidor Dedicado
                                    @break

                                @case(3)
                                    Servidor Virtual
                                    @break
                            @endswitch
                        </th>
                        <th>
                            @switch($servidor->propietario)
                                @case(1)
                                    Propio (Fisico)
                                    @break

                                @case(2)
                                    Propio (Virtual)
                                    @break

                                @case(3)
                                    Alquilado (Fisico)
                                    @break

                                @case(4)
                                    Alquilado (Virtual)
                                    @break
                            @endswitch

                        </th>
                        <th>{{$servidor->marca}}</th>
                        <th>{{$servidor->modelo}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/servidores/ver/'.$servidor->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/servidores/modificar/'.$servidor->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$servidor->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$servidor->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$servidor->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$servidor->id}}">Eliminar servidor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el servidor: {{$servidor->identificador}} 

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/servidores/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$servidor->id}}">
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
                    <th>Identificador</th>
                    <th>Numero de Serie</th>
                    <th>Tipo</th>
                    <th>Propietario</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection