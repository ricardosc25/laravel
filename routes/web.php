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

Route::get('/', function () {
    return view('welcome');
});

Route::get('article/{id}', [
	 'uses' => 'TestController@article',
	 'as' => 'listArticles'
]);

// Route::get('blade', function () {
//     return view('child');
// });

Route::group(['prefix' => 'admin'], function() {
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
    	
});
