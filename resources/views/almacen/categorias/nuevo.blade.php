@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen-general/categorias')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="crear-categoria" method="post" action="{{url('almacen-general/categorias/crear')}}">
    
    @csrf


    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la categoria</label>
                <input type="text" name="nombre" class="form-control" placeholder="Categoria..." value="{{old('nombre')}}" required="">
            </div>
        </div>

        

    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen/categorias')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('crear-categoria').submit();">
            Añadir Categoria
        </button>
    </div>
</div>

@endsection