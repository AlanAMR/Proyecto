@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/bitlocker')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

<a href="{{url('sistemas/accesos/bitlocker/exportar_plantilla')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Descargar plantilla de Excel
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="archivo" method="post">
    
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
        
        <a href="{{url('sistemas/accesos/bitlocker')}}">
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
        $(document).ready(function() {
            $("#but_upload").click(function() {
                var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file', files);
                
                $.ajax({
                    url: '{{url('api/accesos/procesar/bitlocker')}}',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        alert(response.message);
                        window.location.href = '{{url('sistemas/accesos/bitlocker')}}';
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
