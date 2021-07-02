@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/responsivas/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Nueva responsiva <i class="fa fa-plus-circle"></i>
    </button>
</a>

<!-- Boton Modal cambiar lista de estados -->
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalListaEstados" >
  Lista de estados <i class="fa fa-list"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modalListaEstados" tabindex="-1" role="dialog" aria-labelledby="modallistaestadoslabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modallistaestadoslabel">Administracion de lista de estados validos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: left;">
        

        <h5>Estados Actuales:</h5>

        <ul>
            @foreach($responsivasestados as $estado)
                <li>{{$estado->valor}}</li>
            @endforeach
        </ul>
        
        <hr>
        
        <form  method="get" action="{{url('/almacen/responsivas/anadirestado')}}">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Nuevo estado"
                    aria-label="valor" aria-describedby="basic-addon2" name="valor">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-success" name="submit" type="button" value="Añadir">
                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('main_div')
	
	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Solicitante</th>
                    <th>Autoriza</th>
                    <th>Entrega</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($responsivas as $responsiva)
                    <tr>
                        <th>{{$responsiva->id}}</th>
                        <th>{{$responsiva->solicita}}</th>
                        <th>{{$responsiva->autoriza}}</th>
                        <th>{{$responsiva->entrega}}</th>
                        <th>{{$responsiva->fecha}}</th>
                        <th>{{$responsiva->estado}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('almacen/responsivas/ver/'.$responsiva->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('almacen/responsivas/verpdf/'.$responsiva->id)}}" target="_blank">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Ver PDF <i class="fas fa-file-pdf"></i></button> 
                                </a>
                                <!--
                                <a href="{{url('almacen/responsivas/descargarpdf/'.$responsiva->id)}}">
                                    <button class="btn btn-default btn-sm">Descargar PDF <i class="fas fa-download"></i></i></button> 
                                </a>
                            -->
                            </div>


                        </th>
                    </tr>
            	@endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Solicitante</th>
                    <th>Autoriza</th>
                    <th>Entrega</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection