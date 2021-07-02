@extends('admin.template')

@section('title_right')
<!-- Boton aniadir -->
<a href="{{url('almacen/laptops')}}">
    <button type="button" class="btn btn-outline-danger btn-sm">
      Regresar 
    </button>
</a>

@endsection

@section('main_div')


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="num_serie" class="form-label">Numero de serie</label>
                <input type="text" name="num_serie" class="form-control" placeholder="Numero de serie" value="{{$laptop->num_serie}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input name="marca" class="form-control" list="options_marcas" id="datalist-marcas" value="{{$laptop->marca}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input name="modelo" class="form-control" list="options_modelos"  value="{{$laptop->modelo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador" class="form-label">Procesador</label>
                <input name="procesador" class="form-control" list="options_procesadores" value="{{$laptop->procesador}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="so" class="form-label">Sistema Operativo</label>
                <input name="so" class="form-control" list="options_so" value="{{$laptop->sistema_operativo}}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="antivirus" class="form-label">Antivirus</label>
                <input name="antivirus" class="form-control" list="options_antivirus" value="{{$laptop->antivirus}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="color" class="form-label">Color</label>
                
                <input type="text" name="color" class="form-control" value="{{$laptop->color}}">
            </div>
        </div>


    </div>

    <hr>

    @if($passsisop->count() >0)
    <div class="row">
        <label><b>Cuentas de usuario:</b></label>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($passsisop as $sisop)
                        <tr>
                            <th>{{$sisop->id}}</th>
                            <th>{{$sisop->usuario}}</th>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <a href="{{url('sistemas/accesos/sistemaop/ver/'.$sisop->id)}}">
                                        <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                    </a>

                                </div>


                            </th>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif

    @if($passanydesk->count() >0)
    <div class="row">
        <label><b>Cuentas de Any Desk:</b></label>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($passanydesk as $any)
                        <tr>
                            <th>{{$any->id}}</th>
                            <th>{{$any->anydesk}}</th>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <a href="{{url('sistemas/accesos/anydesk/ver/'.$any->id)}}">
                                        <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                    </a>

                                </div>


                            </th>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif

    @if($passbitlocker->count() >0)
    <div class="row">
        <label><b>Claves de Bitlocker:</b></label>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Clave</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($passbitlocker as $bit)
                        <tr>
                            <th>{{$bit->id}}</th>
                            <th>{{$bit->clave}}</th>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <a href="{{url('sistemas/accesos/bitlocker/ver/'.$bit->id)}}">
                                        <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                    </a>

                                </div>


                            </th>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Clave</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif

    @if($responsivas->count() >0)
    <div class="row">
        <label><b>Responsivas:</b></label>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Movimiento</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responsivas as $resp)
                        <tr>
                            <th>{{$resp->id}}</th>
                            <th>{{$resp->movimiento}}</th>
                            <th>{{$resp->fecha}}</th>
                            <th>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <a href="{{url('almacen/responsivas/ver/'.$resp->id)}}">
                                        <button class="btn btn-info btn-sm" style="margin-right: 5px">Ver mas Detalles <i class="far fa-eye"></i></button> 
                                    </a>

                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Movimiento</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif

    
<div class="row">
    <div class="col-md-12" style="text-align: center;">
        
        <a href="{{url('almacen/laptops')}}">
            <button class="btn btn-outline-danger btn-sm">
                Regresar
            </button>
        </a>
    </div>
</div>

@endsection