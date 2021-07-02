@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/correos/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Agregar Correo <i class="fa fa-plus-circle"></i>
    </button>
</a>
<a href="{{url('sistemas/accesos/correos/cargar_csv')}}">
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
                    <th>Empleado</th>
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($emails as $email)
                    <tr>
                        <th>{{$email->id}}</th>
                        <th>{{$email->empleado}}</th>
                        <th>{{$email->servidor}}</th>
                        <th>{{$email->identificador}}</th>
                        <th>{{$email->email}}</th>
                        <th>
                                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$email->email}}','{{$email->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$email->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                        </th>
                        <th>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{url('sistemas/accesos/correos/ver/'.$email->id)}}">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                </a>

                                <a href="{{url('sistemas/accesos/correos/modificar/'.$email->id)}}">
                                    <button class="btn btn-success btn-sm" style="margin-right: 5px">Modificar datos<i class="fas fa-file-pdf"></i></button> 
                                </a>

                                <!-- Boton Modal cambiar lista de estados -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$email->id}}" >
                                  Eliminar <i class="fa fa-minus"></i>
                                </button>   

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar-{{$email->id}}" tabindex="-1" role="dialog" aria-labelledby="modallaptoplabel{{$email->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modallaptoplabel{{$email->id}}">Eliminar correo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="text-align: left;">
                                        Esta seguro que desea elimina el correo: {{$email->identificador}} | {{$email->email}}

                                        <hr>
                                        
                                        <form  method="post" action="{{url('sistemas/accesos/correos/eliminar')}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$email->id}}">
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
                    <th>Empleado</th>
                    <th>Conexion</th>
                    <th>Identificador</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


<script type="text/javascript">
    
    function mostrar(email,password){

            var fd = new FormData();
            fd.append('password', password);

            $.ajax({
                url: '{{url('api/accesos/desencriptar')}}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    alert("Correo: " + email +"  Contraeña: " + response.message);
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