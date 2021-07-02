@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/ftp')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        
       

        <div class="col-md-6">
            <div class="form-group">
                <b>Identificador: </b> {{$acceso->identificador}}<br>
                <b>Usuario: </b> {{$acceso->usuario}}<br>
                <b>Contraseña: </b><br>
                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$acceso->usuario}}','{{$acceso->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$acceso->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
            </div>
        </div>

        @if($conexion != null)
            <div class="col-md-6">
                <div class="form-group">
                    <b>Conexion:</b>{{$conexion->identificador}}<br>
                    <b>Puerto:</b>{{$conexion->puerto}}<br> 
                    <a href="{{url('sistemas/conexiones/ftp/ver/'.$conexion->id)}}">
                        <button class="btn btn-primary btn-sm" style="margin-right: 5px"> Ver detalles de la conexion <i class="far fa-eye"></i></button>
                    </a>
                </div>
            </div>
        @endif
        <hr>
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


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/ftp')}}">
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