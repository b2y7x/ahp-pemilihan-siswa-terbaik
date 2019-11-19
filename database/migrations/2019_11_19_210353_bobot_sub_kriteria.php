<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BobotSubKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_sub_kriteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_sub_kriteria_1', 5);
            $table->float('nilai');
            $table->string('kode_sub_kriteria_2', 5);

            $table->foreign('kode_sub_kriteria_1')->references('kode')->on('sub_kriteria')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_sub_kriteria_2')->references('kode')->on('sub_kriteria')
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
        Schema::dropIfExists('bobot_sub_kriteria');
    }
}
