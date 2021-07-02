@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/carpetas')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        
       

        <div class="col-md-6">
            <div class="form-group">
                <b>Identificador: </b> {{$carpeta->identificador}}<br>
                <b>Ruta: </b> {{$carpeta->ruta}}<br>
            </div>
        </div>

        @if($servidor != null)
            <div class="col-md-6">
                <div class="form-group">
                    <b>Servidor: </b>{{$servidor->identificador}}<br>
                    <b>Numero de serie: </b>{{$servidor->num_serie}}<br>
                    <b>Marca: </b>{{$servidor->marca}}<br>
                    <b>Modelo: </b>{{$servidor->modelo}}<br>
                    <b>Sistema Operativo: </b>{{$servidor->sistema_operativo}}<br>
                    <a href="{{url('sistemas/servidores/ver/'.$servidor->id)}}">
                        <button class="btn btn-primary btn-sm" style="margin-right: 5px"> Ver detalles del servidor <i class="far fa-eye"></i></button>
                    </a>
                </div>
            </div>
        @endif

        @if($usuarios->count() > 0)
            <div class="col-md-12">
                <label> <b>Cuentas asociadas:</b></label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Empleado</th>
                                <th>Usuario</th>
                                <th>Permisos</th>
                                <th>Contraseña</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <th>{{$usuario->id}}</th>
                                    <th>{{$usuario->empleado}}</th>
                                    <th>{{$usuario->usuarioras}}</th>
                                    <th>
                                        @if($usuario->permisos == 'r')
                                            Leer
                                        @endif

                                        @if($usuario->permisos == 'rw')
                                            Leer y Escribir
                                        @endif

                                        @if($usuario->permisos == 'rx')
                                            Leer y Ejecutar
                                        @endif

                                        @if($usuario->permisos == 'rwx')
                                            Leer, Escribir y Ejecutar
                                        @endif

                                        @if($usuario->permisos == 'w')
                                            Escribir
                                        @endif

                                        @if($usuario->permisos == 'wx')
                                            Escribir y Ejecutar
                                        @endif

                                        @if($usuario->permisos == 'x')
                                            Ejecutar
                                        @endif

                                        @if($usuario->permisos == 'ct')
                                            Control Total
                                        @endif

                                    </th>
                                    <th>
                                        @if($usuario->usuarioras != null)
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$usuario->usuarioras}}','{{$usuario->passwordras}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                            
                                        <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$usuario->passwordras}}');">Copiar contraseña <i class="far fa-copy"></i></button>   
                                        @endif
                                    </th>
                                    <th>
                                        @if($usuario->usuarioras_id != null)
                                        <a href="{{url('sistemas/accesos/ras/ver/'.$usuario->usuarioras_id)}}">
                                            <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver Usuario <i class="far fa-eye"></i></button> 
                                        </a>
                                        @endif
                                        @if($usuario->empleado_id != null)
                                        <a href="{{url('rh/empleados/ver/'.$usuario->empleado_id)}}">
                                            <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver Empleado <i class="far fa-eye"></i></button> 
                                        </a>
                                        @endif
                                    </th>
                                    
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Empleado</th>
                                <th>Usuario</th>
                                <th>Permisos</th>
                                <th>Contraseña</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/carpetas')}}">
            <button class="btn btn-danger ">
                Regresar
            </button>
        </a>
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
                    alert("Any Desk: " + usuario +"  Contraseña: " + response.message);
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