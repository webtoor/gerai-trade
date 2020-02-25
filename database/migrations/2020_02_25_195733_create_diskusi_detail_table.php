<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskusiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->longText('pesan');
            $table->integer('diskusi_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('diskusi_id')->references('id')->on('diskusi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskusi_detail');
    }
}
