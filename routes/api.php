<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'auth'],function (){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
});

Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoriesController@index');
    Route::post('/add/','CategoriesController@form');
    Route::get('/edit/{id}','CategoriesController@edit');
    Route::post('/update/{id}','CategoriesController@update');
    Route::delete('/delete/{id}','CategoriesController@delete');
});

Route::group(['prefix'=>'post'],function () {
   Route::get('/','PostController@index');
   Route::post('/add','PostController@form');
   Route::get('/edit/{id}','PostController@edit');
   Route::post('/update/{id}','PostController@update');
   Route::delete('/delete/{id}','PostController@delete');
});

Route::group(['prefix'=>'contact'],function (){
   Route::get('/','ContactController@index');
});

Route::get('/home','HomeController@index');
Route::get('/contact','HomeController@contact');

