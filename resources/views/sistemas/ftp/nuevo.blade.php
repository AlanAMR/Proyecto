@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/ftp')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-ftp" method="post" action="{{url('sistemas/conexiones/ftp/crear')}}">
    
    @csrf


    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor_id" class="form-label">Servidor</label>
                
                <select name="servidor_id" class="form-control" required="">
                      <option value="-1">Sin Servidor</option>
                      @foreach($servidores as $servidor)
                        <option value="{{$servidor->id}}">{{$servidor->identificador}}</option>
                      @endforeach
                </select>
            </div>
        </div>
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{old('identificador')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor" class="form-label">Servidor - Direccion</label>
                <input type="text" name="servidor" class="form-control" placeholder="Direccion... " value="{{old('servidor')}}" required="">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="puerto" class="form-label">Puerto</label>
                <input type="number" name="puerto" class="form-control" value="21" required="">
            </div>
        </div>

    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/conexiones/ftp')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-ftp').submit();">
            Añadir conexion FTP
        </button>
    </div>
</div>

@endsection