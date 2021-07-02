<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptops;
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
use App\Exports\ArchivoLaptops;
use Maatwebsite\Excel\Facades\Excel;

class LaptopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio(){
    	
    	$titulo = "Todas las Laptops";
    	$laptops = Laptops::
            where('laptops.status','!=','0')
            ->get()
            ;
    	

    	return view('laptops.index')
    		->with('laptops',$laptops)
    		->with('titulo',$titulo)
    	;
    }

    public function ver($id){
        
        $laptop = Laptops::findOrFail($id);

        $passsisop = PassSisOp::
            where('equipo_id','=',$laptop->id)
            ->where('tipo','=','3')
            ->get();

        $passanydesk = PassAnyDesk::
            where('equipo_id','=',$laptop->id)
                ->where('tipo','=','3')
                ->get();

        $passbitlocker = PassBitlocker::
            where('equipo_id','=',$laptop->id)
                ->where('tipo','=','3')
                ->get();

        $responsivasInsumos = ResponsivasInsumos::
            select('responsivas_insumos.id as id','responsivas_movimientos.valor as movimiento','tipos_insumos.valor as tipo_insumo','responsivas_insumos.insumo_id as insumo_id','responsivas.created_at as fecha')
            ->join('responsivas','responsivas_insumos.responsiva_id','=','responsivas.id')
            ->join('responsivas_movimientos','responsivas_movimientos.id','=','responsivas_insumos.responsiva_movimiento_id')
            ->join('tipos_insumos','responsivas_insumos.tipo_insumo_id','=','tipos_insumos.id')
            ->where('tipos_insumos.valor','=','Laptop')
            ->where('responsivas_insumos.insumo_id','=',$laptop->id)
            ->get();

        return view('laptops.ver')
            ->with('laptop',$laptop)
            ->with('passsisop',$passsisop)
            ->with('passanydesk',$passanydesk)
            ->with('passbitlocker',$passbitlocker)
            ->with('responsivas',$responsivasInsumos)
            ->with('titulo','Telsacel | Laptop '.$laptop->$id)
        ;

    }

    public function nuevo(){


        $sugerencias_laptops_marcas = SugerenciasLaptopsMarcas::all();
        $sugerencias_laptops_modelos = SugerenciasLaptopsModelos::all();
        $sugerencias_laptops_procesadores = SugerenciasLaptopsProcesadores::all();
        $sugerencias_laptops_so = SugerenciasLaptopsSO::all();
        $suegrencias_laptops_antivirus = SugerenciasLaptopsAntivirus::all();

        $colores = Colores::all();

        return view('laptops.nuevo')
            ->with('sugerencias_laptops_marcas',$sugerencias_laptops_marcas)
            ->with('sugerencias_laptops_modelos',$sugerencias_laptops_modelos)
            ->with('sugerencias_laptops_procesadores',$sugerencias_laptops_procesadores)
            ->with('sugerencias_laptops_so',$sugerencias_laptops_so)
            ->with('sugerencias_laptops_antivirus',$suegrencias_laptops_antivirus)
            ->with('colores',$colores)
            ->with('titulo','Nueva Laptop')
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

            'color' => 'required',
            'usuario' => 'required',
        ]);

        //anydesk
        //anydeskpassword
        DB::beginTransaction();

        try{


        $laptop = new Laptops();

        $laptop->num_serie = $request->num_serie;
        $laptop->marca = $request->marca;
        $laptop->modelo = $request->modelo;
        $laptop->procesador = $request->procesador;
        $laptop->sistema_operativo = $request->so;
        $laptop->antivirus = $request->antivirus;

        $laptop->color = $request->color;

        $laptop->save();

        $passsisop = new PassSisOp();

        //añadir passsisop
        $passsisop->equipo_id = $laptop->id;
        $passsisop->tipo = 3;
        $passsisop->sistema = $request->so;
        $passsisop->identificador = $request->num_serie;
        $passsisop->usuario = $request->usuario;
        $passsisop->password =  Crypt::encryptString($request->password);

        $passsisop->save();

        $passanydesk = new PassAnyDesk();
        $passanydesk->anydesk = '';
        
        $passanydesk->equipo_id = $laptop->id;
        $passanydesk->tipo = 3;
        $passanydesk->identificador = $request->num_serie;

        if(isset($request->anydesk)){
            if($request->anydesk != ''){
                $passanydesk->anydesk = $request->anydesk;
            }
        }

        $passanydesk->password = '';
        if(isset($request->anydeskpassword)){
            if($request->anydeskpassword != ''){
                $passanydesk->password = Crypt::encryptString($request->contrasenia);
            }
        }

        $passanydesk->save();

        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()
            ->with('error','Error al añadir la laptop');
        }

        DB::commit();

        return redirect('/almacen/laptops/ver/'.$laptop->id)
            ->with('success','Se añadio con exito la laptop: '.$laptop->id);
    }

    public function modificar($id){

        $laptop = Laptops::findOrFail($id);

        $sugerencias_laptops_marcas = SugerenciasLaptopsMarcas::all();
        $sugerencias_laptops_modelos = SugerenciasLaptopsModelos::all();
        $sugerencias_laptops_procesadores = SugerenciasLaptopsProcesadores::all();
        $sugerencias_laptops_so = SugerenciasLaptopsSO::all();
        $sugerencias_laptops_antivirus = SugerenciasLaptopsAntivirus::all();
        $colores = Colores::all();


        return view('laptops.modificar')
            ->with('laptop',$laptop)
            ->with('sugerencias_laptops_marcas',$sugerencias_laptops_marcas)
            ->with('sugerencias_laptops_modelos',$sugerencias_laptops_modelos)
            ->with('sugerencias_laptops_procesadores',$sugerencias_laptops_procesadores)
            ->with('sugerencias_laptops_so',$sugerencias_laptops_so)
            ->with('sugerencias_laptops_antivirus',$sugerencias_laptops_antivirus)
            ->with('colores',$colores)
            ->with('titulo','Modificar Laptop: '.$laptop->num_serie)
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
            'color' => 'required'
        ]);

        //anydesk
        //anydeskpassword

        $laptop = Laptops::findOrFail($request->id);

        $laptop->num_serie = $request->num_serie;
        $laptop->marca = $request->marca;
        $laptop->modelo = $request->modelo;
        $laptop->procesador = $request->procesador;
        $laptop->sistema_operativo = $request->so;
        $laptop->antivirus = $request->antivirus;

        $laptop->color = $request->color;

        $laptop->update();

        return redirect()->back()
            ->with('success','Se actualizo la informacion de la laptop: '.$laptop->num_serie);

    }
    
    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $laptop = Laptops::findOrFail($request->id);
        $laptop->status = 0;
        $laptop->update();

        return redirect('/almacen/laptops')->with('success','Se elimino con exito la laptop: '.$laptop->num_serie);
    }

    public function cargar_csv(){
        return view('laptops.cargar_csv')
            ->with('titulo','Cargar Laptops desde Archivo CSV / EXCEL.')
            ;
    }

    public function exportar_plantilla(){
        $export = new ArchivoLaptops;
        return Excel::download($export, 'ejemplo.xlsx');
    }


}
