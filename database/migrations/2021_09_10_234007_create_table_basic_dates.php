<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBasicDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->unique();
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->bigInteger("telefono");
            $table->text("direccion");
            $table->string("correo");
            $table->enum("genero", ["mujer", "hombre"]);
            $table->enum("nacionalidad", ["colombiano", "extranjero"]);
            $table->enum("estado_civil", ["soltero", "casado", "separado", "viudo"]);
            $table->date("fecha_nacimiento");
            $table->string("rh");
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
        Schema::dropIfExists('basic_dates');
    }
}
