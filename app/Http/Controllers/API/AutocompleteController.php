<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request) {

    	$palabraabuscar = $request->get('palabraabuscar'); 
    	$products = Product::where('name','like','%'.$palabraabuscar.'%')->orderBy('name')->get();
    	$resultados=[];//Creo el array resultados

    	foreach ($products as $product) 
    	{
    		
    		$encontrartexto = stristr($product->name, $palabraabuscar);//Recorto la parte de adelante
    		// stristr(haystack, needle)
    		$product->encontrar = substr($encontrartexto,0,strlen($palabraabuscar)) ;//Recorto lo que sigue
    		// substr(string, start)
    		$product->name_negrita = str_ireplace($palabraabuscar, "<b>$product->encontrar</b>", $product->name);
    		// str_ireplace(search, replace, subject)
    		$resultados[] = $product;

    	}
    	return $resultados;
    }
}
