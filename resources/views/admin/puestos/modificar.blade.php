@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/puestos')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="actualizar-puesto" method="post" action="{{url('/administracion/puestos/actualizar')}}">

    @csrf
    
    <input type="hidden" name="id" value="{{$puesto->id}}">
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Puesto</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$puesto->valor}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="area_id" class="form-label">Area</label>
                <select id="area_id" name="area_id" required="" class="form-control">
                        <option value="{{$area->id}}">{{$area->valor}}</option>
                    @foreach($areas as $ar)
                        <option value="{{$ar->id}}">{{$ar->empresa}}||{{$ar->valor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/puestos')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-puesto').submit();">
            Actualizar Puesto
        </button>
    </div>
</div>

@endsection