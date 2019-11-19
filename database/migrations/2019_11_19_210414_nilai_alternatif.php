<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NilaiAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn', 10);
            $table->string('kode_sub_kriteria', 5);

            $table->foreign('nisn')->references('nisn')->on('alternatif')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_sub_kriteria')->references('kode')->on('sub_kriteria')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternatif');
    }
}
