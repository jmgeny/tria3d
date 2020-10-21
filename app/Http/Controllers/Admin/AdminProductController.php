<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\File;
use App\Image;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('haveaccess','product.index');

        $products = Product::with('images','category')->withCount('images')->where('name','like',"%".$request->name."%")->orderBy('name')->paginate(5);

        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('haveaccess','product.create');

        $estados = $this->estados_productos();
        $categories = Category::orderBy('name')->get();
        return view('admin.product.create',compact('categories','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('haveaccess','product.store');

        $request->validate([
            'name'       => 'required|unique:products,name',
            'slug'       => 'required|unique:products,slug',
            'imagenes.*' => 'image|mimes:jpeg,jpg,gif,svg,png|max:2048'
        ]);

        $urlImagenes = [];

        if ($request->hasFile('imagenes')) {

            foreach ($request->imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/img';

                $imagen->move($ruta,$nombre);

                $urlImagenes[]['url'] = '/img/'.$nombre;
            }
        }

        $pro = new Product;

        $pro->name = $request->name;                            
        $pro->slug = $request->slug; 
        $pro->category_id = $request->category_id; 
        $pro->cantidad = $request->cantidad; 
        $pro->precio_actual = $request->precio_actual; 
        $pro->precio_anterior = $request->precio_anterior; 
        $pro->porcentaje_descuento = $request->porcentaje_descuento; 
        $pro->descripcion_corta = $request->descripcion_corta; 
        $pro->descripcion_larga = $request->descripcion_larga; 
        $pro->especificaciones = $request->especificaciones; 
        $pro->datos_de_interes = $request->datos_de_interes; 
        $pro->visitas = $request->visitas; 
        $pro->ventas = $request->ventas; 
        $pro->estado = $request->estado; 

        $pro->activo = ($request->activo)? 'si': 'no';
        $pro->sliderprincipal = ($request->sliderprincipal)? 'si': 'no';
        $pro->save();

        $pro->images()->createMany($urlImagenes);

        // return $pro;
        return redirect()->route('admin.product.index')->with('datos','Se guardo el Producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->authorize('haveaccess','product.show');

        $product = Product::with('images','category')->where('slug',$slug)->firstOrFail();
        $categories = Category::orderBy('name')->get();

        return view('admin.product.show',compact('categories','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $this->authorize('haveaccess','product.edit');

        $product = Product::with('images','category')->where('slug',$slug)->firstOrFail();
        $categories = Category::orderBy('name')->get();
        $estados = $this->estados_productos();

        return view('admin.product.edit',compact('categories','product','estados'));
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
        $this->authorize('haveaccess','product.edit');

        $request->validate([
            'name'       => 'required|unique:products,name,'.$id,
            'slug'       => 'required|unique:products,slug,'.$id,
            'imagenes.*' => 'image|mimes:jpeg,jpg,gif,svg,png|max:2048'
        ]);

        $urlImagenes = [];

        if ($request->hasFile('imagenes')) {

            foreach ($request->imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/img';

                $imagen->move($ruta,$nombre);

                $urlImagenes[]['url'] = '/img/'.$nombre;
            }
        }

        $product = Product::findOrFail($id);

        $product->name = $request->name;                            
        $product->slug = $request->slug; 
        $product->category_id = $request->category_id; 
        $product->cantidad = $request->cantidad; 
        $product->precio_actual = $request->precio_actual; 
        $product->precio_anterior = $request->precio_anterior; 
        $product->porcentaje_descuento = $request->porcentaje_descuento; 
        $product->descripcion_corta = $request->descripcion_corta; 
        $product->descripcion_larga = $request->descripcion_larga; 
        $product->especificaciones = $request->especificaciones; 
        $product->datos_de_interes = $request->datos_de_interes; 
        $product->visitas = $request->visitas; 
        $product->ventas = $request->ventas; 
        $product->estado = $request->estado; 

        $product->activo = ($request->activo)? 'si': 'no';
        $product->sliderprincipal = ($request->sliderprincipal)? 'si': 'no';
        $product->save();

        $product->images()->createMany($urlImagenes);

        // return $pro;
        return redirect()->route('admin.product.edit',$product->slug)->with('datos','Se actualizo el Producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','product.destroy');
        $product = Product::with('images')->find($id);

        foreach ($product->images as $image) {

            $archivo = substr($image->url,1);
            File::delete($archivo);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('eliminar','Se elimino el Producto');
    }

    public function estados_productos(){

        return  ['Nuevo','En Oferta','Discontinuo','Popular','Editado'];

    }
}
