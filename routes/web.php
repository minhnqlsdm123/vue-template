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
Route::get('/login','HomeController@admin_auth');





//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['prefix'=>'auth'],function (){
//    Route::post('register','AuthController@register');
//    Route::post('login','AuthController@login');
//Route::get('/allpost','PageController@home');
//
//    Route::group(['middleware'=>'auth:api'], function (){
//        Route::get('logout','AuthController@logout');
//    });
//
//});
//Route::group(['prefix'=>'user'],function (){
//    Route::group(['middleware'=>'auth:api'],function (){
//        Route::post('edit-category',function (){
//            return response()->json([
//                'message'=>'Admin Access',
//                'status_code'=>200
//            ],200);
//        })->middleware('scope:do_anything');
//        Route::post('create-category',function (){
//            return response()->json([
//                'message'=>'Everyone Access',
//                'status_code'=>200
//            ],200);
//        })->middleware('scope:do_anything,can_create');
//    });
//});
//
//Route::group(['prefix'=>'category'],function(){
//    Route::get('/','CategoriesController@index');
//    Route::post('/add/','CategoriesController@form');
//    Route::get('/edit/{id}','CategoriesController@edit');
//    Route::post('/update/{id}','CategoriesController@update');
//    Route::delete('/delete/{id}','CategoriesController@delete');
//});
//
//Route::group(['prefix'=>'post'],function () {
//    Route::get('/','PostController@index');
//    Route::post('/add','PostController@form');
//    Route::get('/edit/{id}','PostController@edit');
//    Route::post('/update/{id}','PostController@update');
//    Route::delete('/delete/{id}','PostController@delete');
//});
//
//Route::group(['prefix'=>'contact'],function (){
//    Route::get('/','ContactController@index');
//});

Route::get('/home','PageController@home');
Route::get('/contact_us','PageController@contact_us');
Route::get('/article','PageController@article');
