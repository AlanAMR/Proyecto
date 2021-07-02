@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('rh/horarios/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Horario <i class="fa fa-plus-circle"></i>
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
                    <th>Dias</th>
                    <th>Hora de inicio</th>
                    <th>Hora de finalizacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($horarios as $horario)
                    <tr>
                        <th>{{$horario->id}}</th>
                        <th>{{$horario->identificador}}</th>
                        <th>
                            <ul>
                                @if(str_contains($horario->dias,'D'))
                                    <li>Domingo</li>
                                @endif

                                @if(str_contains($horario->dias,'L'))
                                    <li>Lunes</li>
                                @endif

                                @if(str_contains($horario->dias,'M'))
                                    <li>Martes</li>
                                @endif

                                @if(str_contains($horario->dias,'I'))
                                    <li>Miercoles</li>
                                @endif

                                @if(str_contains($horario->dias,'J'))
                                    <li>Jueves</li>
                                @endif

                                @if(str_contains($horario->dias,'V'))
                                    <li>Viernes</li>
                                @endif

                                @if(str_contains($horario->dias,'S'))
                                    <li>Sabado</li>
                                @endif
                            </ul>
                        </th>
                        <th>{{$horario->hora_inicio}}</th>
                        <th>{{$horario->hora_fin}}</th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <a href="{{url('rh/horarios/modificar/'.$horario->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$horario->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$horario->id}}" tabindex="-1" role="dialog" aria-labelledby="modalempresalabel{{$horario->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalarealabel{{$horario->id}}">Eliminar horario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el Horario: {{$horario->id}} | {{$horario->identificador}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('/rh/horarios/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$horario->id}}">
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
                    <th>Dias</th>
                    <th>Hora de inicio</th>
                    <th>Hora de finalizacion</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>



@endsection