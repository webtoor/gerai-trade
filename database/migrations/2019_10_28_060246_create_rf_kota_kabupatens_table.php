<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfKotaKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rf_kota_kabupatens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provinsi_id')->unsigned();
            $table->string('kota_kabupaten');
            $table->foreign('provinsi_id')->references('id')->on('rf_provinsies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rf_kota_kabupatens');
    }
}
