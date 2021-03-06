@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/sistemaop')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="modificar-usuario" method="post" action="{{url('sistemas/accesos/sistemaop/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$password->id}}">
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="equipo" class="form-label">Equipo de computo</label>
                
                <select name="equipo" class="form-control" required="">

                    @if($equipo != null)
                        <option value="{{$password->tipo}}|{{$password->equipo_id}}">{{$equipo->num_serie}}</option>
                    @else
                      <option value="-1|-1">Sin Equipo</option>
                    @endif

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
                <label for="sistema" class="form-label">Sistema operativo</label>
                <select name="sistema" class="form-control" required="">
                      <option value="Windows">Windows</option>
                      <option value="Windows Server">Windows Server</option>
                      <option value="Linux Server">Linux Server</option>
                      <option value="Linux">Linux</option>
                      <option value="MAC">MAC</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$password->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario.." value="{{$password->usuario}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia" class="form-label">Contrase??a</label>
                <input type="password" name="contrasenia" class="form-control" placeholder="Contrase??a..." value="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="contrasenia_confirmacion" class="form-label">Confirmacion de Contrase??a</label>
                <input type="password" name="contrasenia_confirmacion" class="form-control" placeholder="Contrase??a..." value="">
            </div>
        </div>




    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/sistemaop')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('modificar-usuario').submit();">
            Modificar usuario
        </button>
    </div>
</div>

@endsection