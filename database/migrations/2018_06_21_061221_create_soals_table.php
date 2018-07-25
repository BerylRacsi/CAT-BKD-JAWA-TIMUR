<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->integer('jenis_id')->reference('id')->on('jenis');
            $table->string('bidang_id')->reference('id')->on('bidang');
            $table->string('subbidang_id')->reference('id')->on('subbidang');
            $table->string('kesulitan_id')->reference('id')->on('kesulitan');
            $table->string('opsi1');
            $table->string('opsi2');
            $table->string('opsi3');
            $table->string('opsi4');
            $table->string('opsi5');
            $table->string('jawaban');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('soals');
    }
}
