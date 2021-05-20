@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/chips/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Chip <i class="fa fa-plus-circle"></i>
    </button>
</a>

<!-- Boton aniadir -->
<a href="{{url('almacen/chips/cargar_csv')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Chips via CSV / Excel <i class="fa fa-plus-circle"></i>
    </button>
</a>
@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>SIM</th>
                    <th>Operador</th>
                    <th>Plan</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($chips as $chip)
                    <tr>
                        <th>{{$chip->id}}</th>
                        <th>{{$chip->numero}}</th>
                        <th>{{$chip->sim}}</th>
                        <th>{{$chip->operador}}</th>
                        <th>{{$chip->plan}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{url('almacen/chips/modificar/'.$chip->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$chip->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$chip->id}}" tabindex="-1" role="dialog" aria-labelledby="modalchiplabel{{$chip->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalchiplabel{{$chip->id}}">Eliminar Chip</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el Chip: {{$chip->id}} | {{$chip->sim}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/almacen/chips/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$chip->id}}">
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
                    <th>Numero</th>
                    <th>SIM</th>
                    <th>Operador</th>
                    <th>Plan</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection