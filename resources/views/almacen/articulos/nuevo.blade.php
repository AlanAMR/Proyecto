@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen-general/articulos')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="nuevo-articulo" method="post" action="{{url('/almacen-general/articulos/crear')}}" enctype='multipart/form-data'>
    
    @csrf

    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de el Articulo</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="categoria" class="form-label">Categoria</label>
                <select id="categoria" name="categoria" required="" class="form-control" onchange="getsubcategorias();">
                        <option value=""></option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->valor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="subcategoria" class="form-label">Subcategoria</label>
                <select id="subcategoria" name="subcategoria" required="" class="form-control" disabled="">
                        <option value=""></option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="imagen-principal" class="form-label">Imagen Principal</label>
                <input type="file" id="imagen-principal" name="imagen-principal" class="form-control" accept="image/*"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="imagen-secundaria" class="form-label">Imagenes Secundarias</label>
                <input type="file" id="imagen-secundaria[]" name="imagen-secundaria[]" class="form-control" multiple="" accept="image/*"/>
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen-general/articulos')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nuevo-articulo').submit();">
            Añadir Articulo
        </button>
    </div>
</div>

<script type="text/javascript">

    function getsubcategorias(){
        $.ajax({  
             type: "GET",  
             url: "{{asset('api/getsubcategorias')}}"+"/"+$('#categoria').val(),    
             dataType: "json", 
             success: function (data) {

                $('#subcategoria').attr('disabled', 'disabled');
                $("#subcategoria").empty();
                
                for(var i in data["subcategorias"]){
                    $("#subcategoria").append(new Option(data["subcategorias"][i].valor,data["subcategorias"][i].id));
                    $('#subcategoria').removeAttr('disabled');
                }
            },
            error: function (request, status, error) {
                jsonValue = jQuery.parseJSON( request.responseText );
                alert(jsonValue.error);
                $('#subcategoria').attr('disabled', 'disabled');
                $("#subcategoria").empty();
            }
        }); 
    }
</script>
@endsection
