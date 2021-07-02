@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen-general/articulos')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

<a href="{{url('almacen-general/articulos/exportar_plantilla')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Descargar plantilla .CSV
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="nuevo-almacen" method="post" action="{{url('/almacen-general/articulos/crear')}}">
    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="archivo" class="form-label">Archivo CSV / Excel</label>
                <input type="file" id="file" name="file" class="form-control" />
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
        <button class="btn btn-info" id="but_upload">
            Procesar Archivo
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

<script type="text/javascript">
        $(document).ready(function() {
            $("#but_upload").click(function() {
                var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file', files);
                
                $.ajax({
                    url: '{{url('api/articulos/cargar_csv')}}',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response.message);
                        procesar();
                    },
                    error: function (request, status, error) {
                        jsonValue = jQuery.parseJSON( request.responseText );
                        alert(jsonValue.error);
                    }
                });
            });
        });

        function procesar(){
            var fd = new FormData();
                $.ajax({
                    url: '{{url('api/articulos/procesar_csv')}}',
                    type: 'get',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        alert(response.message);
                        window.location.href = '{{url('almacen-general/articulos')}}';
                    },
                    error: function (request, status, error) {
                        jsonValue = jQuery.parseJSON( request.responseText );
                        alert(jsonValue.error);
                    }
                });
        }
    </script>
@endsection
