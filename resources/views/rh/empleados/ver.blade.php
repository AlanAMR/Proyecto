@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('rh/empleados')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')

    <div class="row">
        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapseempleado" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseempleado">
                    <h6 class="m-0 font-weight-bold text-primary">Empleado</h6>
                </a>
                <div class="collapse show" id="collapseempleado">
                    <div class="card-body">
                        <b>Estado:</b> 
                            <?php
                                switch ($usuario->status) {
                                    case '1':
                                        echo "Activo";
                                        break;
                                    case '0':
                                        echo "Inactivo";
                                        break;
                                    
                                    default:
                                        echo "TBA";
                                        break;
                                }
                            ?>
                        <br>
                        <b>Nombre:</b> {{$empleado->nombre}}<br>
                        <b>RFC:</b> {{$empleado->rfc}}<br>
                        <b>NSS:</b> {{$empleado->nss}}<br>
                        <b>Clave interna:</b> {{$empleado->clave}}<br>
                        <b>Edad:</b> {{$empleado->edad}} Años<br>
                        <b>Telefono:</b> {{$empleado->telefono1}}<br>
                        <b>Celular:</b> {{$empleado->telefono2}}<br>
                        <b>Correo:</b> {{$empleado->correo}}<br>
                        <b>Direccion:</b> {{$direccion->pais}}, {{$direccion->estado}}, {{$direccion->ciudad}}, {{$direccion->zona}}, {{$direccion->calle}} N° {{$direccion->numero_exterior}} @if($direccion->numero_interior != '') INT {{$direccion->numero_interior}} @endif Codigo Postal #{{$direccion->codigo_postal}}
                        @if($direccion->comprobante != null && $direccion->comprobante != '')
                            <a href="{{asset('empleados/'.$empleado->id.'/'.$direccion->comprobante)}}" target="_blank">
                                <button class="btn btn-sm btn-outline-success"> Ver comprobante</button>
                            </a>
                        @endif
                         <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow ">
                <a href="#collapsepuesto" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsepuesto">
                    <h6 class="m-0 font-weight-bold text-primary">Puesto</h6>
                </a>
                <div class="collapse show" id="collapsepuesto">
                    <div class="card-body">
                        <b>Area:</b> {{$area->valor}}<br>
                        <b>Puesto:</b> {{$puesto->valor}}<br>
                        <b>Horario:</b> {{$horario->identificador}}<br>
                        <b>Hora de inicio:</b> {{$horario->hora_inicio}}<br>
                        <b>Hora de salida:</b> {{$horario->hora_fin}}<br>
                        <b>Dias:</b>
                        <ul>
                            @if(str_contains($horario->dias, 'D')) <li> Domingo</li> @endif
                            @if(str_contains($horario->dias, 'L')) <li> Lunes</li> @endif
                            @if(str_contains($horario->dias, 'M')) <li> Martes</li> @endif
                            @if(str_contains($horario->dias, 'I')) <li> Miercoles</li> @endif
                            @if(str_contains($horario->dias, 'J')) <li> Jueves</li> @endif
                            @if(str_contains($horario->dias, 'V')) <li> Viernes</li> @endif
                            @if(str_contains($horario->dias, 'S')) <li> Sabado</li> @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapseuser" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseuser">
                    <h6 class="m-0 font-weight-bold text-primary">Usuario</h6>
                </a>
                <div class="collapse show" id="collapseuser">
                    <div class="card-body">
                        <b>Nombre:</b> {{$usuario->name}} <br>
                        <b>Nombre de usuario:</b> {{$usuario->nickname}} <br>
                        <b>Correo electronico:</b> {{$usuario->email}} <br>
                        <b>Roles:</b>
                        <ul>
                            @foreach($roles as $rol)
                            <li>{{$rol->rol}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapseine" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseine">
                    <h6 class="m-0 font-weight-bold text-primary">INE</h6>
                </a>
                <div class="collapse show" id="collapseine">
                    <div class="card-body">
                        <b>Clave de elector:</b> {{$ine->clave_elector}} <br>
                        <b>Curp:</b> {{$ine->curp}} <br>
                        <b>Fecha de nacimiento:</b> {{$ine->nacimiento}} <br>
                        <b>Año de registro:</b> {{$ine->anio_registro}} <br>
                        <b>Seccion:</b> {{$ine->seccion}} <br>
                        <b>Vigencia:</b> {{$ine->vigencia}} <br>
                        @if($ine->comprobante != null && $ine->comprobante != '')
                            <a href="{{asset('empleados/'.$empleado->id.'/'.$ine->comprobante)}}" target="_blank">
                                <button class="btn btn-sm btn-outline-success"> Ver comprobante</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapsebanco" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsebanco">
                    <h6 class="m-0 font-weight-bold text-primary">Banco</h6>
                </a>
                <div class="collapse show" id="collapsebanco">
                    <div class="card-body">
                        <b>Banco:</b> {{$banco->banco}} <br>
                        <b>Titular:</b> {{$banco->titular}} <br>
                        <b>Clabe:</b> {{$banco->clabe}} <br>
                        @if($banco->comprobante != null && $banco->comprobante != '')
                            <a href="{{asset('empleados/'.$empleado->id.'/'.$banco->comprobante)}}" target="_blank">
                                <button class="btn btn-sm btn-outline-success"> Ver comprobante</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapseemergencia" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseemergencia">
                    <h6 class="m-0 font-weight-bold text-primary">Emergencias</h6>
                </a>
                <div class="collapse show" id="collapseemergencia">
                    <div class="card-body">
                        @foreach($datosemergencia as $emergencia)
                            <b>Nombre:</b> {{$emergencia->nombre}} <br>
                            <ul>
                                <li><b>Parentesco:</b>{{$emergencia->parentesco}}</li>
                                <li><b>Telefono:</b>{{$emergencia->telefono}}</li>
                                <li><b>Direccion:</b>{{$emergencia->direccion}}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapsecargos" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsecargos">
                    <h6 class="m-0 font-weight-bold text-primary">Historial de cargos</h6>
                </a>
                <div class="collapse show" id="collapsecargos">
                    <div class="card-body">
                        @foreach($cargos as $cargo)
                            <b>Cargo:</b> {{$cargo->cargo}}<br>
                            <ul>
                                <li><b>Fecha de inicio:</b>{{$cargo->comienzo}}</li>
                                <li><b>Fecha de finalizacion:</b>{{$cargo->finaliza}}</li>
                                <li><b>Horario:</b>{{$cargo->horario}}</li>
                                <li><b>Estado:</b>
                                    <?php
                                        switch ($cargo->status) {
                                            case '1':
                                                echo "Puesto Actual";
                                                break;

                                            case '0':
                                                echo "Puesto antiguo";
                                                # code...
                                                break;
                                            
                                            default:
                                                echo "TBA";
                                                break;
                                        }
                                    ?>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="padding-top: 5px">
            <div class="card shadow">
                <a href="#collapseacademica" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseacademica">
                    <h6 class="m-0 font-weight-bold text-primary">Historial Academico</h6>
                </a>
                <div class="collapse show" id="collapseacademica">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Tipo</th>
                                    <th>Comprobante</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($academica as $aca)
                            <tr>
                                <td>{{$aca->valor}}</td>
                                <td>{{$aca->tipo}}</td>
                                <td>
                                    @if($aca->comprobante != null && $aca->comprobante != '')
                                        <a href="{{asset('empleados/'.$empleado->id.'/'.$aca->comprobante)}}" target="_blank">
                                            <button class="btn btn-sm btn-outline-success"> Ver comprobante</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

@endsection
