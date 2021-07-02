@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/bitlocker')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-bitlocker" method="post" action="{{url('sistemas/accesos/bitlocker/crear')}}">
    
    @csrf


    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="equipo" class="form-label">Equipo de computo</label>
                
                <select name="equipo" class="form-control" required="">
                      <option value="-1|-1">Sin Equipo</option>
                    
                      @foreach($servidores as $servidor)
                        <option value="1|{{$servidor->id}}">Servidor | {{$servidor->identificador}} {{$servidor->num_serie}}</option>
                      @endforeach

                      @foreach($computadoras as $computadora)
                        <option value="2|{{$computadora->id}}">Computadora | {{$computadora->num_serie}}</option>
                      @endforeach

                      @foreach($laptops as $laptop)
                        <option value="3|{{$laptop->id}}">Laptop | {{$laptop->num_serie}}</option>
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
                <label for="clave" class="form-label">Clave</label>
                <input type="text" name="clave" class="form-control" placeholder="Clave.." value="{{old('clave')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="clave_recuperacion" class="form-label">Clave de recuperacion</label>
                <input type="text" name="clave_recuperacion" class="form-control" placeholder="Clave..." value="{{old('clave_recuperacion')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="clave_confirmacion" class="form-label">Clave de recuperacion (confirmacion)</label>
                <input type="text" name="clave_confirmacion" class="form-control" placeholder="Clave..." value="{{old('clave_confirmacion')}}" required="">
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
        <button class="btn btn-info" onclick="document.getElementById('create-bitlocker').submit();">
            Añadir Clave de Bitlocker
        </button>
    </div>
</div>

@endsection