@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/carpetas')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

<a href="{{url('sistemas/accesos/carpetas/exportar_plantilla')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Descargar plantilla (Carpetas) de Excel
    </button>
</a>

<a href="{{url('sistemas/accesos/carpetas/exportar_plantilla_usuarios')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Descargar plantilla (Usuarios) de Excel
    </button>
</a>

@endsection

@section('main_div')
    
    <div class="row">
        
        <div class="col-md-6">
            <h4>Subir Carpetas</h4>
            <div class="form-group">
                <label for="archivo" class="form-label">Archivo CSV / Excel</label>
                <input type="file" id="file" name="file"  />
                <button class="btn btn-info" id="but_upload" >
                    Procesar Archivo
                </button>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Subir Usuarios</h4>
            <div class="form-group">
                <label for="archivo" class="form-label">Archivo CSV / Excel</label>
                <input type="file" id="file2" name="file2"  />
                <button class="btn btn-info" id="but_upload2">
                    Procesar Archivo
                </button>
            </div>
        </div>

    </div>

    <hr>

<div class="row">
</div>

<script type="text/javascript">
        $(document).ready(function() {
            $("#but_upload").click(function() {
                var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file', files);
                
                $.ajax({
                    url: '{{url('api/accesos/procesar/carpetas')}}',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        alert(response.message);
                    },
                    error: function (request, status, error) {
                        jsonValue = jQuery.parseJSON( request.responseText );
                        alert(jsonValue.error);
                    }
                });
            });

            $("#but_upload2").click(function() {
                var fd = new FormData();
                var files = $('#file2')[0].files[0];
                fd.append('file', files);
                
                $.ajax({
                    url: '{{url('api/accesos/procesar/carpetasusuarios')}}',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        alert(response.message);
                    },
                    error: function (request, status, error) {
                        jsonValue = jQuery.parseJSON( request.responseText );
                        alert(jsonValue.error);
                    }
                });
            });
        });

    </script>
@endsection
