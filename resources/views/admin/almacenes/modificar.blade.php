@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/almacenes')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="actualizar-almacen" method="post" action="{{url('/administracion/almacenes/actualizar')}}">

    @csrf
    
    <input type="hidden" name="id" value="{{$almacen->id}}">
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Almacen</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$almacen->nombre}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ubicacion" class="form-label">Ubicacion</label>
                <input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion" value="{{$almacen->ubicacion}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sucursal" class="form-label">Sucursal</label>
                <select id="sucursal" name="sucursal" required="" class="form-control">
                        <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                    @foreach($sucursales as $suc)
                        <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/almacenes')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-almacen').submit();">
            Actualizar Almacen
        </button>
    </div>
</div>

@endsection