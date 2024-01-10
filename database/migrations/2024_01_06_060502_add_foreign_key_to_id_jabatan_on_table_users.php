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
        Schema::table('users', function (Blueprint $table) {
            // Menetapkan nilai default yang sesuai dengan nilai di tabel referensi
            // $table->unsignedBigInteger('id_jabatan'); // Ganti 1 dengan nilai yang sesuai dari tabel 'jabatan'

            $table->foreign('id_jabatan')->references('id')->on('jabatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_jabatan_foreign');
        });
    }
};