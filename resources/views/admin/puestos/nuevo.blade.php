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
	
    <form id="nuevo-puesto" method="post" action="{{url('/administracion/puestos/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del Puesto</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="area_id" class="form-label">Area</label>
                <select id="area_id" name="area_id" required="" class="form-control">
                        <option value=""></option>
                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->empresa}}||{{$area->valor}}</option>
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
        <button class="btn btn-info" onclick="document.getElementById('nuevo-puesto').submit();">
            Añadir puesto
        </button>
    </div>
</div>

@endsection