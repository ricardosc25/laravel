<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categr = Category::orderBy('id','ASC')->paginate(5);
        return view('admin.categories.listaCategorias', ['categList' => $categr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catg = new Category($request->all());
        $catg->save();

        flash('Se ha creado una nueva categoría de forma exitosa')->success();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categ = Category::find($id);
        return view('admin.categories.edit')->with('categ', $categ);
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
        $categ = Category::find($id);
        $categ->fill($request->all()); //Obtiene todos los datos que vienen del formulario.
        // $user->name = $request->name; Esta es otra manera de obtener los datos enviados desde el formulario Seteandolos.
        $categ->save();
        flash('Actualización exitosa')->success();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        // $categ = Category::find($id);
        // $categ->delete();

        // flash('Se ha eliminado la categoria de forma exitosa')->error();
        // return redirect()->route('categories.index');
    }
}
