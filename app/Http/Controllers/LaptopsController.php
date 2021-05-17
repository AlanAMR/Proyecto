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


class LaptopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // faltan los middleware para validar el rol del usuario
        // $this->middleware('tienerolde...');
    }
    
    public function inicio(){
    	
    	$titulo = "Todas las Laptops";
    	$laptops = Laptops::all()->where('status','!=','0');
    	

    	return view('laptops.index')
    		->with('laptops',$laptops)
    		->with('titulo',$titulo)
    	;
    }

    public function ver($id){
        
        $laptop = Laptops::findOrFail($id);

        return view('laptops.ver')
            ->with('laptop',$laptop)
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

        $laptop = new Laptops();

        $laptop->num_serie = $request->num_serie;
        $laptop->marca = $request->marca;
        $laptop->modelo = $request->modelo;
        $laptop->procesador = $request->procesador;
        $laptop->sistema_operativo = $request->so;
        $laptop->antivirus = $request->antivirus;

        $laptop->color = $request->color;
        $laptop->usuario = $request->usuario;
        $laptop->password = $request->password;

        if(isset($request->anydesk)){
            if($request->anydesk != ''){
                $laptop->anydesk = $request->anydesk;
            }
        }

        if(isset($request->anydeskpassword)){
            if($request->anydeskpassword != ''){
                $laptop->anydeskpassword = $request->anydeskpassword;
            }
        }

        $laptop->save();

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

            'color' => 'required',
            'usuario' => 'required',
            'password' => 'required'
        ]);

        //anydesk
        //anydeskpassword

        $laptop = Laptops::findOrFail($request->id);

        $reques->num_serie = $reques->num_serie;
        $laptops->marca = $request->marca;
        $laptop->modelo = $request->modelo;
        $laptop->procesador = $request->procesador;
        $laptop->sistema_operativo = $request->so;
        $laptop->antivirus = $request->antivirus;

        $laptop->color = $request->color;
        $laptop->usuario = $reques->usuario;
        $laptop->password = $equest->password;

        if(isset($request->anydesk)){
            if($request->anydesk != ''){
                $laptop->anydesk = $request->anydesk;
            }
        }

        if(isset($request->anydeskpassword)){
            if($request->anydeskpassword != ''){
                $laptop->anydeskpassword = $request->anydeskpassword;
            }
        }

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
}
