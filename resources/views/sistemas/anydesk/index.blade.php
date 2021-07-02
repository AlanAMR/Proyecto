@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/anydesk/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Anydesk <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/accesos/anydesk/cargar_csv')}}">
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
                    <th>Anydesk</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($anydesk as $any)
                    <tr>

                        <th>{{$any->id}}</th>
                        <th>
                            
                            @switch($any->tipo)
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
                        <th>{{$any->identificador}}</th>
                        <th>{{$any->anydesk}}</th>
                        <th>
                                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$any->anydesk}}','{{$any->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$any->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                        </th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/accesos/anydesk/ver/'.$any->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/accesos/anydesk/modificar/'.$any->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$any->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$any->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$any->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$any->id}}">Eliminar Anydesk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el Any desk: {{$any->anydesk}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/accesos/anydesk/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$any->id}}">
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
                    <th>Anydesk</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


<script type="text/javascript">
    
    function mostrar(usuario,password){

            var fd = new FormData();
            fd.append('password', password);

            $.ajax({
                url: '{{url('api/accesos/desencriptar')}}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    alert("Uusario: " + usuario +"  Contraeña: " + response.message);
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
                  alert("Contraseña copiada");
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