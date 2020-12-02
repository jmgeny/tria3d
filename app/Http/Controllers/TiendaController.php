<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class TiendaController extends Controller
{
    public function index() {

    	$products = Product::all();

    	return view('tienda.index',compact('products'));
    }

    public function product($slug)
    {

    	$producto = Product::with('images','category')->where('slug',$slug)->firstOrFail();
        $categories = Category::orderBy('name')->get();

    	return view('tienda.product',compact('producto'));
    }
}
