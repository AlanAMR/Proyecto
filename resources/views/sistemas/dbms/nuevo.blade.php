@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/dbms')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-dbms" method="post" action="{{url('sistemas/conexiones/dbms/crear')}}">
    
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
                <label for="gestor" class="form-label">Gestor DBMS</label>
                <input type="text" name="gestor" class="form-control" placeholder="Gestor... " value="{{old('gestor')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor" class="form-label">Servidor (ip)</label>
                <input type="text" name="servidor" class="form-control" placeholder="Servidor... " value="{{old('servidor')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="puerto" class="form-label">Puerto</label>
                <input type="number" name="puerto" class="form-control" value="{{old('puerto_salida') ? old('puerto') : '0'}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="dataset" class="form-label">Dataset / Base de datos</label>
                <input type="text" name="dataset" class="form-control" placeholder="Dataset... " value="{{old('dataset')}}" required="">
            </div>
        </div>

    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/conexiones/dbms')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-dbms').submit();">
            Añadir conexion DBMS
        </button>
    </div>
</div>

@endsection