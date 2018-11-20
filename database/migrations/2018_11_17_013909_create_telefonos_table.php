<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_marca')->unsigned()->nullable();
            $table->foreign('id_marca')->references('id')->on('marcas')
                  ->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('id_modello')->unsigned()->nullable();
            $table->foreign('id_modello')->references('id')->on('modellos')
                  ->onUpdate('cascade')->onDelete('cascade');
             
            $table->decimal('q1')->nullable();
            $table->decimal('q2')->nullable();
            $table->decimal('q3')->nullable();
            $table->decimal('prezzo');
            
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
        Schema::dropIfExists('telefonos');
    }
}
