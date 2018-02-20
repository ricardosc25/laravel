<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Category;
use App\Tag;

class AsideComposer
{

    public function compose(View $view)
    {
        $categories = Category::orderBy('name','desc')->get();
        $tags = Tag::orderBy('name','desc')->get();
        $view->with('categs', $categories)
             ->with('tags',$tags);
    }


}