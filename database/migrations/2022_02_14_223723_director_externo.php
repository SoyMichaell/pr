<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DirectorExterno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_externo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dic_tipo_documento');
            $table->integer('dic_número_documento');
            $table->string('dic_nombre');
            $table->string('dic_apellido');
            $table->string('dic_telefono1');
            $table->string('dic_telefono2');
            $table->string('dic_correo_electronico');
            $table->string('dic_banco');
            $table->integer('dic_número_banco');
            $table->string('dic_departamento');
            $table->string('dic_ciudad');
            
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
        //
    }
}
