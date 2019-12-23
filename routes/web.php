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

Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        echo 'storage-link complete';
});
Route::get('/update-app', function () {
        Artisan::call('dump-autoload');
        echo 'dump-autoload complete';
});
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::group(['middleware' => ['guest']], function(){
            Route::get('/', 'HomeController@index');
    });
    Auth::routes();


    // LOKASI
    Route::get('ajax-kota-kab/{provinsi_id}', 'LokasiController@ajaxKotaKab');
    Route::get('kecamatan/{kotaKab_id}', 'LokasiController@ajaxKecamatan');
    Route::get('kelurahan-desa/{kecamatan_id}', 'LokasiController@ajaxKelurahanDesa');

    Route::get('show-alamat/{city_id}/{kecamatan_id}',function($city_id, $kecamatan_id){
	return showAlamat($city_id, $kecamatan_id);
    });
    Route::get('all-city/{province_id}',function($province_id){
	return allcity($province_id);
    });
    Route::get('city/{id}',function($id){
	return city($id);
    });
    Route::get('kecamatans/{city_id}',function($city_id){
	return kecamatan($city_id);
    });

    //ADMIN PANEL
    Route::group(['prefix'=> 'admin-panel', 'as'=> 'admin-panel' . '.', 'middleware' => ['admin']], function(){

        Route::get('/', 'AdminController@index')->name('admin');
        Route::put('verifikasi', 'AdminController@updateStatusMitra')->name('verifikasi');
        Route::put('verifikasi-cerita', 'AdminController@verifikasiCerita')->name('verifikasiCerita');
        Route::put('verifikasi-produk', 'AdminController@verifikasiProduk')->name('verifikasiProduk');
        Route::get('pesan', 'AdminController@getPesan')->name('getPesan');
        Route::get('pesan/{pesan_id}', 'AdminController@getPesanById')->name('getPesanById');
        Route::post('pesan', 'AdminController@postAjaxPesan')->name('postAjaxPesan');

        //KATEGORI 
        Route::get('kelola-kategori', 'AdminController@kelolaKategori')->name('kelola-kategori');
        Route::post('kategori', 'KategoriController@addKategori')->name('add-kategori');
        Route::put('kategori', 'KategoriController@updateKategori')->name('update-kategori');
        Route::post('sub-kategori', 'KategoriController@addSubKategori')->name('add-subkategori');
        Route::put('sub-kategori', 'KategoriController@updateSubKategori')->name('update-subkategori');
        Route::get('produk', 'AdminProdukController@index')->name('kelola-produk');

        // PRODUK
        Route::get('produk/tambah-produk', 'AdminProdukController@add')->name('add-produk');
        Route::get('produk/get-subkategori/{kategori_id}', 'AdminProdukController@getAjaxSubkategori');
        Route::post('produk/tambah-produk', 'AdminProdukController@insert')->name('insert-produk');
        Route::delete('produk/delete-produk/{produk_id}', 'AdminProdukController@deleteProduk')->name('delete-produk');

        //EDIT PRODUK
        Route::get('produk/edit-produk/{produk_id}', 'AdminProdukController@edit')->name('edit-produk');
        Route::put('produk/edit-produk/{produk_id}', 'AdminProdukController@updateProduk')->name('update-produk');
        Route::delete('produk/edit-produk/{produk_id}', 'AdminProdukController@deleteImage')->name('delete-image');
        Route::post('produk/edit-produk/tambah-foto', 'AdminProdukController@tambahImage')->name('tambah-image');

        // BLOGS
        Route::get('blog', 'AdminBlogController@index')->name('kelola-blog');
        Route::get('blog/tambah-blog', 'AdminBlogController@addBlog')->name('add-blog');
        Route::post('blog/tambah-blog', 'AdminBlogController@insert')->name('insert-blog');
        Route::get('blog/edit-blog/{blog_id}', 'AdminBlogController@edit')->name('edit-blog');
        Route::put('blog/edit-blog/{blog_id}', 'AdminBlogController@updateBlog')->name('update-blog');
        Route::put('blog/edit-banner', 'AdminBlogController@updateImageBlog')->name('update-image-blog');
        Route::delete('blog/delete-blog/{blog_id}', 'AdminBlogController@deleteBlog')->name('delete-blog');

        // USER
        Route::get('member', 'AdminController@showMember')->name('showMember');
        Route::get('hub', 'AdminController@showMitra')->name('showMitra');
        Route::post('hub', 'AdminController@addMitra')->name('addMitra');
        Route::get('edit-hub/{user_id}', 'AdminController@editHub')->name('editHub');
        Route::put('update-hub/{hub_id}', 'AdminController@updateHub')->name('updateHub');

        Route::delete('mitra/{user_id}', 'AdminController@deleteMitra')->name('deleteMitra');

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
Route::get('/produk/pagination/{produk_id}','HomeController@produkDetailPagination');

//CART
Route::group(['middleware' => 'member'], function(){
    Route::get('/pengaturan', 'UserController@index')->name('index-pengaturan');
    Route::post('/pengaturan-alamat', 'UserController@postAlamat')->name('post-alamat');
    Route::put('/pengaturan-alamat/ubah', 'UserController@ubahAlamat')->name('ubah-alamat');

    Route::delete('/pengaturan-alamat/delete/{alamat_id}', 'UserController@deleteAlamat')->name('delete-alamat');

    Route::post('/cart', 'CartController@index');
    Route::get('/cart-shop/{produk_id}', 'CartController@cartShop');
    Route::get('/cart-wishlist/{produk_id}', 'CartController@cartWishlist');

    Route::post('/cart/update', 'CartController@update');
    Route::get('/cart-delete/{rowId}', 'CartController@delete');
    Route::post('/cart-wishlist', 'CartController@addWishlist');
    Route::get('/wishlist', 'CartController@wishlist')->name('wishlist');
    Route::get('/delete-wishlist/{rowId}', 'CartController@deleteWishlist');

    //KERANJANG BELANJA
    Route::get('/keranjang-belanja', 'CartController@keranjangBelanja')->name('keranjang-belanja');
    Route::get('/checkout', 'CartController@checkout')->name('checkout');
   
    Route::post('cek-ongkir','CartController@cekOngkir');

});
Route::get('/single/{slug}', 'BlogController@singleBlog')->name('single-blog');
Route::get('/siapa-kita', 'HomeController@siapaKita')->name('siapa-kita');
Route::get('/cerita-kita', 'BlogController@ceritaKita')->name('cerita-kita');
Route::get('/kontak-kita', 'HomeController@kontakKita')->name('kontak-kita');

// MITRA / MEMBER
Route::group(['prefix'=> 'home', 'as'=> 'home' . '.', 'middleware' => ['member']], function(){

        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['middleware' => ['onlymember']], function(){
                Route::get('daftar-mitra', 'HomeController@showDaftarMitra')->name('showDaftarMitra');
                Route::post('daftar-mitra', 'HomeController@insertDaftarMitra')->name('insertDaftarMitra');
                Route::get('chat', 'UserController@getChat')->name('getChat');
                Route::post('chat', 'UserController@ajaxPostChat')->name('ajaxPostChat');
                Route::post('post-checkout', 'UserOrderController@postCheckout')->name('ajaxPostCheckout');
                Route::get('daftar-transaksi', 'UserOrderController@getWaitPayment')->name('getWaitPayment');
                Route::post('daftar-transaksi-batalkan', 'UserOrderController@transaksiBatalkan')->name('transaksiBatalkan');
                Route::post('daftar-transaksi-batalkan', 'UserOrderController@transaksiBatalkan')->name('transaksiBatalkan');
                Route::post('daftar-transaksi-unggah', 'UserOrderController@transaksiUnggah')->name('transaksiUnggah');

        });     
        Route::group(['middleware' => ['mitra']], function(){
            // PRODUK
                Route::get('produk-saya', 'HubController@index')->name('produk-saya');
                Route::get('tambah-produk-saya', 'HubController@tambahProduk')->name('tambah-produk');
                Route::get('produk-saya/{kategori_id}', 'HubController@getAjaxSubkategori');
                Route::post('tambah-produk-saya', 'HubController@insertProduk')->name('insert-produk');
                Route::get('edit-produk-saya/{produk_id}', 'HubController@editProduk')->name('edit-produk-saya');
                Route::put('edit-produk-saya/{produk_id}', 'HubController@updateProduk')->name('update-produk-saya');
                Route::post('edit-produk-saya/tambah-foto', 'HubController@tambahImage')->name('tambah-image');
                Route::delete('delete-image/{produk_id}', 'HubController@deleteImage')->name('delete-image');
                Route::delete('produk-saya/{produk_id}', 'HubController@deleteProduk')->name('delete-produk-saya');

              // CERITA SAYA  

                Route::get('cerita-saya', 'HubController@getCeritaSaya')->name('cerita-saya');
                Route::get('tambah-cerita-saya', 'HubController@tambahCerita')->name('tambah-cerita');
                Route::post('tambah-cerita-saya', 'HubController@insertCerita')->name('insert-cerita');
                Route::get('edit-cerita-saya/{cerita_id}', 'HubController@editCerita')->name('edit-cerita');
                Route::put('update-cerita-saya/{cerita_id}', 'HubController@updateCerita')->name('update-cerita');
                Route::put('update-image-cerita', 'HubController@updateImageCerita')->name('update-image');
                Route::delete('cerita-saya/{cerita_id}', 'HubController@deleteCerita')->name('delete-cerita');
                Route::get('/pengaturan', 'HubController@getPengaturan')->name('index-pengaturan');
                Route::put('/pengaturan-alamat/ubah', 'HubController@ubahAlamat')->name('ubah-alamat');

    });  

});  
