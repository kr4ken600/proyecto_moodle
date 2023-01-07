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
        Schema::create('practicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_curso')->unsigned();
            $table->string('nombre');
            $table->text('instrucciones');
            $table->timestamps();
            
            $table->foreign('id_curso')
                  ->references('id')
                  ->on('cursos')
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
        Schema::dropIfExists('practicas');
    }
};
