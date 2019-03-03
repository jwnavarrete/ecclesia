<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserCatalogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ciudad')->nullable();            
            $table->string('pais')->nullable();            
            //$table->string('grupo')->nullable();             
            $table->string('username')->unique()->nullable();
            $table->text('direccion')->nullable();            
            $table->text('iglesia')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array('ciudad', 'pais','username','direccion','iglesia'));
        });
    }
}
