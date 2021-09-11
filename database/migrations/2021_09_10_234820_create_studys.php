<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_basicos");
            $table->string("titulo");
            $table->string("entidad_educativa");
            $table->date("fecha_terminacion")->nullable();
            $table->timestamps();

            $table->foreign('id_basicos')->references('id')->on('basic_dates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studys');
    }
}
