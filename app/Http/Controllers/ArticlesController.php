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
use Image as Imagen; //Libreria

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
        $article = Article::orderBy('id', 'DESC')->paginate(10);
        $article->each(function($article){
            $article->images;
        });
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
        if ($request->input('status_public') == 1) {
            $article->status_public = 1;
        }
        else{
            $article->status_public = 0;
        }
        
        $article->save();

        $article->tags()->sync($request->tags);
        //sync: rellena la tabla pibote article_tag

        if ($request->file('image')) 
        {   
            $image = $request->file('image'); //Obtenemos la imagen
            $name = time() . '.' . $image->getClientOriginalExtension(); //Nombre que le vamos a asignar a la imagen
            $path = directoryImages().'/'.$name; //ruta para almacenar la imagen
            $img = Imagen::make($image);
            $altura = $img->height();
            $ancho = $img->width();
            if($ancho > 600 && $altura > 360){
                $img->fit(600, 360, function ($constraint) {
                $constraint->upsize();
                });
            }elseif ($ancho < 600 && $altura > 360) {
                $img->resizeCanvas(600, 360, 'center', false, 'fff');
            }
            elseif ($ancho < 600 && $altura < 360) {
                $img->resizeCanvas(600, 360, 'center', false, 'fff');
            }
            
            $img->save($path);
            $img->destroy();
                            
            $image = new Image();
            $image->name = $path;
            $image->article()->associate($article);
            $image->save();
        }

        flash('Se ha creado el articulo de forma exitosa')->success();
        return redirect()->route('articles.index');
        
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

        $art = Article::find($id);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        $image = Image::where('article_id',$id)->first();
        return view('admin.articles.edit')
             ->with('article', $art)
             ->with('imagen', $image)
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

        $article = Article::find($id);
        $article->fill($request->all());
        if ($request->input('status_public') == 1) {
            $article->status_public = 1;
        }
        else{
            $article->status_public = 0;
        }
        $article->save();
        $article->tags()->sync($request->tags);
      

        //Validamos si existe una imagen
        if(!is_null($request->file('image')))
        {
            //**** ELIMINAMOS LA IMAGEN ANTERIOR ****//

            //Buscamos la ruta de la imagen
            $imgAnterior = Image::where('article_id',$id)->first();
            //Guardo la ruta de la imagen
            $rutaImgAnterior = $imgAnterior->name;
            //Valido si la imagen existe en la ruta
            if(file_exists($rutaImgAnterior)){
                //Eliminamos la imagen
                $delete = unlink($rutaImgAnterior);
            }

            //**** FIN DE ELIMINAR IMAGEN ANTERIOR****//

            //Obtenemos la imagen
            $image = $request->file('image');
            //Nombre que le vamos a asignar a la imagen
            $name = time() . '.' . $image->getClientOriginalExtension();
            //ruta para almacenar la imagen
            $path = directoryImages().'/'.$name;
            //Creamos un nuevo recurso de la librería Image
            $img = Imagen::make($image);
            //Validamos los tamaños
            $altura = $img->height();
            $ancho = $img->width();
            if($ancho > 600 && $altura > 360){
                $img->fit(600, 360, function ($constraint) {
                $constraint->upsize();
                });
            }elseif ($ancho < 600 && $altura > 360) {
                $img->resizeCanvas(600, 360, 'center', false, 'fff');
            }
            elseif ($ancho < 600 && $altura < 360) {
                $img->resizeCanvas(600, 360, 'center', false, 'fff');
            }
            //Guardamos la imagen en la ruta
            $img->save($path);
            //Liberar memoria de la instancia de la librería Image
            $img->destroy();
                            
            $image = Image::where('article_id',$id)->first();
            $image->name = $path;
            $image->article()->associate($article);
            $image->save();
        }

        flash('Actualización exitosa')->success();
        return redirect()->route('articles.index');
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
        return redirect()->route('articles.index');
    }


}
