@extends('admin.template')

@section('title_right')

<a href="{{url('rh/bajas/nuevo')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Realizar Baja <i class="fa fa-plus-circle"></i>
    </button>
</a>

<a href="{{url('rh/bajas/cargar_csv')}}">
    <button type="button" class="btn btn-outline-primary btn-sm">
      Cargar Historico <i class="fa fa-plus-circle"></i>
    </button>
</a>

@endsection

@section('main_div')


	<div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="3000px" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de solicitud</th>
                    <th>Fecha de baja</th>
                    <th>Lote IMSS</th>
                    <th>Periodo</th>
                    <th>Parametro</th>
                    <th>Clave Empleado</th>
                    <th>Nombre</th>
                    <th>Numero de Seguro Social</th>
                    <th>Registro Patronal</th>
                    <th>Clase</th>
                    <th>Motivo de baja</th>
                    <th>Empresa</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($empleados as $baja)
                    <tr>
                        <th>{{$baja->id}}</th>
                        <th>{{$baja->fecha_solicitud}}</th>
                        <th>{{$baja->fecha_baja}}</th>
                        <th>{{$baja->lote_imss}}</th>
                        <th>{{$baja->periodo}}</th>
                        <th>{{$baja->parametro}}</th>
                        <th>{{$baja->clave_empleado}}</th>
                        <th>{{$baja->nombre}} {{$baja->paterno}} {{$baja->materno}}</th>
                        <th>{{$baja->nss}}</th>
                        <th>{{$baja->registro_patronal}}</th>
                        <th>{{$baja->clase}}</th>
                        <th>{{$baja->motivo_baja}}</th>
                        <th>{{$baja->empresa}}</th>
                        <th>{{$baja->observaciones}}</th>
                    </tr>
            	@endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Fecha de solicitud</th>
                    <th>Fecha de baja</th>
                    <th>Lote IMSS</th>
                    <th>Periodo</th>
                    <th>Parametro</th>
                    <th>Clave Empleado</th>
                    <th>Nombre</th>
                    <th>Numero de Seguro Social</th>
                    <th>Registro Patronal</th>
                    <th>Clase</th>
                    <th>Motivo de baja</th>
                    <th>Empresa</th>
                    <th>Observaciones</th>
                </tr>
            </tfoot>
        </table>
    </div>


<script type="text/javascript">
    
    function hide(num){
        $('td:nth-child('+num+'),th:nth-child('+num+')').hide();
    }

    function show(num){
        $('td:nth-child('+num+'),th:nth-child('+num+')').show();
    }


</script>
@endsection