@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/laptops')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="update-laptop" method="post" action="{{url('almacen/laptops/actualizar')}}">
    
    @csrf


    <div class="row">
        
        <input type="hidden" name="id" value="{{$laptop->id}}">
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie" value="{{$laptop->num_serie}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input name="marca" class="form-control" list="options_marcas" id="datalist-marcas" value="{{$laptop->marca}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input name="modelo" class="form-control" list="options_modelos"  value="{{$laptop->modelo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador" class="form-label">Procesador</label>
                <input name="procesador" class="form-control" list="options_procesadores" value="{{$laptop->procesador}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="so" class="form-label">Sistema Operativo</label>
                <input name="so" class="form-control" list="options_so" value="{{$laptop->sistema_operativo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="antivirus" class="form-label">Antivirus</label>
                <input name="antivirus" class="form-control" list="options_antivirus" value="{{$laptop->antivirus}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="color" class="form-label">Color</label>
                
                <input type="text" name="color" class="form-control" value="{{$laptop->color}}">
            </div>
        </div>


    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        
        <a href="{{url('almacen/laptops')}}">
            <button class="btn btn-outline-danger btn-sm">
                Regresar    
            </button>
        </a>

        <button class="btn btn-outline-success btn-sm" onclick="document.getElementById('update-laptop').submit();">
            Actualizar informacion
        </button>
    </div>
</div>

@endsection