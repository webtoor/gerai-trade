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
    Route::group(['middleware' => ['guest']], function(){
        Route::get('/', function () {
            return view('users.index'); 
        });  
    });
    Auth::routes();

    Route::get('ajax-kota-kab/{provinsi_id}', 'LokasiController@ajaxKotaKab');
    Route::get('kecamatan/{kotaKab_id}', 'LokasiController@ajaxKecamatan');
    Route::get('kelurahan/{kecamatan_id}', 'LokasiController@ajaxKelurahanDesa');

    Route::group(['prefix'=> 'admin-panel', 'as'=> 'admin-panel' . '.', 'middleware' => ['admin']], function(){

        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('member', 'AdminController@showMember')->name('showMember');

        Route::get('mitra', 'AdminController@showMitra')->name('showMitra');
       

        
        });  
  

    
   


Route::group(['prefix'=> 'home', 'as'=> 'home' . '.', 'middleware' => ['member']], function(){

Route::get('/', 'HomeController@index')->name('home');

});  
