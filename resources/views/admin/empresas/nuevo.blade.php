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
	
    <form id="nueva-empresa" method="post" action="{{url('/administracion/empresas/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la empresa</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
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
        <button class="btn btn-info" onclick="document.getElementById('nueva-empresa').submit();">
            Añadir Empresa
        </button>
    </div>
</div>

@endsection