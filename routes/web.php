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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::group(['middleware' => ['guest']], function(){
    Route::get('/', function () {
        return view('users.index'); 
});  
});


Route::group(['prefix'=> '/', 'as'=> '/' . '.', 'middleware' => ['auth']], function(){

    Route::get('admin-panel', 'AdminController@index')->name('admin');
    
    });  


Route::group(['prefix'=> '/', 'as'=> '/' . '.', 'middleware' => ['auth']], function(){

Route::get('home', 'HomeController@index')->name('home');

});  
