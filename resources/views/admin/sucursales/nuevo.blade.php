@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/sucursales')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="nueva-sucursal" method="post" action="{{url('/administracion/sucursales/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la Sucursal</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ubicacion" class="form-label">Ubicacion</label>
                <input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion" value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="empresa" class="form-label">Empresa</label>
                <select id="empresa" name="empresa" required="" class="form-control">
                        <option value=""></option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/sucursales')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nueva-sucursal').submit();">
            Añadir Sucursal
        </button>
    </div>
</div>

@endsection