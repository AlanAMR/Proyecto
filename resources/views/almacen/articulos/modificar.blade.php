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
	
    <form id="modificar-articulo" method="post" action="{{url('/almacen-general/articulos/actualizar')}}" enctype='multipart/form-data'>
    
    @csrf
    <input type="hidden" name="id" value="{{$articulo->id}}">

    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de el Articulo</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$articulo->nombre}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="categoria" class="form-label">Categoria</label>
                <select id="categoria" name="categoria" required="" class="form-control" onchange="getsubcategorias();">
                        <option value="{{$articulo->categoria_id}}">{{$articulo->categoria}}</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->valor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="subcategoria" class="form-label">Subcategoria</label>
                <select id="subcategoria" name="subcategoria" required="" class="form-control" >
                        <option value="{{$articulo->subcategoria_id}}">{{$articulo->subcategoria}}</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="imagen-principal" class="form-label">Imagen Principal</label>
                <br>
                @if($articulo->imagen != '')
                    <img src="{{asset('articulos/'.$articulo->id.'/'.$articulo->imagen)}}" alt="Image not found" 
                    onerror="this.onerror=null;this.src='{{asset('img/error-img.png')}}';" style="max-width: 250px">
                @else 
                    <img src="{{asset('img/error-img.png')}}" style="max-width: 250px">
                @endif
                <input type="file" id="imagen-principal" name="imagen-principal" class="form-control" accept="image/*"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">

                <table>
                    <thead>
                        <tr>
                            <td>Eliminar </td>
                            <td>Imagen</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($imagenes as $imagen)
                            <tr>
                                <td>
                                    <center>
                                        
                                    <input type="hidden" name="old_img_ids[{{$imagen->id}}]" value="{{$imagen->id}}">
                                    <input type="checkbox" class="form-check-input" name="old_img_ids[{{$imagen->id}}]['Eliminar']">
                                    </center>
                                </td>
                                <td>
                                    <img src="{{asset('articulos/'.$articulo->id.'/'.$imagen->archivo)}}" alt="Image not found" 
                    onerror="this.onerror=null;this.src='{{asset('img/error-img.png')}}';" style="max-width: 250px">    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        <button class="btn btn-info" onclick="document.getElementById('modificar-articulo').submit();">
            Actualizar Articulo
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
