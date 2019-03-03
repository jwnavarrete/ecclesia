<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIglesiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iglesia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);            
            $table->string('direccion',200);            
            $table->string('telefonos');            
            $table->integer('Pastor');            
            $table->integer('Tesorero');            
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
        Schema::dropIfExists('iglesia');
    }
}
