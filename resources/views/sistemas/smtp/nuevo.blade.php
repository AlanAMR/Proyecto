@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/smtp')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-smtp" method="post" action="{{url('sistemas/conexiones/smtp/crear')}}">
    
    @csrf


    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor" class="form-label">Servidor</label>
                
                <select name="servidor" class="form-control" required="">
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
                <label for="dominio" class="form-label">Dominio</label>
                <input type="text" name="dominio" class="form-control" placeholder="Dominio... " value="{{old('dominio')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="protocolo" class="form-label">Protocolo de acceso</label>
                <select name="protocolo" class="form-control" required="">
                    <option value="Imap">Imap</option>
                    <option value="Pop">Pop</option>
                    <option value="Exchange">Exchange</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor_entrante" class="form-label">Servidor entrante</label>
                <input type="text" name="servidor_entrante" class="form-control" placeholder="Servidor Entrante... " value="{{old('servidor_entrante')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="puerto_entrada" class="form-label">Puerto de entrada</label>
                <input type="number" name="puerto_entrada" class="form-control" value="{{old('puerto_entrada') ? old('puerto_entrada') : '993'}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="cifrado_entrada" class="form-label">Cifrado de entrada</label>
                <select name="cifrado_entrada" class="form-control" required="">
                    <option value="SSL">SSL</option>
                    <option value="TLS">TLS</option>
                    <option value="Automatico">Automatico</option>
                    <option value="Ninguno">Niguno</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor_saliente" class="form-label">Servidor saliente</label>
                <input type="text" name="servidor_saliente" class="form-control" placeholder="Servidor Saliente... " value="{{old('servidor_saliente')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="puerto_salida" class="form-label">Puerto de salida</label>
                <input type="number" name="puerto_salida" class="form-control" value="{{old('puerto_salida') ? old('puerto_salida') : '465'}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="cifrado_salida" class="form-label">Cifrado de Salida</label>
                <select name="cifrado_salida" class="form-control" required="">
                    <option value="SSL">SSL</option>
                    <option value="TLS">TLS</option>
                    <option value="Automatico">Automatico</option>
                    <option value="Ninguno">Niguno</option>
                </select>
            </div>
        </div>


    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/conexiones/smtp')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-smtp').submit();">
            Añadir conexion SMTP
        </button>
    </div>
</div>

@endsection