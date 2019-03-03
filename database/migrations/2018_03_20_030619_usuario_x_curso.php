<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioXCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_x_curso', function (Blueprint $table) {             
            $table->integer('cursoId')->unsigned()->index();
            $table->foreign('cursoId')->references('id')->on('cursos')->onDelete('cascade');
            $table->integer('usuarioId')->unsigned()->index();
            $table->foreign('usuarioId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('asistencia');
            $table->datetime('fec_registro');
            $table->string('usuario_registro',20);        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_x_curso');
    }
}
