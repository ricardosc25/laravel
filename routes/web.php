<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// RUTAS PARA EL FRONTEND
Route::get('/', [
    'uses' => 'FrontController@index',
     'as' => 'front.index'
]);



Route::get('article/{id}', [
	 'uses' => 'TestController@article',
	 'as' => 'listArticles'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::resource('users','UsersController');
    Route::get('admin.users/{id}', [
    	'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
    ]);

    Route::resource('categories','CategoriesController');
    Route::get('admin.categories/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    Route::resource('tags','TagsController');
    Route::get('admin.tags/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'admin.tags.destroy'
    ]);

    Route::get('articles/articulos',[
        'as' => 'admin.articles.articulos',
        'uses' => 'ArticlesController@articulos'
        ]);
    
    Route::resource('articles','ArticlesController');
    Route::get('admin.articles/{id}', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'admin.articles.destroy'
    ]);
    
   
});

Auth::routes();

