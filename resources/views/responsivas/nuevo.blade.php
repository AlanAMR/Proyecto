@extends('admin.template')

@section('title_right')

<a href="{{url('almacen/responsivas')}}">
    <button class="btn btn-outline-danger btn-sm">
        Cancelar
    </button>
</a>

@endsection

@section('main_div')
	
<form id="create-responsiva" method="post" action="{{url('almacen/responsivas/crear')}}">
    
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="solicitante" class="form-label">Solicitante</label>
                <input name="solicitante" class="form-control" list="optionsSolictante" id="datalist-solicitante" placeholder="Sin seleccionar" required="" value="{{old('solicitante')}}" autocomplete="off">
                <datalist id="optionsSolictante">
                  @foreach($usuarios_solicitan as $solicita)
                    <option value="{{$solicita->id}}|{{$solicita->name}}"></option>
                  @endforeach
                </datalist>

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="autoriza" class="form-label">Autoriza</label>
                <input name="autoriza" class="form-control" list="optionsAutoriza" id="datalist-autoriza" placeholder="Sin seleccionar..." required="" value="{{old('autoriza')}}" autocomplete="off">
                <datalist id="optionsAutoriza">
                  @foreach($usuarios_autorizan as $autoriza)
                    <option value="{{$autoriza->id}}|{{$autoriza->name}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="entrega" class="form-label">Entrega</label>
                <input name="entrega" class="form-control" list="optionsEntrega" id="datalist-entrega" placeholder="Sin seleccionar..." required="" value="{{old('entrega')}}" autocomplete="off">
                <datalist id="optionsEntrega">
                  @foreach($usuarios_entregan as $entregan)
                    <option value="{{$entregan->id}}|{{$entregan->name}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

    </div>

    <hr>

    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_laptop" class="form-label">Asignar Laptop</label>
                <input name="asignar_laptop" class="form-control" list="options_asignar_laptop" id="datalist-asignar_laptop" placeholder="Sin seleccionar..." autocomplete="off">
                <datalist id="options_asignar_laptop">
                  @foreach($laptops_asig as $laptop)
                    <option value="{{$laptop->id}}|{{$laptop->num_serie}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_laptop_condiciones" class="form-label">Condiciones del equipo</label>
                <textarea name="asignar_laptop_condiciones" class="form-control" id="asignar_laptop_condiciones" rows="2"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_laptop_otros" class="form-label">Comentario/Otros</label>
                <textarea name="asignar_laptop_otros" class="form-control" id="asignar_laptop_otros" rows="2"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Accesorios incluidos:</label>
            
            <div class="form-check">
              <input name="asignar_laptop_adaptador_corriente" id="asignar_laptop_adaptador_corriente" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_adaptador_corriente">
                Adaptador de corriente
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_adaptador_red" id="asignar_laptop_adaptador_red" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_adaptador_red">
                Adaptador de red
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_teclado" id="asignar_laptop_teclado" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_teclado">
                Teclado
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_mousepad" id="asignar_laptop_mousepad" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_mousepad">
                Mouse Pad
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_mouse" id="asignar_laptop_mouse" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_mouse">
                Mouse
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_adaptador_video" id="asignar_laptop_adaptador_video" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_adaptador_video">
                Adaptador de video
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_ventilador" id="asignar_laptop_ventilador" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_ventilador">
                Ventilador
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_cable" id="asignar_laptop_cable" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_cable">
                Cable
              </label>
            </div>

            <input name="asignar_laptop_otro_accesorio" id="asignar_laptop_otro_accesorio" class="form-control" type="text" value="" placeholder="Otro...">
            
        </div>

        <div class="col-md-4">
            <label class="form-label">Software instalado:</label>
            
            <div class="form-check">
              <input name="asignar_laptop_autocad" id="asignar_laptop_autocad" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_autocad">
                AutoCAD
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_visio" id="asignar_laptop_visio" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_visio">
                Visio
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_project" id="asignar_laptop_project" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_project">
                Project
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_comercial" id="asignar_laptop_comercial" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_comercial">
                Comercial
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_laptop_adobepro" id="asignar_laptop_adobepro" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_laptop_adobepro">
                AdobePro
              </label>
            </div>
            
            <input name="asignar_laptop_otro_software" id="asignar_laptop_otro_accesorio" class="form-control" type="text" value="" placeholder="Otro (especificar)...">
            
        </div>

    </div>
    
    <hr>

    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_laptop" class="form-label">Retirar Laptop</label>
                <input name="retirar_laptop" class="form-control" list="options_retirar_laptop" id="datalist-retirar_laptop" placeholder="Sin seleccionar..." autocomplete="off">
                <datalist id="options_retirar_laptop">
                  @foreach($laptops_ret as $laptop)
                    <option value="{{$laptop->id}}|{{$laptop->num_serie}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_laptop_condiciones" class="form-label">Condiciones del equipo</label>
                <textarea name="retirar_laptop_condiciones" class="form-control" id="retirar_laptop_condiciones" rows="2"></textarea>
            </div>
        </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_celular" class="form-label">Asignar Celular</label>
                <input name="asignar_celular" class="form-control" list="options_asignar_celular" id="datalist-asignar_laptop" placeholder="Sin seleccionar..." autocomplete="off">
                <datalist id="options_asignar_celular">
                  @foreach($celulares_asig as $celular)
                    <option value="{{$celular->id}}|{{$celular->num_serie}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_celular_condiciones" class="form-label">Condiciones del equipo</label>
                <textarea name="asignar_celular_condiciones" class="form-control" id="asignar_celular_condiciones" rows="2"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Accesorios incluidos:</label>
            
            <div class="form-check">
              <input name="asignar_celular_chip" id="asignar_celular_chip" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_celular_chip">
                CHIP
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_celular_adaptador_corriente" id="asignar_celular_adaptador_corriente" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_celular_adaptador_corriente">
                Adaptador de corriente
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_celular_cable_usb" id="asignar_celular_cable_usb" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_celular_cable_usb">
                Cable USB
              </label>
            </div>

            <div class="form-check">
              <input name="asignar_celular_fundas" id="asignar_celular_fundas" class="form-check-input" type="checkbox" value="val">
              <label class="form-check-label" for="asignar_celular_fundas">
                Fundas / Case
              </label>
            </div>

            <input name="asignar_celular_otros_accesorios" id="asignar_celular_otros_accesorios" class="form-control" type="text" value="" placeholder="Otro (especificar)...">
            
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_celular_plan" class="form-label">Nombre del plan</label>
                <input name="asignar_celular_plan" class="form-control" placeholder="Plan...">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_celular_numero" class="form-label">Numero de celular</label>
                <input name="asignar_celular_numero" class="form-control" placeholder="Numero celular...">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="asignar_celular_chip" class="form-label">Numero de chip</label>
                <input name="asignar_celular_chip" class="form-control" placeholder="Numero de Chip...">
            </div>
        </div>
        
    </div>

    <hr>

    <div class="row">
        

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_celular" class="form-label">Retirar Celular</label>
                <input name="retirar_celular" class="form-control" list="options_retirar_celular" id="datalist-retirar_celular" placeholder="Sin seleccionar..." autocomplete="off">
                <datalist id="options_retirar_celular">
                  @foreach($celulares_ret as $celular)
                    <option value="{{$celular->id}}|{{$celular->num_serie}}"></option>
                  @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_celular_condiciones" class="form-label">Condiciones del equipo</label>
                <textarea name="retirar_celular_condiciones" class="form-control" id="retirar_celular_condiciones" rows="2"></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_celular_chip" class="form-label">Numero de chip</label>
                <input name="retirar_celular_chip" class="form-control" placeholder="Numero de Chip...">
            </div>
        </div>
      <!-- Por si se requiere despues
        solicita e numero de celular al retirar y el plan

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_celular_numero" class="form-label">Numero de celular</label>
                <input name="retirar_celular_numero" class="form-control" placeholder="Numero celular...">
            </div>
        </div>

        <div class="col-md-4">
          
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="retirar_celular_plan" class="form-label">Nombre del plan</label>
                <input name="retirar_celular_plan" class="form-control" placeholder="Plan...">
            </div>
        </div>

      -->



    </div>

    <hr>

</form>

    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            
            <a href="{{url('almacen/responsivas')}}">
                <button class="btn btn-danger ">
                    Cancelar
                </button>
            </a>
            <button class="btn btn-info" onclick="document.getElementById('create-responsiva').submit();">
                Generar Responsiva
            </button>
        </div>
    </div>

@endsection