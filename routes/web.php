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

Route::get('article/{id}', [
	 'uses' => 'TestController@article',
	 'as' => 'listArticles'
]);

route::get('/','ArticlesController@index');

// Route::get('blade', function () {
//     return view('child');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::resource('users','UsersController');
    route::get('admin.users/{id}', [
    	'uses' => 'UsersController@destroy',
		'as' => 'admin.users.destroy'
    ]);

    route::resource('categories','CategoriesController');
    route::get('admin.categories/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    route::resource('tags','TagsController');
    route::get('admin.tags/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'admin.tags.destroy'
    ]);

     route::resource('articles','ArticlesController');
});

Auth::routes();

