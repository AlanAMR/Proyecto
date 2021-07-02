@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen-general/subcategorias/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar subcategorias <i class="fa fa-plus-circle"></i>
    </button>
</a>


@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($subcategorias as $subcategoria)
                    <tr>
                        <th>{{$subcategoria->id}}</th>
                        <th>{{$subcategoria->valor}}</th>
                        <th>{{$subcategoria->categoria}}</th>
                        <th>
                                <!-- Boton Modal cambiar lista de estados -->
                                <a href="{{url('almacen-general/subcategorias/modificar/'.$subcategoria->id)}}">
                                    
                                    <button type="button" class="btn btn-success btn-sm" >
                                      Modificar <i class="fa fa-minus"></i>
                                    </button>   
                                </a>

                            <div class="btn-group" role="group" aria-label="Basic example">


                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$subcategoria->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$subcategoria->id}}" tabindex="-1" role="dialog" aria-labelledby="modalempresalabel{{$subcategoria->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalarticulolabel{{$subcategoria->id}}">Eliminar Subcategoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea eliminar la subcategoria: {{$subcategoria->id}} | {{$subcategoria->valor}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/almacen-general/subcategorias/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$subcategoria->id}}">
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
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection