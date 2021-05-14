@extends('admin.template')


@section('main_div')
	
    
    <div class="row">
        <div class="col-md-4">
            <label><h5>Solicitante:</h5> </label> <b>{{$solicita->name}}</b>     
        </div>

        <div class="col-md-4">
            <label><h5>Autoriza:</h5> </label> <b>{{$autoriza->name}}</b>
        </div>

        <div class="col-md-4">
            <label><h5>Entrega:</h5> </label> <b>{{$entrega->name}}</b>
        </div>
    </div>

    <hr>
    <h5>Movimientos</h5>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Movimiento</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responsivasinsumos as $item)
                    <tr>
                        <th>{{$item->movimiento}}</th>
                        <th>{{$item->tipo_insumo}}</th>
                        <th>
                            @switch($item->tipo_insumo)
                                @case('Laptop')
                                    <table>
                                        <thead>
                                            <th>ID</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Nº Serie</th>
                                            <th>Procesador</th>
                                            <th>Sistema Operativo</th>
                                            <th>Antivirus</th>
                                        </thead>
                                        <tbody>
                                            <td>{{$item->item->id}}</td>
                                            <td>{{$item->item->marca}}</td>
                                            <td>{{$item->item->modelo}}</td>
                                            <td>{{$item->item->num_serie}}</td>
                                            <td>{{$item->item->procesador}}</td>
                                            <td>{{$item->item->sistema_operativo}}</td>
                                            <td>{{$item->item->antivirus}}</td>
                                        </tbody>
                                    </table>
                                    @break

                                @case('Celular')
                                    <table>
                                        <thead>
                                            <th>ID</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Nº Serie</th>
                                            <th>Imei</th>
                                        </thead>
                                        <tbody>
                                            <td>{{$item->item->id}}</td>
                                            <td>{{$item->item->marca}}</td>
                                            <td>{{$item->item->modelo}}</td>
                                            <td>{{$item->item->num_serie}}</td>
                                            <td>{{$item->item->imei}}</td>
                                        </tbody>
                                    </table>
                                    @break

                                @default
                                    {{$item->item}}
                            @endswitch
                        </th>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>Movimiento</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <hr>
    <h5>Archivos relacionados:</h5>
    <label>Subir Archivo:</label>
    <div class="col-md-12">
        <form method="post" action="{{url('almacen/responsivas/subirarchivo')}}" enctype="multipart/form-data">
            <div class="row">
        
            
                @csrf
                
                <input type="hidden" name="id" value="{{$responsiva->id}}">
                <input type="hidden" name="username" value="{{$solicita->name}}">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="archivo" class="form-label">Archivo:</label>
                        <input type="file" name="file" placeholder="Seleccionar..." class="form-control btn" required="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select name="tipo" class="form-control" required="">
                              @foreach($tipos_archivos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->valor}}</option>
                              @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit" class="form-control btn btn-info">Subir</button>
                    </div>
                </div>                

            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Archivo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivos as $arch)
                    <tr>
                        <th>{{$arch->tipo}}</th>
                        <th>{{$arch->nombre}}</th>
                        <th>{{$arch->item}}

                            <div class="btn-group" role="group" aria-label="">
                                
                                <a href="{{asset($arch->ruta.'/'.$arch->nombre)}}" target="_blank">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Ver en linea <i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <a href="{{asset($arch->ruta.'/'.$arch->nombre)}}" download="">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Descargar<i class="fas fa-download"></i></button> 
                                </a>

                                
                                @if($arch->tipo_id != 1)
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar-archivo-{{$arch->id}}">Eliminar<i class="fas fa-minus-circle"></i></button> 
                                
                                <!-- Modal -->
                                <div class="modal fade" id="eliminar-archivo-{{$arch->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-eliminar-archivo-{{$arch->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallistaestadoslabel">Eliminar archivo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        
                                        <h5>Se eliminara el archivo: {{$arch->nombre}}</h5>
                                        <small>Esta accion no puede deshacerse</small>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <form  method="post" action="{{url('/almacen/responsivas/eliminararchivo')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$arch->id}}">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-danger" name="submit" type="button" value="Eliminar">
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                                @endif

                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>Tipo</th>
                    <th>Archivo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <hr>
    <a href="{{url('almacen/responsivas')}}">
        <button class="btn btn-lg btn-info">Regresar</button> 
    </a>


@endsection