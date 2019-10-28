<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alamat');
            $table->integer('user_id')->unsigned();
            $table->integer('jenis_alamat_id')->unsigned();
            $table->char('provinsi_id', 2);
            $table->char('kota_kabupaten_id', 4);
            $table->char('kecamatan_id', 7);
            $table->char('kelurahan_desa_id', 10);

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jenis_alamat_id')->references('id')->on('rf_alamats')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamats');
    }
}
