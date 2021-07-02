@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen-general/subcategorias')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="actualizar-subcategoria" method="post" action="{{url('almacen-general/subcategorias/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$subcategoria->id}}">
    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la subcategoria</label>
                <input type="text" name="nombre" class="form-control" placeholder="Subcategoria..." value="{{$subcategoria->valor}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="categoria" class="form-label">Categoria a la que pertenece</label>
                <select id="categoria" name="categoria" required="" class="form-control" onchange="getsubcategorias();">
                        <option value="{{$categoria->id}}">{{$categoria->valor}}</option>
                    @foreach($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->valor}}</option>
                    @endforeach
                </select>
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
        <button class="btn btn-info" onclick="document.getElementById('actualizar-subcategoria').submit();">
            Actualizar Subcategoria
        </button>
    </div>
</div>

@endsection