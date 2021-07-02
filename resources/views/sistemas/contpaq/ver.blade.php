@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/contpaq')}}">
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
                <b>Usuario: </b> {{$password->usuario}}<br>
                <br>
                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$password->usuario}}','{{$password->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                            
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
                </div>
            </div>
        @endif


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/contpaq')}}">
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
                    alert("Usuario: " + email +"  Contraeña: " + response.message);
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