<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TestController extends Controller
{
    public function article($id){

    		$art = Article::find($id);
    		$art->title;
    		$art->category();
    		$art->user();

    		return view('child', ['prueba' => $art]);

    }
}
