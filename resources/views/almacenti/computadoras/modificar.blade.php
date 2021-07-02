@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/computadoras')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="update-computadora" method="post" action="{{url('almacen/computadoras/actualizar')}}">
    
    @csrf


    <div class="row">
        
        <input type="hidden" name="id" value="{{$computadora->id}}">
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie" value="{{$computadora->num_serie}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input name="marca" class="form-control" list="options_marcas" id="datalist-marcas" value="{{$computadora->marca}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input name="modelo" class="form-control" list="options_modelos"  value="{{$computadora->modelo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador" class="form-label">Procesador</label>
                <input name="procesador" class="form-control" list="options_procesadores" value="{{$computadora->procesador}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="so" class="form-label">Sistema Operativo</label>
                <input name="so" class="form-control" list="options_so" value="{{$computadora->sistema_operativo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="antivirus" class="form-label">Antivirus</label>
                <input name="antivirus" class="form-control" list="options_antivirus" value="{{$computadora->antivirus}}">
            </div>
        </div>

    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        
        <a href="{{url('almacen/computadoras')}}">
            <button class="btn btn-outline-danger btn-sm">
                Regresar    
            </button>
        </a>

        <button class="btn btn-outline-success btn-sm" onclick="document.getElementById('update-computadora').submit();">
            Actualizar informacion
        </button>
    </div>
</div>

@endsection