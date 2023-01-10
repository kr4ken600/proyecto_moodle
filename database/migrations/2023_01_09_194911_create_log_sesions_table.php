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
        Schema::create('log_sesions', function (Blueprint $table) {
            $table->string('id');
            $table->integer('id_alumno')->unsigned();
            $table->dateTime('entrada')->nullable();
            $table->dateTime('salida')->nullable();

            $table->foreign('id_alumno')
                  ->references('id')
                  ->on('alumnos')
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
        Schema::dropIfExists('log_sesions');
    }
};
