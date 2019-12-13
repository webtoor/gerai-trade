<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pesan_id')->unsigned();
            $table->text('pesan');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('pesan_id')->references('id')->on('pesans')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan_details');
    }
}
