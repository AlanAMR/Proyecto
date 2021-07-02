@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/computadoras')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-computadora" method="post" action="{{url('almacen/computadoras/crear')}}">
    
    @csrf


    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie" value="{{old('num_serie')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input name="marca" class="form-control" list="options_marcas" id="datalist-marcas" placeholder="Marca..." required="">
                <datalist id="options_marcas">
                  @foreach($sugerencias_laptops_marcas as $marca)
                    <option data-value="{{$marca->valor}}" value="{{$marca->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input name="modelo" class="form-control" list="options_modelos" id="datalist-modelos" placeholder="Modelo..." required="">
                <datalist id="options_modelos">
                  @foreach($sugerencias_laptops_modelos as $modelo)
                    <option value="{{$modelo->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador" class="form-label">Procesador</label>
                <input name="procesador" class="form-control" list="options_procesadores" id="datalist-procesadores" placeholder="Procesador..." required="">
                <datalist id="options_procesadores">
                  @foreach($sugerencias_laptops_procesadores as $procesador)
                    <option value="{{$procesador->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="so" class="form-label">Sistema Operativo</label>
                <input name="so" class="form-control" list="options_so" id="datalist-so" placeholder="Sistema Operativo..." required="">
                <datalist id="options_so">
                  @foreach($sugerencias_laptops_so as $so)
                    <option value="{{$so->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="antivirus" class="form-label">Antivirus</label>
                <input name="antivirus" class="form-control" list="options_antivirus" id="datalist-antivirus" placeholder="Antivirus..." required="">
                <datalist id="options_antivirus">
                  @foreach($sugerencias_laptops_antivirus as $antivirus)
                    <option value="{{$antivirus->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario..." value="{{old('usuario')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" name="password" class="form-control" placeholder="Contraseña..." value="{{old('password')}}" required="">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="anydesk" class="form-label">Any Desk</label>
                <input type="text" name="anydesk" class="form-control" placeholder="Any Desk..." value="{{old('anydesk')}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="anydeskpassword" class="form-label">Contraseña (Any Desk)</label>
                <input type="text" name="anydeskpassword" class="form-control" placeholder="Any Desk (Contraseña)..." value="{{old('anydeskpassword')}}">
            </div>
        </div>

    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen/computadoras')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-computadora').submit();">
            Añadir computadora
        </button>
    </div>
</div>

@endsection