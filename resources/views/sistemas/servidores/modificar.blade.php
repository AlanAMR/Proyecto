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

<form id="actualizar-servidor" method="post" action="{{url('sistemas/servidores/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$servidor->id}}">


    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$servidor->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de Serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie... " value="{{$servidor->num_serie}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" class="form-control" required="">
                    <option value="1">Servidor Compartido</option>
                    <option value="2">Servidor Dedicado</option>
                    <option value="3">Servidor Virtual</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="propietario" class="form-label">Tipo</label>
                <select name="propietario" class="form-control" required="">
                    <option value="1">Propio (Fisico)</option>
                    <option value="2">Propio (Virtual)</option>
                    <option value="3">Alquilado (Fisico)</option>
                    <option value="4">Alquilado (Virtual)</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" placeholder="Marca... " value="{{$servidor->marca}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" placeholder="Modelo... " value="{{$servidor->modelo}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador" class="form-label">Procesador</label>
                <input type="text" name="procesador" class="form-control" placeholder="Procesador... " value="{{$servidor->procesador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ram" class="form-label">Memoria Ram</label>
                <input type="text" name="ram" class="form-control" placeholder="Memoria Ram... " value="{{$servidor->ram}}" required="">
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="almacenamiento" class="form-label">Almacenamiento</label>
                <input type="text" name="almacenamiento" class="form-control" placeholder="Almacenamiento... " value="{{$servidor->almacenamiento}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sistema_operativo" class="form-label">Sistema Operativo</label>
                <input type="text" name="sistema_operativo" class="form-control" placeholder="Sistema Operativo... " value="{{$servidor->sistema_operativo}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="antivirus" class="form-label">Antivirus</label>
                <input type="text" name="antivirus" class="form-control" placeholder="Antivirus... " value="{{$servidor->antivirus}}" required="">
            </div>
        </div>

    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/servidores')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-servidor').submit();">
            Actualizar Servidor
        </button>
    </div>
</div>

@endsection