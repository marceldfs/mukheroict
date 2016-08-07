<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaEdmReformadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_edm_reformados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->date('data_reforma');
            $table->integer('direccao')->length(5)->index();
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
        Schema::drop('experiencia_edm_reformados');
    }
}
