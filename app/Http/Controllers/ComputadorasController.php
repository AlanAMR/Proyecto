<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computadoras;
use App\SugerenciasLaptopsMarcas;
use App\SugerenciasLaptopsModelos;
use App\SugerenciasLaptopsProcesadores;
use App\SugerenciasLaptopsSO;
use App\SugerenciasLaptopsAntivirus;
use App\Colores;
use App\PassSisOp;
use App\PassAnyDesk;
use App\Responsivas;
use App\ResponsivasInsumos;
use App\PassBitlocker;
use Illuminate\Support\Facades\Crypt;
use DB;

class ComputadorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio(){
    	
    	$computadoras = Computadoras::
            where('status','!=','0')
            ->get()
            ;
        
    	return view('almacenti.computadoras.index')
    		->with('computadoras',$computadoras)
    		->with('titulo','Todas las computadoas')
    	;
    }

    public function ver($id){
        
        $computadora = Computadoras::findOrFail($id);

        $passsisop = PassSisOp::
            where('equipo_id','=',$computadora->id)
            ->where('tipo','=','2')
            ->get();

        $passanydesk = PassAnyDesk::
            where('equipo_id','=',$computadora->id)
                ->where('tipo','=','2')
                ->get();

        $passbitlocker = PassBitlocker::
            where('equipo_id','=',$computadora->id)
                ->where('tipo','=','2')
                ->get();

        $responsivasInsumos = ResponsivasInsumos::
            select('responsivas_insumos.id as id','responsivas_movimientos.valor as movimiento','tipos_insumos.valor as tipo_insumo','responsivas_insumos.insumo_id as insumo_id','responsivas.created_at as fecha')
            ->join('responsivas','responsivas_insumos.responsiva_id','=','responsivas.id')
            ->join('responsivas_movimientos','responsivas_movimientos.id','=','responsivas_insumos.responsiva_movimiento_id')
            ->join('tipos_insumos','responsivas_insumos.tipo_insumo_id','=','tipos_insumos.id')
            ->where('tipos_insumos.valor','=','Computadora')
            ->where('responsivas_insumos.insumo_id','=',$computadora->id)
            ->get();

        return view('almacenti.computadoras.ver')
            ->with('computadora',$computadora)
            ->with('passsisop',$passsisop)
            ->with('passanydesk',$passanydesk)
            ->with('passbitlocker',$passbitlocker)
            ->with('responsivas',$responsivasInsumos)
            ->with('titulo','Telsacel | Computadora '.$computadora->$id)
        ;

    }

    public function nuevo(){


        $sugerencias_laptops_marcas = SugerenciasLaptopsMarcas::all();
        $sugerencias_laptops_modelos = SugerenciasLaptopsModelos::all();
        $sugerencias_laptops_procesadores = SugerenciasLaptopsProcesadores::all();
        $sugerencias_laptops_so = SugerenciasLaptopsSO::all();
        $suegrencias_laptops_antivirus = SugerenciasLaptopsAntivirus::all();

        return view('almacenti.computadoras.nuevo')
            ->with('sugerencias_laptops_marcas',$sugerencias_laptops_marcas)
            ->with('sugerencias_laptops_modelos',$sugerencias_laptops_modelos)
            ->with('sugerencias_laptops_procesadores',$sugerencias_laptops_procesadores)
            ->with('sugerencias_laptops_so',$sugerencias_laptops_so)
            ->with('sugerencias_laptops_antivirus',$suegrencias_laptops_antivirus)
            ->with('titulo','Nueva Computadora')
        ;
    }


    public function crear(Request $request){

        $valdited = $request->validate([
            'num_serie' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'procesador' => 'required',
            'so' => 'required',
            'antivirus' => 'required',
            'usuario' => 'required',
        ]);

        //anydesk
        //anydeskpassword
        DB::beginTransaction();

        try{


        $computadora = new Computadoras();

        $computadora->num_serie = $request->num_serie;
        $computadora->marca = $request->marca;
        $computadora->modelo = $request->modelo;
        $computadora->procesador = $request->procesador;
        $computadora->sistema_operativo = $request->so;
        $computadora->antivirus = $request->antivirus;

        $computadora->save();

        $passsisop = new PassSisOp();

        //añadir passsisop
        $passsisop->equipo_id = $computadora->id;
        $passsisop->tipo = 2;
        $passsisop->sistema = $request->so;
        $passsisop->identificador = $request->num_serie;
        $passsisop->usuario = $request->usuario;
        $passsisop->password =  Crypt::encryptString($request->password);

        $passsisop->save();

        $passanydesk = new PassAnyDesk();
        $passanydesk->anydesk = '';
        
        $passanydesk->equipo_id = $computadora->id;
        $passanydesk->tipo = 2;
        $passanydesk->identificador = $request->num_serie;

        if(isset($request->anydesk)){
            if($request->anydesk != ''){
                $passanydesk->anydesk = $request->anydesk;
            }
        }

        $passanydesk->password = '';
        if(isset($request->anydeskpassword)){
            if($request->anydeskpassword != ''){
                $passanydesk->password = Crypt::encryptString($request->anydeskpassword);
            }
        }

        $passanydesk->save();

        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()
            ->with('error','Error al añadir la computadora');
        }

        DB::commit();

        return redirect('/almacen/computadoras/ver/'.$computadora->id)
            ->with('success','Se añadio con exito la computadora: '.$computadora->id);
    }

    public function modificar($id){

        $computadora = Computadoras::findOrFail($id);

        $sugerencias_laptops_marcas = SugerenciasLaptopsMarcas::all();
        $sugerencias_laptops_modelos = SugerenciasLaptopsModelos::all();
        $sugerencias_laptops_procesadores = SugerenciasLaptopsProcesadores::all();
        $sugerencias_laptops_so = SugerenciasLaptopsSO::all();
        $sugerencias_laptops_antivirus = SugerenciasLaptopsAntivirus::all();
        


        return view('almacenti.computadoras.modificar')
            ->with('computadora',$computadora)
            ->with('sugerencias_laptops_marcas',$sugerencias_laptops_marcas)
            ->with('sugerencias_laptops_modelos',$sugerencias_laptops_modelos)
            ->with('sugerencias_laptops_procesadores',$sugerencias_laptops_procesadores)
            ->with('sugerencias_laptops_so',$sugerencias_laptops_so)
            ->with('sugerencias_laptops_antivirus',$sugerencias_laptops_antivirus)
            ->with('titulo','Modificar Computadora: '.$computadora->num_serie)
        ;
    }
    
    public function actualizar(Request $request){
        
        $valdited = $request->validate([
            'id' => 'required',
            'num_serie' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'procesador' => 'required',
            'so' => 'required',
            'antivirus' => 'required',
        ]);

        //anydesk
        //anydeskpassword

        $computadora = Computadoras::findOrFail($request->id);

        $computadora->num_serie = $request->num_serie;
        $computadora->marca = $request->marca;
        $computadora->modelo = $request->modelo;
        $computadora->procesador = $request->procesador;
        $computadora->sistema_operativo = $request->so;
        $computadora->antivirus = $request->antivirus;
        $computadora->update();

        return redirect()->back()
            ->with('success','Se actualizo la informacion de la computadora: '.$computadora->num_serie);

    }
    
    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $computadora = Computadoras::findOrFail($request->id);
        $computadora->status = 0;
        $computadora->update();

        return redirect('/almacen/computadoras')->with('success','Se elimino con exito la computadora: '.$computadora->num_serie);
    }
}
