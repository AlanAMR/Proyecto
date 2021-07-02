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
	
    <form id="nuevo-area" method="post" action="{{url('/administracion/areas/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de el Area</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="empresa_id" class="form-label">Empresa</label>
                <select id="empresa_id" name="empresa_id" required="" class="form-control">
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
        
        <a href="{{url('administracion/areas')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nuevo-area').submit();">
            Añadir Area
        </button>
    </div>
</div>

@endsection