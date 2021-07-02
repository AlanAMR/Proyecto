@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/ftp/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Usuario FTP <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/accesos/ftp/cargar_csv')}}">
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
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($usuarios as $usuario)
                    <tr>
                        <th>{{$usuario->id}}</th>
                        <th>{{$usuario->conexion}}</th>
                        <th>{{$usuario->identificador}}</th>
                        <th>{{$usuario->usuario}}</th>
                        <th>
                                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$usuario->usuario}}','{{$usuario->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$usuario->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                        </th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/accesos/ftp/ver/'.$usuario->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/accesos/ftp/modificar/'.$usuario->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$usuario->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$usuario->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$usuario->id}}">Eliminar usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el usuario: {{$usuario->identificador}} 

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/accesos/ftp/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$usuario->id}}">
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
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Usuario</th>
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
                    alert("Usuario: " + usuario +"  Contraeña: " + response.message);
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
                  alert("Contftpeña copiada");
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