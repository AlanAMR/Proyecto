@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/servidores')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        
        <div class="col-lg-12" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapservidor" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapservidor">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles</h6>
                </a>
                <div class="collapse show" id="collapservidor">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <b>Servidor: </b>{{$servidor->identificador}}<br>
                                    <b>Numero de serie: </b>{{$servidor->num_serie}}<br>
                                    <b>Tipo: </b>
                                        @switch($servidor->tipo)
                                            @case(1)
                                                Servidor Compartido
                                                @break

                                            @case(2)
                                                Servidor Dedicado
                                                @break

                                            @case(3)
                                                Servidor Virtual
                                                @break
                                        @endswitch
                                    <br>
                                    <b>Propietario: </b>
                                        @switch($servidor->propietario)
                                            @case(1)
                                                Propio (Fisico)
                                                @break

                                            @case(2)
                                                Propio (Virtual)
                                                @break

                                            @case(3)
                                                Alquilado (Fisico)
                                                @break

                                            @case(4)
                                                Alquilado (Virtual)
                                                @break
                                        @endswitch
                                    <br>
                                    <b>Marca: </b>{{$servidor->marca}}<br>
                                    <b>Modelo: </b>{{$servidor->modelo}}<br>
                                    <b>Procesador: </b>{{$servidor->procesador}}<br>
                                    <b>Memoria Ram: </b>{{$servidor->ram}}<br>
                                    <b>Almacenamiento: </b>{{$servidor->almacenamiento}}<br>
                                    <b>Sistema Operativo: </b>{{$servidor->sistema_operativo}}<br>
                                    <b>Antivirus: </b>{{$servidor->antivirus}}<br>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <label><b>Accesos:</b></label><br>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Identificador</th>
                                            <th>Tipo</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sisop as $sis)
                                            <tr>
                                                <th>{{$sis->identificador}}</th>
                                                <th>Usuario del sistema</th>
                                                <th>{{$sis->usuario}}</th>
                                                <th>
                                                    <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$sis->usuario}}','{{$sis->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                                    <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$sis->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                                                </th>
                                                
                                            </tr>
                                        @endforeach

                                        @foreach($anydesk as $any)
                                            <tr>
                                                <th>{{$any->identificador}}</th>
                                                <th>Any desk</th>
                                                <th>{{$any->anydesk}}</th>
                                                <th>
                                                    <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$any->anydesk}}','{{$any->password}}');"> Mostrar contraseña <i class="far fa-eye"></i></button> 
                                                    <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$any->password}}');">Copiar contraseña <i class="far fa-copy"></i></button> 
                                                </th>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if($bitlocker->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsebit" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsebit">
                    <h6 class="m-0 font-weight-bold text-primary">Bitlocker</h6>
                </a>
                <div class="collapse show" id="collapsebit">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Clave</th>
                                        <th>Clave de recuperacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bitlocker as $bit)
                                        <tr>
                                            <th>{{$bit->id}}</th>
                                            <th>{{$bit->identificador}}</th>
                                            <th>{{$bit->clave}}</th>
                                            <th>
                                                    <button class="btn btn-secondary btn-sm" style="margin-right: 5px" onclick="mostrar('{{$bit->clave}}','{{$bit->clave_recuperacion}}');"> Mostrar clave de recuperacion <i class="far fa-eye"></i></button> 
                                                    <button class="btn btn-warning btn-sm" style="margin-right: 5px" onclick="copiar('{{$bit->clave_recuperacion}}');">Copiar clave de recuperacion <i class="far fa-copy"></i></button> 
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($smtp->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsesmtp" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsesmtp">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones SMTP</h6>
                </a>
                <div class="collapse show" id="collapsesmtp">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Dominio</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($smtp as $consmtp)
                                        <tr>
                                            <th>{{$consmtp->id}}</th>
                                            <th>{{$consmtp->identificador}}</th>
                                            <th>{{$consmtp->dominio}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/smtp/ver/'.$consmtp->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($dbms->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsedb" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsedb">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones DBMS</h6>
                </a>
                <div class="collapse show" id="collapsedb">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Gestor</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dbms as $db)
                                        <tr>
                                            <th>{{$db->id}}</th>
                                            <th>{{$db->identificador}}</th>
                                            <th>{{$db->gestor_dbms}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/dbms/ver/'.$consmtp->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($smb->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsesmb" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsesmb">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones SMB / CIFS</h6>
                </a>
                <div class="collapse show" id="collapsesmb">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Direccion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($smb as $sm)
                                        <tr>
                                            <th>{{$sm->id}}</th>
                                            <th>{{$sm->identificador}}</th>
                                            <th>{{$sm->servidor}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/smb/ver/'.$sm->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($ras->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapseras" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseras">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones RAS / RDP / SSH</h6>
                </a>
                <div class="collapse show" id="collapseras">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Direccion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ras as $ra)
                                        <tr>
                                            <th>{{$ra->id}}</th>
                                            <th>{{$ra->identificador}}</th>
                                            <th>{{$ra->servidor}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/ras/ver/'.$consmtp->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($ftp->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapseftp" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseftp">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones FTP</h6>
                </a>
                <div class="collapse show" id="collapseftp">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Direccion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ftp as $ft)
                                        <tr>
                                            <th>{{$ft->id}}</th>
                                            <th>{{$ft->identificador}}</th>
                                            <th>{{$ft->servidor}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/ftp/ver/'.$ft->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($carpetas->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsecarpetas" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsecarpetas">
                    <h6 class="m-0 font-weight-bold text-primary">Carpetas Compartidas</h6>
                </a>
                <div class="collapse show" id="collapsecarpetas">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Ruta</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carpetas as $carp)
                                        <tr>
                                            <th>{{$carp->id}}</th>
                                            <th>{{$carp->identificador}}</th>
                                            <th>{{$carp->ruta}}</th>
                                            <th>
                                                <a href="{{url('sistemas/accesos/correos/ver/'.$consmtp->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($vpn->count() > 0)
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsevpn" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsevpn">
                    <h6 class="m-0 font-weight-bold text-primary">Conexiones VPN</h6>
                </a>
                <div class="collapse show" id="collapsevpn">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Identificador</th>
                                        <th>Direccion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vpn as $vp)
                                        <tr>
                                            <th>{{$vp->id}}</th>
                                            <th>{{$vp->identificador}}</th>
                                            <th>{{$vp->servidor}}</th>
                                            <th>
                                                <a href="{{url('sistemas/conexiones/vpn/ver/'.$consmtp->id)}}">
                                                    <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                                </a>
                                            </th>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        <br>
        <a href="{{url('sistemas/servidores')}}">
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