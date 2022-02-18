<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramasPlanEstudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_plan_estudio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pp_id_programa');
            $table->string('pp_nombre');
            $table->integer('pp_creditos');
            $table->integer('pp_asignaturas');
            $table->integer('pp_estado');
            
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
