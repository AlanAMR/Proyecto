@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('sistemas/accesos/carpetas')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')

<form id="create-carpeta" method="post" action="{{url('sistemas/accesos/carpetas/actualizar')}}">
    
    @csrf

    <input type="hidden" name="id" value="{{$carpeta->id}}">


    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="conexion_id" class="form-label">Conexion</label>
                
                <select name="conexion_id" class="form-control" required="">

                    @if($conexion != null)
                        <option value="{{$conexion->id}}">Actual | {{$conexion->identificador}}</option>
                    @else
                      <option value="-1">Sin conexion</option>
                    @endif
                      <option value="-1">Sin conexion</option>
                      @foreach($conexiones as $con)
                        <option value="{{$con->id}}">{{$con->servidor}} | {{$con->identificador}}</option>
                      @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="identificador" class="form-label">Identificador</label>
                <input type="text" name="identificador" class="form-control" placeholder="Identificador... " value="{{$carpeta->identificador}}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ruta" class="form-label">Ruta</label>
                <input type="text" name="ruta" class="form-control" placeholder="Ruta... " value="{{$carpeta->ruta}}" required="">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Empleados / Usuarios</h5></label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="empleado" class="form-label">Empleado</label>
                <select id="empleado" name="empleado" required="" class="form-control">
                        <option value="-1|Sin Empleado Asociado">Sin Empleado Asociado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{$empleado->id}}|{{$empleado->nombre}}">{{$empleado->id}} | {{$empleado->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <select id="usuario" name="usuario" required="" class="form-control">
                        <option value="-1|Sin Usuario Asociado">Sin Usuario Asociado</option>
                    @foreach($usuarioras as $usuario)
                        <option value="{{$usuario->id}}|{{$usuario->usuario}}">{{$usuario->id}}|{{$usuario->usuario}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="permiso" class="form-label">Permisos</label>
                <select id="permiso" name="permiso" required="" class="form-control">
                    <option value="r">Solo Lectura</option>
                    <option value="w">Solo Escritura</option>
                    <option value="x">Solo Ejecucion</option>
                    <option value="rw">Lectura y Escritura</option>
                    <option value="rx">Lectura y Ejecucion</option>
                    <option value="wx">Escritura y Ejecucion</option>
                    <option value="rwx">Lectura, Escritura y Ejecucion</option>
                    <option value="ct">Control total</option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="btn-add" class="form-label"></label>
                <input id="btn-add" name="btn-add" class="form-control btn btn-info" type="button" value="Agregar" onclick="addrow()" />
            </div>
        </div>

        <div class="col-md-12">
            <table class="table" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Empleado</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Permisos</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>

                @foreach($carpetasusuarios as $usuario)
                <tr>   
                    @if($usuario->empleado_id != null)
                        <td>{{$usuario->empleado_id}}|{{$usuario->empleado}}</td>
                        <input type="hidden" name="empleados[]" value="{{$usuario->empleado_id}}|{{$usuario->empleado}}">
                    @else    
                        <td>-1|Sin Empleado Asociado</td>
                        <input type="hidden" name="empleados[]" value="-1|Sin Empleado">
                    @endif

                    @if($usuario->usuarioras_id != null)
                        <td>{{$usuario->usuarioras_id}}|{{$usuario->usuario}}</td>
                        <input type="hidden" name="usuarios[]" value="{{$usuario->usuarioras_id}}|{{$usuario->usuario}}">
                    @else
                        <td>-1|Sin Usuario Asociado</td>
                        <input type="hidden" name="usuarios[]" value="-1|Sin Usuario">
                    @endif
                    <td>{{$usuario->permisos}}</td>
                    <input type="hidden" name="permisos[]" value="{{$usuario->permisos}}">
                    <td><input type="button" class="btn btn-danger" value="Quitar" onclick="quitar($(this));"></td>
                </tr>
                @endforeach

              </tbody>
            </table>
        </div>
    </div>

    <hr>
</form>

<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('sistemas/accesos/carpetas')}}">
            <button class="btn btn-danger ">
                Cancelar
            </button>
        </a>
        <button class="btn btn-info" onclick="document.getElementById('create-carpeta').submit();">
            Modificar carpeta
        </button>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });

    function addrow(){
        $("#myTable").find('tbody')
            .append($('<tr><td>' 
                +$('#empleado').val() + '<input type="hidden" name="empleados[]" value="'+ $('#empleado').val() +'"/> </td><td>'
                + $('#usuario').val() + '<input type="hidden" name="usuarios[]" value="'+ $('#usuario').val() +'"/> </td><td>'
                + $('#permiso').val() + '<input type="hidden" name="permisos[]" value="'+ $('#permiso').val() +'"/> </td>'
                +'<td> <input type="button" class="btn btn-danger" value="Quitar" onclick="quitar($(this));"> </td>'
                +'</tr>')
        );
    }

    function quitar(row)
    {
        row.closest('tr').remove();
    }


</script>


@endsection