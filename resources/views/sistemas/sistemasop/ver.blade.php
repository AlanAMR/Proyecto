@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/sistemaop')}}">
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
                <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$password->email}}','{{$password->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                            
                <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$password->password}}');">Copiar contraseña <i class="far fa-copy"></i></button>      
            </div>
        </div>

        @if($equipo != null)
            <div class="col-md-4">
                <div class="form-group">
                    <b>Equipo: </b>{{$equipo->identificador}}<br>
                    <b>Numero de serie: </b>{{$equipo->num_serie}}<br>
                    <b>Tipo: </b>{{$password->tipo}}<br>
                    <b>Marca: </b>{{$equipo->marca}}<br>
                    <b>Modelo: </b>{{$equipo->modelo}}<br>
                    <b>Procesador: </b>{{$equipo->procesador}}<br>
                    <b>Sistem Operativo: </b>{{$equipo->sistema_operativo}}<br>
                    <b>Antivirus: </b>{{$equipo->antivirus}}<br> 
                </div>
            </div>
        @endif


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/sistemaop')}}">
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
                    alert("Usuario: " + usuario +"  Contraseña: " + response.message);
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