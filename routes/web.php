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
    Route::get('kelurahan-desa/{kecamatan_id}', 'LokasiController@ajaxKelurahanDesa');

    Route::group(['prefix'=> 'admin-panel', 'as'=> 'admin-panel' . '.', 'middleware' => ['admin']], function(){

        Route::get('/', 'AdminController@index')->name('admin');
        Route::put('verifikasi', 'AdminController@updateStatusMitra')->name('verifikasi');
        Route::get('kelola-kategori', 'AdminController@kelolaKategori')->name('kelola-kategori');
        Route::post('kategori', 'KategoriController@addKategori')->name('add-kategori');

        Route::get('member', 'AdminController@showMember')->name('showMember');

        Route::get('mitra', 'AdminController@showMitra')->name('showMitra');
        Route::post('mitra', 'AdminController@addMitra')->name('addMitra');


        
        });  
  

    
   


Route::group(['prefix'=> 'home', 'as'=> 'home' . '.', 'middleware' => ['member']], function(){

Route::get('/', 'HomeController@index')->name('home');
Route::get('daftar-mitra', 'HomeController@showDaftarMitra')->name('showDaftarMitra');
Route::post('daftar-mitra', 'HomeController@insertDaftarMitra')->name('insertDaftarMitra');



});  
