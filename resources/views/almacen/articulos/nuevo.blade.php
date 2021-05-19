@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('administracion/articulos')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="nuevo-almacen" method="post" action="{{url('/administracion/articulos/crear')}}">
    
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

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('administracion/almacenes')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('nuevo-almacen').submit();">
            Añadir Almacen
        </button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
