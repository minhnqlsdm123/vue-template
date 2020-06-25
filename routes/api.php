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

    Route::group(['middleware'=>'auth:api'], function (){
       Route::get('logout','AuthController@logout');
    });

});
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

Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoriesController@index');
    Route::get('/all/','CategoriesController@showAllCategory');
    Route::post('/add/','CategoriesController@form');
//    Route::get('/edit/{id}','CategoriesController@edit');
    Route::post('/update/{id}','CategoriesController@update');
    Route::delete('/delete/{id}','CategoriesController@delete');
    Route::get('/search/{field}/{query}','CategoriesController@search');
});

Route::group(['prefix'=>'post'],function () {
   Route::get('/','PostController@index');
   Route::get('/all','PostController@loadAllPost');
   Route::post('/add','PostController@form');
   Route::get('/edit/{id}','PostController@edit');
   Route::post('/update/{id}','PostController@update');
   Route::delete('/delete/{id}','PostController@delete');
    Route::get('/search/{field}/{query}','PostController@search');

});
//
//Route::group(['prefix'=>'contact'],function (){
//   Route::get('/','ContactController@index');
//});
//
//Route::get('/home','HomeController@index');
//Route::get('/contact','HomeController@contact');
//
Route::get('/home','PageController@home');
Route::get('/contact_us','PageController@contact_us');
Route::get('/article','PageController@article');
Route::get('/article/{slug}','PageController@articleDetail');
Route::get('/home/category/{slug}','PageController@filterByCategory');