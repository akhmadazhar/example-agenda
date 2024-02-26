<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_agenda');
            $table->foreign('id_agenda')->references('id')->on('agendas');
            $table->string('pegawai_before');
            $table->string('pegawai_after');
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('alurs');
    }
};