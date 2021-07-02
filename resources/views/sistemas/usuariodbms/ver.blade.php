@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/dbms')}}">
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
                    <b>Conexion: </b>{{$conexion->identificador}}<br>
                    <b>Gestor: </b>{{$conexion->gestor_dbms}}<br>
                    <b>Servidor: </b>{{$conexion->servidor}}<br> 
                    <b>Puerto: </b>{{$conexion->puerto}}<br>
                    <b>Dataset: </b>{{$conexion->dataset}}<br> 
                    <a href="{{url('sistemas/conexiones/dbms/ver/'.$conexion->id)}}">
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
        
        <a href="{{url('sistemas/accesos/dbms')}}">
            <button class="btn btn-danger ">
                Regresar
            </button>
        </a>
</div>

@endsection