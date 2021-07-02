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

<form id="actualizar-categoria" method="post" action="{{url('almacen-general/categorias/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$categoria->id}}">
    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la categoria</label>
                <input type="text" name="nombre" class="form-control" placeholder="Categoria..." value="{{$categoria->valor}}" required="">
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
        <button class="btn btn-info" onclick="document.getElementById('actualizar-categoria').submit();">
            Actualizar Categoria
        </button>
    </div>
</div>

@endsection