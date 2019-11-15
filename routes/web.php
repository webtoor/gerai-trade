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
            Route::get('/', 'HomeController@index');
    });
    Auth::routes();


    // LOKASI
    Route::get('ajax-kota-kab/{provinsi_id}', 'LokasiController@ajaxKotaKab');
    Route::get('kecamatan/{kotaKab_id}', 'LokasiController@ajaxKecamatan');
    Route::get('kelurahan-desa/{kecamatan_id}', 'LokasiController@ajaxKelurahanDesa');


    //ADMIN PANEL
    Route::group(['prefix'=> 'admin-panel', 'as'=> 'admin-panel' . '.', 'middleware' => ['admin']], function(){

        Route::get('/', 'AdminController@index')->name('admin');
        Route::put('verifikasi', 'AdminController@updateStatusMitra')->name('verifikasi');
        Route::get('kelola-kategori', 'AdminController@kelolaKategori')->name('kelola-kategori');
        Route::post('kategori', 'KategoriController@addKategori')->name('add-kategori');
        Route::put('kategori', 'KategoriController@updateKategori')->name('update-kategori');
        Route::post('sub-kategori', 'KategoriController@addSubKategori')->name('add-subkategori');
        Route::put('sub-kategori', 'KategoriController@updateSubKategori')->name('update-subkategori');
        Route::get('produk', 'AdminProdukController@index')->name('kelola-produk');
        // TAMBAH PRODUK
        Route::get('produk/tambah-produk', 'AdminProdukController@add')->name('add-produk');
        Route::get('produk/get-subkategori/{kategori_id}', 'AdminProdukController@getAjaxSubkategori');
        Route::post('produk/tambah-produk', 'AdminProdukController@insert')->name('insert-produk');

        //EDIT PRODUK
        Route::get('produk/edit-produk/{produk_id}', 'AdminProdukController@edit')->name('edit-produk');
        Route::put('produk/edit-produk/{produk_id}', 'AdminProdukController@updateProduk')->name('update-produk');
        Route::delete('produk/edit-produk/{produk_id}', 'AdminProdukController@deleteImage')->name('delete-image');
        Route::post('produk/edit-produk/tambah-foto', 'AdminProdukController@tambahImage')->name('tambah-image');

        Route::get('member', 'AdminController@showMember')->name('showMember');
        Route::get('mitra', 'AdminController@showMitra')->name('showMitra');
        Route::post('mitra', 'AdminController@addMitra')->name('addMitra');
   });  
  

    
   // KATEGORI
Route::group(['prefix'=> 'k', 'as'=> 'k' . '.', ], function(){
            Route::get('/{slug}', 'KategoriController@showKategori')->name('showing-category');


});
// SEARCH PRODUK
Route::group(['prefix'=> 'p', 'as'=> 'p' . '.', ], function(){
        Route::get('search', 'ProdukController@search')->name('search-produk');
});

// PRODUK DETAIL
Route::get('/produk/{slug_produk}', 'HomeController@produkDetail')->name('produk-detail');

//CART
Route::post('/cart', 'CartController@index');
Route::get('/cart-shop/{produk_id}', 'CartController@cartShop');

Route::post('/cart/update','CartController@update');
Route::get('/cart-delete/{rowId}','CartController@delete');
Route::post('/cart-wishlist', 'CartController@addWishlist');
Route::get('/wishlist', 'CartController@wishlist')->name('wishlist');


//KERANJANG BELANJA
Route::get('/keranjang-belanja', 'CartController@keranjangBelanja')->name('keranjang-belanja');

Route::get('/siapa-kita', 'HomeController@siapaKita')->name('siapa-kita');
Route::get('/cerita-kita', 'HomeController@ceritaKita')->name('cerita-kita');
Route::get('/kontak-kita', 'HomeController@kontakKita')->name('kontak-kita');

// MITRA / MEMBER
Route::group(['prefix'=> 'home', 'as'=> 'home' . '.', 'middleware' => ['member']], function(){

        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['middleware' => ['onlymember']], function(){
                Route::get('daftar-mitra', 'HomeController@showDaftarMitra')->name('showDaftarMitra');
                Route::post('daftar-mitra', 'HomeController@insertDaftarMitra')->name('insertDaftarMitra');
        });  

});  
