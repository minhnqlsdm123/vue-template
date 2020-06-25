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


//Route::get('{any}', function () {
//    return views('app');
//})->where('any','.*');
Route::get('/','HomeController@index');
Route::group(['prefix'=>'admin'],function (){
    Route::get('/','HomeController@admin');
});


Route::get('/home','PageController@home');
Route::get('/contact_us','PageController@contact_us');
Route::get('/article','PageController@article');
Route::get('/home/category/{slug}','PageController@filterByCategory');