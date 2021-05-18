@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/empresas')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="actualizar-empresa" method="post" action="{{url('/administracion/empresas/actualizar')}}">

    @csrf
    
    <input type="hidden" name="id" value="{{$empresa->id}}">
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la empresa</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$empresa->nombre}}" required="">
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/empresas')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-empresa').submit();">
            Actualizar Empresa
        </button>
    </div>
</div>

@endsection