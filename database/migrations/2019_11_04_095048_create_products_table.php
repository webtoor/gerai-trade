<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->integer('subkategori_id')->unsigned();
            $table->string('nama_produk' , 200);
            $table->string('slug', 200);
            $table->string('deskripsi', 200);
            $table->integer('stok');
            $table->integer('berat')->unsigned();
            $table->bigInteger('harga_dasar')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->integer('rating')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->string('komentar')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('rf_kategories')->onDelete('cascade');
            $table->foreign('subkategori_id')->references('id')->on('rf_subkategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
