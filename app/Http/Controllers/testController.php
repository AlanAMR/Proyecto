<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resposiva;

use Illuminate\Support\Facades\Crypt;

class testController extends Controller
{
    //

    public function index(){
    	
    	$titulo = "Todas las Resposivas";
    	$responsivas = Resposiva::all();
    	
    	return view('test.responsivas')
    		->with('responsivas',$responsivas)
    		->with('titulo',$titulo)
    	;
    }

    public function encriptar(){

        $cadenaEncriptada = Crypt::encryptString('656227-013948-075482-235466-044011-397595-216414-003080');

        echo $cadenaEncriptada;
    }

    public function desencriptar(){

        $cadenaDesencriptada = Crypt::decryptString('eyJpdiI6IjNMUmc3YVdPcVkxVEk0Qks0MjBnNVE9PSIsInZhbHVlIjoiRXBadWJPYVp2enVlK2grNjIvSXNCTXRWUFNtTEY3RVhmNFpqSHRPOUFWVG40RjlrcnFZMS9ocDNUMm5BNXNBeWpLRWhZbS9NU3BMNzA4Tk4wM2E1THc9PSIsIm1hYyI6IjcxZmY2ZTZjZDVkZjIyYzdiMzg1NWQ3NjUxZjJiOTFlYTcyNTlkZmQ2NmU0NzM4MTY0YmI1OTYxZDgwNDRjZDgifQ');
        echo($cadenaDesencriptada);
    }
}
