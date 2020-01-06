<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hub_id')->unsigned();
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->timestamps();

            $table->foreign('hub_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hub_bank');
    }
}
