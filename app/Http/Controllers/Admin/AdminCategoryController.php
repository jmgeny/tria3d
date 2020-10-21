<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('haveaccess','category.index');
        $categories = Category::where('name','like',"%".$request->name."%")->orderBy('name')->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('haveaccess','category.create');
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('haveaccess','category.create');
        $request->validate([
            'name' => 'required|max:50|unique:categories,name',
            'slug' => 'required|max:50|unique:categories,slug'
        ]);

        $cat = Category::create($request->all());

        return redirect()->route('admin.category.index')->with('datos','Se guardo la nueva categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->authorize('haveaccess','category.show');
        $cat = Category::where('slug',$slug)->first();
        $editar = 1;
        return view('admin.category.show', compact('cat','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $this->authorize('haveaccess','category.edit');
        $cat = Category::where('slug',$slug)->first();
        $editar = 1;
        return view('admin.category.edit', compact('cat','editar'));

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
        $this->autorize('haveaccess','category.edit');
        $cat = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:50|unique:categories,name,'.$id,
            'slug' => 'required|max:50|unique:categories,slug,'.$id
        ]);

        $cat->fill($request->all())->save();

        return redirect()->route('admin.category.index')->with('datos','Se actualizo la categoria');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('haveaccess','category.destroy');

        $category->delete();
        return redirect()->route('admin.category.index')->with('eliminar','Se elimino la categoria');
    }
}
