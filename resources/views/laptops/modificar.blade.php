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

<form id="create-laptop" method="post" action="{{url('almacen/laptops/crear')}}">
    
    @csrf


    <div class="row">
        
       

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
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" value="{{$laptop->usuario}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{$laptop->password}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="color" class="form-label">Color</label>
                
                <input type="text" name="color" class="form-control" value="{{$laptop->color}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="anydesk" class="form-label">Any Desk</label>
                <input type="text" name="anydesk" class="form-control" value="{{$laptop->anydesk}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="anydeskpassword" class="form-label">Contraseña (Any Desk)</label>
                <input type="text" name="anydeskpassword" class="form-control" value="{{$laptop->anydeskpassword}}">
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
    </div>
</div>

@endsection