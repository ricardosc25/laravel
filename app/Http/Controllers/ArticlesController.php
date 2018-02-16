<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticlesRequest;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();
        $image->each(function($image){
            $image->article;
        });
        $article = Article::orderBy('id', 'DESC')->paginate(5);
        return view('admin.articles.index')
              ->with('article', $article)
              ->with('image', $image);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.articles.create')
             ->with('categories', $categories)
             ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);
        // sync: rellena la tabla pibote article_tag

        if ($request->file('image')) 
        {
            $file = $request->file('image');
            $name = 'laravel_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\Image\Articles/'; /*ruta para almacenar la imagen*/
            $file->move($path, $name); /*Movemos la imagen a la ruta path y como segundo parametro le pasamos el nombre que tendrá la imagen.*/

            $image = new Image();
            $image->name = $name;
            $image->article()->associate($article);
            $image->save();
        }

        flash('Se ha creado el articulo de forma exitosa')->success();
        return redirect()->route('admin.articles.articulos');
        
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
    {   $art = Article::find($id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.articles.edit')
             ->with('article', $art)
             ->with('categories', $categories)
             ->with('tags', $tags);       
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
        $art = Article::find($id);
        $art->fill($request->all());
        $art->save();
        $art->tags()->sync($request->tags);

          if ($request->file('image')) 
        {
            $file = $request->file('image');
            $name = 'laravel_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\Image\Articles/'; /*ruta para almacenar la imagen*/
            $file->move($path, $name); /*Movemos la imagen a la ruta path y como segundo parametro le pasamos el nombre que tendrá la imagen.*/

            $image = new Image();
            $image->name = $name;
            $image->article()->associate($article);
            $image->save();
        }

        flash('Actualización exitosa')->success();
        return redirect()->route('admin.articles.articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        flash('Se ha eliminado un articulo de forma exitosa')->error();
        return redirect()->route('admin.articles.articulos');
    }

    // Vista de los articulos interno (Admin, Autor y consultor)
    public function articulos()
    {
        $article = Article::orderBy('id', 'DESC')->paginate(5);
        return view('admin.articles.articulos')->with('article', $article);
    }
}
