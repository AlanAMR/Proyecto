@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/bitlocker/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Clave de Bitlocker <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/accesos/bitlocker/cargar_csv')}}">
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
                    <th>Equipo</th>
                    <th>Identificador</th>
                    <th>Clave</th>
                    <th>Clave de recuperacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($claves as $clave)
                    <tr>

                        <th>{{$clave->id}}</th>
                        <th>
                            
                            @switch($clave->tipo)
                                @case(1)
                                    Servidor
                                    @break

                                @case(2)
                                    Computadora
                                    @break

                                @case(3)
                                    Laptop
                                    @break
                            @endswitch

                        </th>
                        <th>{{$clave->identificador}}</th>
                        <th>{{$clave->clave}}</th>
                        <th>
                                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$clave->clave}}','{{$clave->clave_recuperacion}}');"> Mostrar clave <i class="far fa-eye"></i></button> 
                                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$clave->clave_recuperacion}}');">Copiar clave de recuperacion <i class="far fa-copy"></i></button> 
                        </th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/accesos/bitlocker/ver/'.$clave->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/accesos/bitlocker/modificar/'.$clave->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$clave->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$clave->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$clave->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$clave->id}}">Eliminar Clave</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea eliminar la clave: {{$clave->identificador}} | {{$clave->clave}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/accesos/bitlocker/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$clave->id}}">
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
                    <th>Equipo</th>
                    <th>Identificador</th>
                    <th>Clave</th>
                    <th>Clave de recuperacion</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


<script type="text/javascript">
    
    function mostrar(clave,password){

            var fd = new FormData();
            fd.append('password', password);

            $.ajax({
                url: '{{url('api/accesos/desencriptar')}}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    alert("Clave: " + clave +"  Clave de recuperacion: " + response.message);
                },
                error: function (request, status, error) {
                    jsonValue = jQuery.parseJSON( request.responseText );
                    alert(jsonValue.error);
                }
            });
    }

    function copiar(password){
        var fd = new FormData();
        fd.append('password', password);

        $.ajax({
            url: '{{url('api/accesos/desencriptar')}}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                  alert("Clave copiada");
                  var $temp = $("<input>");
                  $("body").append($temp);
                  $temp.val(response.message).select();
                  document.execCommand("copy");
                  $temp.remove();
            },
            error: function (request, status, error) {
                jsonValue = jQuery.parseJSON( request.responseText );
                alert(jsonValue.error);
            }
        });

    }


</script>
@endsection