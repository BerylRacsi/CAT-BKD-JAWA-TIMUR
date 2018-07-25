<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAturansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_id')->reference('id')->on('jenis');
            $table->integer('bidang_id')->reference('id')->on('bidang');
            $table->integer('subbidang_id')->reference('id')->on('subbidang');
            $table->integer('kesulitan_id')->reference('id')->on('kesulitan');
            $table->integer('jumlah_soal')->nullable();
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
        Schema::dropIfExists('aturans');
    }
}
