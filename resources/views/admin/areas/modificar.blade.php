@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/areas')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="actualizar-area" method="post" action="{{url('/administracion/areas/actualizar')}}">

    @csrf
    
    <input type="hidden" name="id" value="{{$area->id}}">
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Area</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$area->valor}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="empresa_id" class="form-label">Empresa</label>
                <select id="empresa_id" name="empresa_id" required="" class="form-control">
                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                    @foreach($empresas as $emp)
                        <option value="{{$emp->id}}">{{$emp->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/areas')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-area').submit();">
            Actualizar Area
        </button>
    </div>
</div>

@endsection