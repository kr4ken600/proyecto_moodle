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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_alumno')->unsigned();
            $table->integer('id_practica')->unsigned();
            $table->string('documento');
            $table->timestamps();

            $table->foreign('id_alumno')
                  ->references('id')
                  ->on('alumnos')
                  ->onDelete('CASCADE');

            $table->foreign('id_practica')
                  ->references('id')
                  ->on('practicas')
                  ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
};
