@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/chips')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-chip" method="post" action="{{url('almacen/chips/crear')}}">
    
    @csrf


    <div class="row">
        
       

        <div class="col-md-4">
            <div class="form-group">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" name="numero" class="form-control" placeholder="Numero de serie" value="{{old('numero')}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sim" class="form-label">SIM</label>
                <input name="sim" class="form-control"  placeholder="Sim..." required="" value="{{old('sim')}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">a
                <label for="operador" class="form-label">Operador</label>
                <input name="operador" class="form-control" list="options_operadores" id="datalist-operadores" placeholder="Operador..." required="" value="{{old('operador')}}">
                <datalist id="options_operadores">
                  @foreach($sugerencias_chips_operadores as $operador)
                    <option value="{{$operador->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="plan" class="form-label">Plan</label>
                <input name="plan" class="form-control" list="options_planes" id="datalist-planes" placeholder="Plan..." required="" value="{{old('plan')}}">
                <datalist id="options_operadores">
                  @foreach($sugerencias_chips_planes as $plan)
                    <option value="{{$plan->valor}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        

    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen/chips')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-chip').submit();">
            Añadir Chip
        </button>
    </div>
</div>

@endsection