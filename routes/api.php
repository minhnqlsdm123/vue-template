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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoriesController@index');
    Route::post('/add/','CategoriesController@form');
    Route::get('/edit/{id}','CategoriesController@edit');
    Route::post('/update/{id}','CategoriesController@update');
    Route::delete('/delete/{id}','CategoriesController@delete');
});

