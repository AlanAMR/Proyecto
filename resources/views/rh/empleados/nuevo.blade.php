@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('rh/empleados')}}">
    <button type="button" class="btn btn-outline-info btn-sm">
      Regresar
    </button>
</a>

@endsection

@section('main_div')
	
    <form id="nuevo-empleado" method="post" action="{{url('/rh/empleados/crear')}}" enctype='multipart/form-data'>
    
    @csrf
    <hr>
    <div class="row">
        
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Informacion para el sistema.</h5></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="clave" class="form-label">Clave interna</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Clave interna: Clave mediante la cual se identifica al empleado, debe ser unica, si no se llena el campo, la genera el sistema."></i>
                <input type="text" name="clave" class="form-control" placeholder="Clave..." value="{{ old('clave') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{ old('nombre') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos..." value="{{ old('apellidos') }}" required="">
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono..." value="{{ old('telefono') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" class="form-control" placeholder="Celular..." value="{{ old('celular') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="nickname" class="form-label">Nombre de usuario</label><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Nombre mediante el cual el empleado podra acceder al sistema."></i>
                <input type="text" name="nickname" class="form-control" placeholder="Usuario..." value="{{ old('nickname') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="correo" class="form-label">Correo Electronico</label><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Correo electronico mediante el cual el empleado podra acceder al sistema."></i>
                <input type="text" name="correo" class="form-control" placeholder="Correo..." value="{{ old('correo') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Contraseña mediante el cual el empleado podra acceder al sistema, el usuario podra modificarla."></i>
                <input type="text" name="password" class="form-control" placeholder="Contraseña..." value="" required="">
            </div>
        </div>


    </div>
    
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Seguro.</h5></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="rfc" class="form-label">RFC</label>
                <input type="text" name="rfc" class="form-control" placeholder="RFC..." value="{{ old('rfc') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="nss" class="form-label">Numero de Seguro Social (NSS)</label>
                <input type="text" name="nss" class="form-control" placeholder="NSS..." value="{{ old('nss') }}" required="">
            </div>
        </div>


    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Puesto del empleado.</h5></label>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="puesto" class="form-label">Puesto</label>
                <select id="puesto" name="puesto" required="" class="form-control">
                        <option value=""></option>
                    @foreach($puestos as $puesto)
                        <option value="{{$puesto->id}}">{{$puesto->valor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="rol" class="form-label">Rol</label>  <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Corresponde al rol que tendra el usuario en el sistema, de el depende las acciones que tenga permitido hacer dentro del sistema."></i>
                <select id="rol" name="rol" required="" class="form-control">
                        <option value=""></option>
                    @foreach($roles as $rol)
                        <option value="{{$rol->id}}">{{$rol->valor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input name="fecha_inicio" class="form-control" type="date" required="" value="{{ old('fecha_inicio') }}" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="horario" class="form-label">Horario</label>
                <select id="horario" name="horario" required="" class="form-control">
                        <option value=""></option>
                    @foreach($horarios as $horario)
                        <option value="{{$horario->id}}">{{$horario->identificador}}, {{$horario->dias}}, {{$horario->hora_inicio}} - {{$horario->hora_fin}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sueldo" class="form-label">Sueldo (En pesos Mexicanos)</label>
                <input name="sueldo" class="form-control" type="number" min="0" max="9999999" step="0.01" value="{{ old('sueldo') }}" />
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h5>Cuenta Bancaria</h5>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="banco" class="form-label">Banco</label>
                <input type="text" name="banco" class="form-control" placeholder="Banco..." value="{{ old('banco') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="titular" class="form-label">Titular</label>
                <input type="text" name="titular" class="form-control" placeholder="Titular..." value="{{ old('titular') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="clabe" class="form-label">Clabe</label>
                <input type="text" name="clabe" class="form-control" placeholder="Clabe..." value="{{ old('clabe') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="banco_comprobante" class="form-label">Comprobante (Archivo)</label>
                <input name="banco_comprobante" class="form-control" type="file" accept="image/*,.pdf"/>
            </div>
        </div>


    </div>

    <div class="row">
        
        <div class="col-md-12">
            <div class="form-group">
                <h5>INE</h5>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="clave_elector" class="form-label">Clave de elector</label>
                <input type="text" name="clave_elector" class="form-control" placeholder="Clave de elector..." value="{{ old('clave_elector') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="anio_nacimiento" class="form-label">Año de nacimiento</label>
                <input name="anio_nacimiento" class="form-control" type="date" required="" value="{{ old('anio_nacimiento') }}" />
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="anio_registro" class="form-label">Año de registro</label>
                <input name="anio_registro" class="form-control" type="number" min="1900" max="2100" step="1" value="{{ old('anio_registro') }}" required="" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="curp" class="form-label">Curp</label>
                <input type="text" name="curp" class="form-control" placeholder="Curp..." value="{{ old('curp') }}" required="">
            </div>
        </div>   

        <div class="col-md-4">
            <div class="form-group">
                <label for="ine_seccion" class="form-label">Seccion</label>
                <input name="ine_seccion" class="form-control" type="number" min="00" max="99" step="1" value="{{ old('ine_seccion') }}" required="" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ine_vigencia" class="form-label">Vigencia</label>
                <input name="ine_vigencia" class="form-control" type="number" min="1900" max="2100" step="1" value="{{ old('ine_vigencia') }}" required="" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ine_comprobante" class="form-label">Comprobante (Archivo)</label>
                <input name="ine_comprobante" class="form-control" type="file" accept="image/*,.pdf"/>
            </div>
        </div>


    </div>
    
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Direccion</h5></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="pais" class="form-label">Pais</label>
                <input type="text" name="pais" class="form-control" placeholder="Pais..." value="{{ old('pais') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" placeholder="Estado..." value="{{ old('estado') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad..." value="{{ old('ciudad') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="zona" class="form-label">Zona / Colonia</label>
                <input type="text" name="zona" class="form-control" placeholder="Zona / Colonia..." value="{{ old('zona') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="codigo_postal" class="form-label">Codigo postal</label>
                <input name="codigo_postal" class="form-control" type="number" min="0000000" max="9999999" step="1" value="{{ old('codigo_postal') }}" required="" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" name="calle" class="form-control" placeholder="Calle..." value="{{ old('calle') }}" required="">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_ext" class="form-label">Numero exterior</label>
                <input name="num_ext" class="form-control" type="number" min="0000000" max="9999999" step="1" value="{{ old('num_ext') }}" required="" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_int" class="form-label">Numero interior</label>
                <input name="num_int" class="form-control" type="text" value="{{ old('num_int') }}" />
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="direccion_comprobante" class="form-label">Comprobante (Archivo)</label>
                <input name="direccion_comprobante" class="form-control" type="file" accept="image/*,.pdf"/>
            </div>
        </div>


    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Contactos de emergencia</h5></label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_nombre" class="form-label">Nombre (1)</label>
                <input name="eme_nombre" class="form-control" type="text" placeholder="Nombre..." value="{{ old('eme_nombre') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_parentesco" class="form-label">Parentesco (1)</label>
                <input name="eme_parentesco" class="form-control" type="text" placeholder="Parentesco..." value="{{ old('eme_parentesco') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_telefono" class="form-label">Telefono (1)</label>
                <input name="eme_telefono" class="form-control" type="text" placeholder="Telefono..." value="{{ old('eme_telefono') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_direccion" class="form-label">Direccion (1)</label>
                <input name="eme_direccion" class="form-control" type="text" placeholder="Direccion..." value="{{ old('eme_direccion') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_nombre2" class="form-label">Nombre (2)</label>
                <input name="eme_nombre2" class="form-control" type="text" placeholder="Nombre..." value="{{ old('eme_nombre2') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_parentesco2" class="form-label">Parentesco (2)</label>
                <input name="eme_parentesco2" class="form-control" type="text" placeholder="Parentesco..." value="{{ old('eme_parentesco2') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_telefono2" class="form-label">Telefono (2)</label>
                <input name="eme_telefono2" class="form-control" type="text" placeholder="Telefono..." value="{{ old('eme_telefono2') }}"/>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="eme_direccion2" class="form-label">Direccion (2)</label>
                <input name="eme_direccion2" class="form-control" type="text" placeholder="Direccion..." value="{{ old('eme_direccion2') }}"/>
            </div>
        </div>

    </div>

    <hr>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><h5>Formacion Academica</h5></label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="aca_tipo" class="form-label">Tipo de documento</label>
                <input id="aca_tipo" name="aca_tipo" class="form-control" type="text" placeholder="Tipo de documento..." value=""/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="aca_valor" class="form-label">Concepto</label>
                <input id="aca_valor" name="aca_valor" class="form-control" type="text" placeholder="Concepto..." value=""/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="btn-add" class="form-label"></label>
                <input id="btn-add" name="btn-add" class="form-control btn btn-info" type="button" value="Agregar" onclick="addrow()" />
            </div>
        </div>

        <div class="col-md-12">
            <table class="table" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Tipo de documento</th>
                  <th scope="col">Concepto</th>
                  <th scope="col">Comprobante</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
    </div>


    <hr>

    

    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            
            <input type="submit" name="Añadir Empleado" class="btn btn-info" value="Añadir Empleado">
        </div>
    </div>

</form>



<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });

    function addrow(){
        $("#myTable").find('tbody')
            .append($('<tr><td>' 
                +$('#aca_tipo').val() + '<input type="hidden" name="aca_tipo_val[]" value="'+ $('#aca_tipo').val() +'"/> </td><td>'
                + $('#aca_valor').val() + '<input type="hidden" name="aca_valor_val[]" value="'+ $('#aca_valor').val() +'"/> </td>'
                +'<td> <input id="aca_comprobante_val[]" name="aca_comprobante_val[]" class="form-control" type="file" required=""/> </td>'
                +'<td> <input type="button" class="btn btn-danger" value="Quitar" onclick="quitar($(this));" accept="image/*,.pdf"> </td>'
                +'</tr>')
        );
    }

    function quitar(row)
    {
        row.closest('tr').remove();
    }
</script>


@endsection
