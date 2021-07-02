@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/conexiones/vpn')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="actualizar-vpn" method="post" action="{{url('sistemas/conexiones/vpn/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$conexion->id}}">

    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor_id" class="form-label">Servidor</label>
                
                <select name="servidor_id" class="form-control" required="">
                      
                    @if($servidor != null)
                        <option value="{{$servidor->id}}">{{$servidor->identificador}}</option>
                    @else
                      <option value="-1">Sin servidor</option>
                    @endif

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
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$conexion->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="servidor" class="form-label">Servidor - Direccion</label>
                <input type="text" name="servidor" class="form-control" placeholder="Direccion... " value="{{$conexion->servidor}}" required="">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="puerto" class="form-label">Puerto</label>
                <input type="number" name="puerto" class="form-control" value="{{$conexion->puerto}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="cifrado" class="form-label">Cifrado</label>
                <select name="cifrado" class="form-control" required="">
                    <option value="{{$conexion->cifrado}}">{{$conexion->cifrado}}</option>
                    <option value="PPTP">PPTP</option>
                    <option value="L2TP/IPsec con certificado">L2TP/IPsec con certificado</option>
                    <option value="L2TP/IPsec con clave precompartida">L2TP/IPsec con clave precompartida</option>
                    <option value="SSTP">SSTP</option>
                    <option value="IKEv2">IKEv2</option>
                    <option value="Automatico">Automatico</option>
                </select>
            </div>
        </div>


    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/conexiones/vpn')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-vpn').submit();">
            Actualizar conexion SMTP
        </button>
    </div>
</div>

@endsection