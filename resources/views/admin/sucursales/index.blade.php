@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/sucursales/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Sucursal <i class="fa fa-plus-circle"></i>
    </button>
</a>

@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Sucursal</th>
                    <th>Ubicacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($sucursales as $sucursal)
                    <tr>
                        <th>{{$sucursal->id}}</th>
                        <th>{{$sucursal->empresa}}</th>
                        <th>{{$sucursal->nombre}}</th>
                        <th>{{$sucursal->ubicacion}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{url('administracion/sucursales/modificar/'.$sucursal->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$sucursal->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$sucursal->id}}" tabindex="-1" role="dialog" aria-labelledby="modalempresalabel{{$sucursal->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalcelualrlabel{{$sucursal->id}}">Eliminar sucursal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el sucursal: {{$sucursal->id}} | {{$sucursal->nombre}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/administracion/sucursales/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$sucursal->id}}">
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
                    <th>Empresa</th>
                    <th>Sucursal</th>
                    <th>Ubicacion</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection