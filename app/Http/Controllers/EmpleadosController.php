<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use DateTime;

use App\Empleados;
use App\EmpleadoPuesto;
use App\EmpleadoCargo;
use App\EmpleadoDatosEmergencia;
use App\EmpleadoFormacionAcademica;
use App\Puestos;
use App\Roles;
use App\Horarios;
use App\User;
use App\Direccion;
use App\RolesUsuarios;
use App\Cuentabancaria;
use App\Ine;
use App\Areas;


class EmpleadosController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function inicio(){

    	$empleados = Empleados::all();

    	return view('rh.empleados.index')
    			->with('titulo','Listado de empleados')
    			->with('empleados',$empleados)
    		;
    }

    public function nuevo(){

    	$puestos = Puestos::where('status','!=','0')->get();
    	$roles = Roles::all();
    	$horarios = Horarios::where('status','!=','0')->get();

    	return view('rh.empleados.nuevo')
    		->with('titulo','Nuevo empleado')
    		->with('puestos',$puestos)
    		->with('roles',$roles)
    		->with('horarios',$horarios)
    		;
    }

    public function crear(Request $request){
        
        $validate = $request->validate([
            
            'nombre' => 'required',
            'nickname' => 'required|unique:users',
            'correo' => 'required|email|unique:empleado',
            'password' => 'required',
            'rol' => 'required',

            'banco' => 'required',
            'titular' => 'required',
            'clabe' => 'required',
            
            'clave_elector' => 'required|max:20',
            'curp' => 'required|max:20',
            'anio_registro' => 'required',
            'anio_nacimiento' => 'required',
            'ine_seccion' => 'required',
            'ine_vigencia' => 'required',
            
            'rfc' => 'required',
            'nss' => 'required',

            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'zona' => 'required',
            'codigo_postal' => 'required',
            'calle' => 'required',
            'num_ext' => 'required',

            'clave' => 'required|unique:empleado|max:10',
            'apellidos' => 'required',
            'puesto' => 'required',
            'fecha_inicio' => 'required',
            'horario' => 'required',
            'sueldo' => 'required'

        ]);

        // Inicia la transaccion.
        DB::beginTransaction();

    	try{
            /*  
                Añadir los registros independientes 
                    - Usuario
                    - Usuario - Rol
                    - Ine
                    - Direccion 
                    - Cuenta Bancaria
            */

            // 1) Usuario.
            $user = new User();            
            $user->name = $request->nombre;
            $user->nickname = $request->nickname;
            $user->password = bcrypt($request->password);
            $user->email = $request->correo;
            $user->status = 1;
            $user->save();

            //Usuario - Rol
            $rolusuario = new RolesUsuarios();
            $rolusuario->usuario_id = $user->id;
            $rolusuario->rol_id = $request->rol;
            $rolusuario->save();

            // INE
            $ine = new Ine();
            $ine->clave_elector = $request->clave_elector;
            $ine->curp = $request->curp;
            $ine->anio_registro = $request->anio_registro;
            $ine->nacimiento = $request->anio_nacimiento;
            $ine->seccion = $request->ine_seccion;
            $ine->vigencia = $request->ine_vigencia;
            $ine->comprobante = "";
            $ine->save();

            //Direccion
            $direccion = new Direccion();
            $direccion->pais = $request->pais;
            $direccion->ciudad = $request->ciudad;
            $direccion->estado = $request->estado;
            $direccion->codigo_postal = $request->codigo_postal;
            $direccion->zona = $request->zona;
            $direccion->calle = $request->calle;
            $direccion->numero_exterior = $request->num_ext;

            if($request->has('num_int')){
                if($request->num_int != null & $request->num_int  != '' )
                    $direccion->numero_interior = $request->num_int;
                else 
                    $direccion->numero_interior = '';
            }else{
                $direccion->numero_interior = '';
            }
            $direccion->comprobante = "";
            $direccion->save();

            //Cuenta bancaria
            $cuenta = new Cuentabancaria();
            $cuenta->banco = $request->banco;
            $cuenta->titular = $request->titular;
            $cuenta->clabe = $request->clabe;
            $cuenta->comprobante = "";
            $cuenta->save();
            
            /*
            Añadir el registro principal.
                - Empleado
            */

            $empleado = new Empleados();
            $empleado->ine_id = $ine->id;
            $empleado->rfc = $request->rfc;
            $empleado->direccion_id = $direccion->id;
            $empleado->user_id = $user->id;
            $empleado->clave = $request->clave;
            $empleado->banco_id = $cuenta->id;
            $empleado->nombre = $request->nombre.' '.$request->apellidos;

            if($request->has('telefono')){
                if($request->telefono != ''){
                    $empleado->telefono1 = $request->telefono;
                }else{
                    $empleado->telefono1 = '';
                }
            }else{
                $empleado->telefono1 = '';
            }

            if($request->has('celular')){
                if($request->celular != ''){
                    $empleado->telefono2 = $request->celular;
                }else{
                    $empleado->telefono2 = '';
                }
            }else{
                $empleado->telefono2 = '';
            }

            $empleado->correo = $request->correo;
            $empleado->nss = $request->nss;

            $d1 = new DateTime('now');
            $d2 = new DateTime($request->anio_nacimiento);

            $diff = $d2->diff($d1);

            $empleado->edad = $diff->y; 
            $empleado->save();


            /*                
            Añadir los registros dependientes.
                Empleado - Puesto
                Empleado - Cargo
                Empleado - Datos emergencia
                Empleado - Formacion Academica
            */

            //Empleado puesto
            $empleadopuesto = new EmpleadoPuesto();
            $empleadopuesto->empleado_id = $empleado->id;
            $empleadopuesto->horario_id = $request->horario;
            $empleadopuesto->puesto_id = $request->puesto;
            $empleadopuesto->save();

            $puesto = Puestos::findOrFail($request->puesto);
            $horario = Horarios::findOrFail($request->horario);

            //Empleado cargo
            $empleadocargo = new EmpleadoCargo();
            $empleadocargo->empleado_id = $empleado->id;
            $empleadocargo->cargo = $puesto->valor;
            $empleadocargo->sueldo = $request->sueldo;
            $empleadocargo->comienzo = $request->fecha_inicio;
            $empleadocargo->finaliza = null;
            $empleadocargo->horario = $horario->dias.', '.$horario->hora_inicio.' - '.$horario->hora_fin;
            $empleadocargo->status = 1;
            $empleadocargo->save();

            //Empleado datos emergencia.

            $eme1 = new EmpleadoDatosEmergencia();
            
            $eme1->empleado_id = $empleado->id;

            if($request->has('eme_nombre')){
                if($request->eme_nombre != null && $request->eme_nombre != ''){
                    $eme1->nombre = $request->eme_nombre;
                }else{
                    $eme1->nombre = '';
                }
            }else{
                $eme1->nombre = '';
            }

            if($request->has('eme_parentesco')){
                if($request->eme_parentesco != null && $request->eme_parentesco != ''){
                    $eme1->parentesco = $request->eme_parentesco;
                }else{
                    $eme1->parentesco = '';
                }
            }else{
                $eme1->parentesco = '';
            }

            if($request->has('eme_direccion')){
                if($request->eme_direccion != null && $request->eme_direccion != ''){
                    $eme1->direccion = $request->eme_direccion;
                }else{
                    $eme1->direccion = '';
                }
            }else{
                $eme1->direccion = '';
            }

            if($request->has('eme_telefono')){
                if($request->eme_telefono != null && $request->eme_telefono != ''){
                    $eme1->telefono = $request->eme_telefono;
                }else{
                    $eme1->telefono = '';
                }
            }else{
                $eme1->telefono = '';
            }

            $eme1->save();

            $eme2 = new EmpleadoDatosEmergencia();
            
            $eme2->empleado_id = $empleado->id;

            if($request->has('eme_nombre2')){
                if($request->eme_nombre2 != null && $request->eme_nombre2 != ''){
                    $eme2->nombre = $request->eme_nombre2;
                }else{
                    $eme2->nombre = '';
                }
            }else{
                $eme2->nombre = '';
            }

            if($request->has('eme_parentesco2')){
                if($request->eme_parentesco2 != null && $request->eme_parentesco2 != ''){
                    $eme2->parentesco = $request->eme_parentesco2;
                }else{
                    $eme2->parentesco = '';
                }
            }else{
                $eme1->parentesco = '';
            }

            if($request->has('eme_direccion2')){
                if($request->eme_direccion2 != null && $request->eme_direccion2 != ''){
                    $eme2->direccion = $request->eme_direccion2;
                }else{
                    $eme2->direccion = '';
                }
            }else{
                $eme2->direccion = '';
            }

            if($request->has('eme_telefono2')){
                if($request->eme_telefono2 != null && $request->eme_telefono2 != ''){
                    $eme2->telefono = $request->eme_telefono2;
                }else{
                    $eme2->telefono = '';
                }
            }else{
                $eme2->telefono = '';
            }

            $eme2->save();


        }catch(Exception $ex){
            //En caso de cualquier error, cancela la transaccion y regresa el error.
            DB::rollBack();
            return redirect()->back()->withInput(Input::all())->with('error','Error: '.$ex);
        }
            // Si se logro crear todos los registro; entonces realiza la transaccion.
            
            DB::commit();
            
            // Luego sube los archivos.
            // Y Si algun archivo falla al subirse, regresar el mensaje de error.

            $ineok = true;
            $direccionok = true;
            $bancook = true;
            $formacaok = true;
            /*
                Subir los comprobantes.
                - Ine.
                - Direccion.
                - Cuenta Bancaria.
                - Formacion academica -- se sube luego ya que no se conoce cuantos elementos tiene el arreglo.
            */

            try{

                // Archivo de INE
                if($request->has('ine_comprobante')){
                    $file = $request->file('ine_comprobante');
                    $destinationPath = 'empleados/'.$empleado->id;
                    $file->move($destinationPath,'ine_comprobante.'.$file->getClientOriginalExtension());

                    $ine->comprobante = 'ine_comprobante.'.$file->getClientOriginalExtension();
                    $ine->update();
                }

            }catch(Exception $ex){
                $ineok = false;
            }

            try{
                // Archivo de Direccion
                if($request->has('direccion_comprobante')){
                    $file = $request->file('direccion_comprobante');
                    $destinationPath = 'empleados/'.$empleado->id;
                    $file->move($destinationPath,'direccion_comprobante.'.$file->getClientOriginalExtension());

                    $direccion->comprobante = 'direccion_comprobante.'.$file->getClientOriginalExtension();
                    $direccion->update();
                }

            }catch(Exception $ex){
                $direccionok = false;
            }

            try{
                // Archivo de Banco
                if($request->has('banco_comprobante')){
                    $file = $request->file('banco_comprobante');
                    $destinationPath = 'empleados/'.$empleado->id;
                    $file->move($destinationPath,'banco_comprobante.'.$file->getClientOriginalExtension());

                    $cuenta->comprobante = 'banco_comprobante.'.$file->getClientOriginalExtension();
                    $cuenta->update();
                }


            }catch(Exception $ex){
                $bancook = false;                
            }



            try{
                // Archivos de Formacion academica
            

                if($request->has('aca_valor_val')){
            
                    $arch_aca_valor = $request->aca_valor_val;
                    $arch_aca_tipo = $request->aca_tipo_val;
                    $arch_aca_comprobante = $request->aca_comprobante_val;

                    $x=0;

                    foreach ($request->file('aca_comprobante_val') as $file) {
                        // Crear el registro
                        $formacion = new EmpleadoFormacionAcademica();
                        $formacion->empleado_id = $empleado->id;
                        $formacion->tipo =  $arch_aca_tipo[$x];
                        $formacion->valor = $arch_aca_valor[$x];
                        $formacion->comprobante = '';
                        $formacion->save();

                        $destinationPath = 'empleados/'.$empleado->id;

                        $name = 'form_aca_'.$formacion->id.'.'.$file->getClientOriginalExtension();
                        $file->move($destinationPath, $name);  
                        
                        $formacion->comprobante = $name;
                        $formacion->update();

                        $x++;
                    }

                }


            }catch(Exception $ex){
                $formacaok = false;                
            }


            if($ineok && $direccionok && $bancook && $formacaok){
                return redirect('rh/empleados/ver/'.$empleado->id)->with('success'.'Empleado '. $empleado->nombre.' creado exitosamente.');
            }

            $errores = "";

            if(!$ineok){
                $errores = $errores." No se pudo subir el archivo del comprobante de INE. ";
            }

            if(!$direccionok){
                $errores = $errores." No se pudo subir el archivo del comprobante de Direccion. ";
            }

            if(!$bancook){
                $errores = $errores." No se pudo subir el archivo del comprobante de Banco. ";
            }

            if(!$formacaok){
                $errores = $errores." No se pudo subir el archivo del comprobante de Formacion Academica. ";
            }

            return redirect('rh/empleados/ver/'.$empleado->id)
                ->with('success','Empleado '. $empleado->nombre.' creado exitosamente.')
                ->with('error',$errores);
    	

    }

    public function modificar($id){

    }

    public function actualizar(Request $request){

    }

    public function ver($id){

        $empleado = Empleados::findOrFail($id);

        $usuario = User::where('id','=',$empleado->user_id)->first();

        $roles = RolesUsuarios::
            select('roles.valor as rol','rolesusuarios.*')
            ->join('roles','roles.id','=','rolesusuarios.rol_id')
            ->where('rolesusuarios.usuario_id','=',$usuario->id)
            ->get();

        $ine = Ine::where('id','=',$empleado->ine_id)->first();
        
        $direccion = Direccion::where('id','=',$empleado->direccion_id)->first();

        $banco = Cuentabancaria::where('id','=',$empleado->banco_id)->first();

        $empleadopuesto = EmpleadoPuesto::where('empleadopuesto.empleado_id','=',$empleado->id)->first();

        $puesto = Puestos::where('id','=',$empleadopuesto->puesto_id)->first();

        $area = Areas::where('id','=',$puesto->area_id)->first();

        $horario = Horarios::where('id','=',$empleadopuesto->horario_id)->first();

        $cargos = EmpleadoCargo::where('empleado_id','=',$empleado->id)->get();

        $datosemergencia = EmpleadoDatosEmergencia::where('empleado_id','=',$empleado->id)->get();

        $academica = EmpleadoFormacionAcademica::where('empleado_id','=',$empleado->id)->get();


        return view('rh.empleados.ver')
            ->with('titulo','Empleado: '.$empleado->nombre)
            ->with('empleado',$empleado)
            ->with('usuario',$usuario)
            ->with('roles',$roles)
            ->with('ine',$ine)
            ->with('direccion',$direccion)
            ->with('banco',$banco)
            ->with('puesto',$puesto)
            ->with('area',$area)
            ->with('horario',$horario)
            ->with('cargos',$cargos)
            ->with('datosemergencia',$datosemergencia)
            ->with('academica',$academica)
        ;
    }
}
