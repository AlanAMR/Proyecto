<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Laptops;
use App\Celulares;
use App\Chips;

class insumosController extends Controller
{
    public function all(){
    	$laptops = Laptops::all();
    	$celulares = Celulares::all();
    	$chips = Chips::all();
    	
    	return response()->json([
    		'Laptops' => $laptops,
    		'Celulares' => $celulares, 
    		'Chips' => $chips
    	]);
    }

    public function laptops(){
    	$laptops = Laptops::all();
    	return response()->json(['Laptops' => $laptops]);
    }

    public function celulares(){
    	$celulares = Celulares::all();
    	return response()->json(['Celulares' => $celulares]);
    }

    public function chips(){
    	$chips = Chips::all();
    	return response()->json(['Chips' => $chips]);
    }
}
