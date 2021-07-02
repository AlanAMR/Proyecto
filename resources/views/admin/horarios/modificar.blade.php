@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('rh/horarios')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="actualizar-horario" method="post" action="{{url('/rh/horarios/actualizar')}}">
    
    <input type="hidden" name="id" value="{{$horario->id}}">    
    @csrf
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador..." value="{{$horario->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="hora_inicio" class="form-label">Hora de entrada</label>
                <input type="time" name="hora_inicio" class="form-control"  value="{{$horario->hora_inicio}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="hora_fin" class="form-label">Hora de salida</label>
                <input type="time" name="hora_fin" class="form-control"  value="{{$horario->hora_fin}}" required="">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Dias:</label><br> 
                
                    @if(str_contains($horario->dias,'D'))
                        <input type="checkbox" id="domingo" name="domingo" value="domingo" checked="">
                        <label for="domingo"> Domingo</label><br>
                    @else
                        <input type="checkbox" id="domingo" name="domingo" value="domingo">
                        <label for="domingo"> Domingo</label><br>
                    @endif

                    @if(str_contains($horario->dias,'L'))
                        <input type="checkbox" id="lunes" name="lunes" value="lunes" checked="">
                        <label for="lunes"> Lunes</label><br>
                    @else
                        <input type="checkbox" id="lunes" name="lunes" value="lunes">
                        <label for="lunes"> Lunes</label><br>
                    @endif

                    @if(str_contains($horario->dias,'M'))
                        <input type="checkbox" id="martes" name="martes" value="martes" checked="">
                        <label for="martes"> Martes</label><br>
                    @else
                        <input type="checkbox" id="martes" name="martes" value="martes">
                        <label for="martes"> Martes</label><br>
                    @endif

                    @if(str_contains($horario->dias,'I'))
                    <input type="checkbox" id="miercoles" name="miercoles" value="miercoles" checked="">
                        <label for="miercoles"> Miercoles</label><br>
                    @else
                        <input type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                        <label for="miercoles"> Miercoles</label><br>
                    @endif

                    @if(str_contains($horario->dias,'J'))
                    <input type="checkbox" id="jueves" name="jueves" value="jueves" checked="">
                        <label for="jueves"> Jueves</label><br>
                    @else
                        <input type="checkbox" id="jueves" name="jueves" value="jueves">
                        <label for="jueves"> Jueves</label><br>
                    @endif

                    @if(str_contains($horario->dias,'V'))
                    <input type="checkbox" id="viernes" name="viernes" value="viernes" checked="">
                        <label for="viernes"> Viernes</label><br>
                    @else
                        <input type="checkbox" id="viernes" name="viernes" value="viernes">
                        <label for="viernes"> Viernes</label><br>
                    @endif

                    @if(str_contains($horario->dias,'S'))
                    <input type="checkbox" id="sabado" name="sabado" value="sabado" checked="">
                        <label for="sabado"> Sabado</label><br> 
                    @else
                        <input type="checkbox" id="sabado" name="sabado" value="sabado">
                        <label for="sabado"> Sabado</label><br>
                    @endif
            </div>
        </div>

        
    </div>

    <hr>

</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('rh/horarios')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('actualizar-horario').submit();">
            Actualizar Horario
        </button>
    </div>
</div>

@endsection