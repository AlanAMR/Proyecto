@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/correos')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        
       

        <div class="col-md-6">
            <div class="form-group">
                <b>Identificador: </b> {{$password->identificador}}<br>
                <b>Correo: </b> {{$password->email}}<br>
                <br>
                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$password->email}}','{{$password->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                            
                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$password->password}}');">Copiar contraseña <i class="far fa-copy"></i></button>      
            </div>
        </div>

        @if($empleado != null)
            <div class="col-md-4">
                <div class="form-group">
                    <b>Empleado:</b>{{$empleado->nombre}}<br>
                    <b>Clave:</b>{{$empleado->clave}}<br>
                    <b>Telefono:</b>{{$empleado->telefono1}}<br>
                    <b>Celular:</b>{{$empleado->telefono2}}<br>
                    <b>Correo:</b>{{$empleado->correo}}<br> 

                    <a href="{{url('rh/empleados/ver/'.$empleado->id)}}">
                        <button class="btn btn-primary btn-sm" style="margin-right: 5px"> Ver detalles del empleado <i class="far fa-eye"></i></button>
                    </a>

                </div>
            </div>
        @endif

        @if($conexion != null)
            <div class="col-md-4">
                <div class="form-group">
                    <b>Identificador:</b>{{$conexion->identificador}}<br>
                    <b>Dominio:</b>{{$conexion->dominio}}<br>
                    <b>Protocolo de acceso:</b>{{$conexion->protocolo_acceso}}<br>
                    
                    <b>Servidor entrante:</b>{{$conexion->servidor_entrante}}<br>
                    <b>Puerto entrada:</b>{{$conexion->puerto_entrada}}<br>
                    <b>Cifrado entrada:</b>{{$conexion->cifrado_entrante}}<br>
                    
                    <b>Servidor saliente:</b>{{$conexion->servidor_saliente}}<br>
                    <b>Puerto salida:</b>{{$conexion->puerto_salida}}<br>
                    <b>Cifrado salida:</b>{{$conexion->cifrado_saliente}}<br>

                    <a href="{{url('sistemas/conexiones/smtp/ver/'.$conexion->id)}}">
                        <button class="btn btn-primary btn-sm" style="margin-right: 5px"> Ver detalles de la conexion <i class="far fa-eye"></i></button>
                    </a>
                </div>
            </div>
        @endif


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/correos')}}">
            <button class="btn btn-danger ">
                Regresar
            </button>
        </a>
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