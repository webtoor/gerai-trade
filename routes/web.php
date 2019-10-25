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
    Route::group(['middleware' => ['auth']], function(){
        Route::get('/', function () {
            if(Auth::user()->role->role_id == '1' || Auth::user()->role->role_id == '2'){
                return redirect('home');
            }elseif(Auth::user()->role->role_id == '3'){
                return redirect('admin-panel');
            }else{
                return view('auth.login');
            }
        }); 
    }); 





    Route::group(['prefix'=> 'admin-panel', 'as'=> 'admin-panel' . '.', 'middleware' => ['auth']], function(){

        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('member', 'AdminController@showMember')->name('showMember');

        Route::get('mitra', 'AdminController@showMitra')->name('showMitra');
    
        
        });  
  

    
   


Route::group(['prefix'=> '/', 'as'=> '/' . '.', 'middleware' => ['auth']], function(){

Route::get('home', 'HomeController@index')->name('home');

});  
