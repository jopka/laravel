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

Route::resource('/','IndexController',[
                                        'only' =>['index'],
                                        'names' =>['index' =>'home']
                                        ]);
/*
Route::group(['prefix' => 'comments'], function(){
    Route::resource('/','CommentsController');
});
Route::group(['prefix' => 'rooms'], function(){
    Route::resource('/','RoomsController');
});*/
Route::resource('/comments','CommentsController');
Route::resource('/rooms','RoomsController');

                                                                                                                        