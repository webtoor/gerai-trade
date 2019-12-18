<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->integer('user_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('produk_id')->unsigned();
            $table->integer('alamat_id')->unsigned();
            $table->string('ekspedisi');
            $table->string('no_resi');
            $table->integer('qty')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->bigInteger('subtotal')->unsigned();
            $table->timestamps();


            $table->foreign('hub_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('rf_status')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
