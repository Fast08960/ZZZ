<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_basicos");
            $table->string("empresa");
            $table->string("cargo");
            $table->date("fecha_inicio");
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
        Schema::dropIfExists('work_jobs');
    }
}
