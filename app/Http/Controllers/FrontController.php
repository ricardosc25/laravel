<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index()
    {
    	$articles = Article::Where('status_public', 1)->orderBy('id', 'DESC')->paginate(5);
    	$articles->each(function($articles){
    		$articles->category;
    		$articles->images;
    	});

    	return view('front.index')
    			->with('articles',$articles);
    	
    }

    public function searchCategory($name)
    {
        $category = Category::SearchCategory($name)->first();
        $articles = $category->articles()->where('status_public',1)->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        
        return view('front.index')
                ->with('articles',$articles); 
    }


    public function searchTag($name)
    {
        $tag = Tag::SearchTag($name)->first();
        $articles = $tag->articles()->where('status_public',1)->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        
        return view('front.index')
                ->with('articles',$articles); 
    }

    public function viewArticle($slug)
    {
        $article = Article::findBySlug($slug);
        return view('front.article')
            ->with('article',$article);
    }
}
