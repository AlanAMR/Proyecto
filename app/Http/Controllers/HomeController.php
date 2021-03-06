<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\contacto;

use App\Template;
use App\TemplateDescripcion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function mail(Request $request){

        //Mail::to(config('mail.from.address'))->send(new contacto($request));
        
        Mail::to('contacto@telsacel.com')->send(new contacto($request));
        

        return redirect()->back()->with('success','Se envio correctamente el mensaje!');
    }

    public function getDatos(){
        return [
            'titulo' => 'Inicio',
            'organizacion' => 'Telsa Solutions',
            'logo' => 'telsa/assets/img/navbar-logo.svg',
            'telefono' => '33-3550-5663',
            'email' => 'procodegdl@gmail.com',
            'facebook' => 'https://www.facebook.com/proocode/'
        ]; 
    }

    public function index()
    {
        $datos = self::getDatos();

        return view('landing_page.index')
            ->with('seccion','inicio')
            ->with('datos',$datos);
            ;
    }

    public function acercade()
    {
        $datos = self::getDatos();

        return view('home.acercade')
            ->with('seccion','acercade')
            ->with('datos',$datos);
            ;
    }

    public function cotizacion()
    {
        $datos = self::getDatos();

        return view('home.cotizacion')
            ->with('seccion','cotizacion')
            ->with('datos',$datos);
            ;
    }

    public function servicios()
    {
        $datos = self::getDatos();

        return view('home.servicios')
            ->with('seccion','servicios')
            ->with('datos',$datos);
            ;
    }

    public function proyectos()
    {
        $datos = self::getDatos();

        return view('home.proyectos')
            ->with('seccion','proyectos')
            ->with('datos',$datos);
            ;
    }


    public function ingresar(){
        return view('login.template');
    }

    public function admin_index(){
        return view('admin.example');
    }

    public function blank(){
        return self::getblankview();
    }

    private function getblankview(){
        
        $mensajes = ["Mensaje 1","Mensaje 2"];

        $alertas = ["Alerta 1","Alerta 2"];

        return view('admin.blank')
            ->with('mensajes',$mensajes)
            ->with('alertas',$alertas)
        ;
    }

    public function testMiddleware(){
        
        return "Rol correcto";
    }
}
