<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);     
            $table->string('tutor',100);            
            $table->text('detalle');            
            $table->date('fec_inicio');            
            $table->date('fec_fin');            
            $table->integer('capacidad');            
            $table->boolean('estado')->default(true);
            $table->string('foto')->default('curso.jpg');
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
        Schema::dropIfExists('cursos');
    }
}
