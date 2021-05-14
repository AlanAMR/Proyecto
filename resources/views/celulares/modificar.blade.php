@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/celulares')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-celular" method="post" action="{{url('almacen/celulares/actualizar')}}">
    
    @csrf
    <input type="hidden" name="id" value="{{$celular->id}}">

    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie" value="{{$celular->num_serie}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input name="marca" class="form-control" list="options_marcas" id="datalist-marcas" placeholder="Marca..." required="" value="{{$celular->marca}}">
                <datalist id="options_marcas">
                  @foreach($sugerencias_celulares_marcas as $marca)
                    <option data-value="{{$marca->valor}}" value="{{$marca->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input name="modelo" class="form-control" list="options_modelos" id="datalist-modelos" placeholder="Modelo..." required="" value="{{$celular->modelo}}">
                <datalist id="options_modelos">
                  @foreach($sugerencias_celulares_modelos as $modelo)
                    <option value="{{$modelo->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="imei" class="form-label">Imei</label>
                <input type="text" name="imei" class="form-control" placeholder="Imei..." value="{{$celular->imei}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="compania" class="form-label">Compañia</label>
                <input name="compania" class="form-control" list="options_companias" id="datalist-companias" placeholder="Compañia..." required="" value="{{$celular->companiamovil}}">
                <datalist id="options_companias">
                  @foreach($sugerencias_celulares_companias as $compania)
                    <option value="{{$compania->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="color" class="form-label">Color</label>
                
                <select name="color" class="form-control" required="">
                      <option value="{{$celular->color}}">{{$celular->color}}</option>
                      @foreach($colores as $color)
                        <option value="{{$color->valor}}">{{$color->valor}}</option>
                      @endforeach
                </select>
            </div>
        </div>

        

    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen/celulares')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-celular').submit();">
            Actualizar Datos
        </button>
    </div>
</div>

@endsection