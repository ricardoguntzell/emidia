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
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/receitas', 'RecipeController@index');
    
    Route::get('/receitas/novo', 'RecipeController@create');
    Route::post('/receitas/store', 'RecipeController@store');
    
    Route::get('/receitas/{nameUrl}', 'RecipeController@show');

    Route::get('receitas/editar/{nameUrl}', 'RecipeController@edit');
    Route::put('receitas/update/{nameUrl}', 'RecipeController@update');

    Route::get('receitas/remover/{nameUrl}', 'RecipeController@destroy');
