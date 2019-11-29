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
            $table->string('nama_penerima');
            $table->string('nohp_penerima');
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan_desa');

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
