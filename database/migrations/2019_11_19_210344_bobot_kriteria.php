<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BobotKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kriteria_1', 5);
            $table->float('nilai');
            $table->string('kode_kriteria_2', 5);

            $table->foreign('kode_kriteria_1')->references('kode')->on('kriteria')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_kriteria_2')->references('kode')->on('kriteria')
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
        Schema::dropIfExists('bobot_kriteria');
    }
}
