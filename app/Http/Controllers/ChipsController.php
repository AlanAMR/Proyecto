<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chips;
use App\SugerenciasChipsOperadores;
use App\SugerenciasChipsPlanes;

class ChipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // faltan los middleware para validar el rol del usuario
        // $this->middleware('tienerolde...');
    }
    //
    public function inicio(){
    	
    	$titulo = "Todos los Chips";
    	$chips = Chips::where('status','!=','0')->get();
    	
    	return view('chips.index')
    		->with('chips',$chips)
    		->with('titulo',$titulo)
    	;
    }

    public function ver($id){

        $chip = Chips::findOrFail($id);

        return view('chips.ver')
            ->with('chip',$chip)
            ->with('titulo','Telsacel | Chip '.$chip->$id)
        ;

    }

    public function nuevo(){

        $sugerencias_chips_operadores = SugerenciasChipsOperadores::all();
        $sugerencias_chips_planes = SugerenciasChipsPlanes::all();


        return view('chips.nuevo')
            ->with('sugerencias_chips_planes',$sugerencias_chips_planes)
            ->with('sugerencias_chips_operadores',$sugerencias_chips_operadores)
            ->with('titulo','Nuevo Chip')
        ;
    }


    public function crear(Request $request){

        $valdited = $request->validate([
            'numero' => 'required',
            'sim' => 'required',
            'operador' => 'required',
            'plan' => 'required'
        ]);

        $chip = new Chips();
        
        $chip->numero = $request->numero;
        $chip->sim = $request->sim;
        $chip->operador = $request->operador;
        $chip->plan = $request->plan;
        $chip->status = 1;

        $chip->save();

        return redirect('/almacen/chips/modificar/'.$chip->id)
            ->with('success','Se añadio con exito el chip: '.$chip->id);
    }

    public function modificar($id){


        $chip = Chips::findOrFail($id);

        $sugerencias_chips_operadores = SugerenciasChipsOperadores::all();
        $sugerencias_chips_planes = SugerenciasChipsPlanes::all();

        return view('chips.modificar')
            ->with('chip',$chip)
            ->with('sugerencias_chips_planes',$sugerencias_chips_planes)
            ->with('sugerencias_chips_operadores',$sugerencias_chips_operadores)
            ->with('titulo','Modificar Chip: '.$chip->sim)
        ;


    }
    
    public function actualizar(Request $request){
        
        $valdited = $request->validate([
            'id' => 'required',
            'numero' => 'required',
            'sim' => 'required',
            'operador' => 'required',
            'plan' => 'required'
        ]);

        $chip = Chips::findOrFail($request->id);
        
        $chip->numero = $request->numero;
        $chip->sim = $request->sim;
        $chip->operador = $request->operador;
        $chip->plan = $request->plan;

        $chip->update();

        return redirect()->back()
            ->with('success','Se actualizo la informacion de el chip: '.$chip->id);

    }
    
    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $chip = Chips::findOrFail($request->id);
        $chip->status = 0;
        $chip->update();

        return redirect('/almacen/chips')->with('success','Se elimino con exito el chip: '.$chip->id);
    }
}
