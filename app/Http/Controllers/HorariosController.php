<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horarios;

class HorariosController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){
    	
    	$horarios = Horarios::where('status','!=','0')->get();
    	
    	return view('admin.horarios.index')
    		->with('horarios',$horarios)
    		->with('titulo','Horarios')
    	;

    }

    public function nuevo(){

        return view('admin.horarios.nuevo')
            ->with('titulo','Nuevo Horario');
    }

    public function crear(Request $request){
        $validate = $request->validate([
            'identificador' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);

        $horario = new Horarios();

        $horario->identificador = $request->identificador;
        $horario->hora_inicio =$request->hora_inicio.':00';
        $horario->hora_fin =$request->hora_fin.':00';
        
        $dias = "";

        if($request->has('domingo')){
            $dias = $dias.'D';
        }

        if($request->has('lunes')){
            $dias = $dias.'L';
        }

        if($request->has('martes')){
            $dias = $dias.'M';
        }

        if($request->has('miercoles')){
            $dias = $dias.'I';
        }

        if($request->has('jueves')){
            $dias = $dias.'J';
        }

        if($request->has('viernes')){
            $dias = $dias.'V';
        }

        if($request->has('sabado')){
            $dias = $dias.'S';
        }

        $horario->dias = $dias;

        $horario->save();

        return redirect('/rh/horarios')->with('success','Horario '. $horario->identificador. ' Creado con exito.');

    }

    public function modificar($id){
        $horario = Horarios::findOrFail($id);

        return view('admin.horarios.modificar')
            ->with('titulo','Modificar el horario: '.$horario->identificador)
            ->with('horario',$horario)
            ;
    }

    public function actualizar(Request $request){
        $validate = $request->validate([
            'id' => 'required',
            'identificador' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);

        $horario = Horarios::findOrFail($request->id);

        $horario->identificador = $request->identificador;
        $horario->hora_inicio =$request->hora_inicio;
        $horario->hora_fin =$request->hora_fin;
        
        $dias = "";

        if($request->has('domingo')){
            $dias = $dias.'D';
        }

        if($request->has('lunes')){
            $dias = $dias.'L';
        }

        if($request->has('martes')){
            $dias = $dias.'M';
        }

        if($request->has('miercoles')){
            $dias = $dias.'I';
        }

        if($request->has('jueves')){
            $dias = $dias.'J';
        }

        if($request->has('viernes')){
            $dias = $dias.'V';
        }

        if($request->has('sabado')){
            $dias = $dias.'S';
        }

        $horario->dias = $dias;

        $horario->update();

        return redirect()->back()->with('success','Horario '.$horario->identificador.' actualizado con exito.');
    }

    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        try{
            $horario = Horarios::findOrFail($request->id);
            $horario->status = 0;
            $horario->update();
        }catch(Exception $ex){
            return redirect()->back()->with('error','Error el eliminar el horario seleccionado.');            
        }
        return redirect()->back()->with('success','Horario '.$horario->identificador.' eliminado con exito.');
    }
}
