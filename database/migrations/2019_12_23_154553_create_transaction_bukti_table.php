<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionBuktiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_bukti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_id');
            $table->string('img_path');
            $table->integer('jumlah_transfer')->unsigned();
            $table->string('nama_bank');
            $table->string('nama_pengirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_bukti');
    }
}
