<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porducts = Product::all();

        return $porducts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        if (Product::where('slug',$slug)->first()) {
            return 'Slug Existe';
        }
        else
        {
            return 'Slug Disponible';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function eliminarImagen($id)
    {
       $imagen = Image::find($id); // Capturo la imagen
       $archivo = $imagen->url; // Captura la ruta en el servidor
       $archivo = substr($archivo,1); // se saco el primer caracter a la ruta
       $eliminar = File::delete($archivo);  // Elimino la imagen del servidor
       $imagen->delete();                   // Elimino la imagen del registro de la tabla

       return 'Se elimino el id: '.$id.' De manera:  '.$eliminar ;
    }
}
