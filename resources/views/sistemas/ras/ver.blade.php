@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/ras')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        
       

        <div class="col-md-6">
            <div class="form-group">
                <b>Identificador: </b> {{$conexion->identificador}}<br>
                <b>Direccion: </b> {{$conexion->servidor}}<br>
                <b>Tipo: </b> {{$conexion->tipo}}<br>
                <b>Puerto: </b> {{$conexion->puerto}}<br>
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

        @if($cuentas->count() > 0)
            <div class="col-md-12">
                <label> <b>Cuentas Asociadas:</b></label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Identificador</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cuentas as $cuenta)
                                <tr>
                                    <th>{{$cuenta->id}}</th>
                                    <th>{{$cuenta->identificador}}</th>
                                    <th>{{$cuenta->usuario}}</th>
                                    <th>
                                        <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$cuenta->usuario}}','{{$cuenta->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                        <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$cuenta->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                                    </th>
                                    <th>
                                        <a href="{{url('sistemas/accesos/ras/ver/'.$cuenta->id)}}">
                                            <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                        </a>
                                    </th>
                                    
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Identificador</th>
                                <th>Usuario</th>
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
        
        <a href="{{url('sistemas/conexiones/ras')}}">
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