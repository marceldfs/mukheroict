<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaEdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_edms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->date('data_admissao');
            $table->date('data_integraccao');
            $table->integer('situacao')->length(5)->index();
            $table->integer('direccao')->length(5)->index();
            $table->integer('carreira')->length(5)->index();
            $table->integer('departamento')->length(5)->index();
            $table->integer('profissao')->length(5)->index();
            $table->integer('cargo')->length(5)->index();
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
        Schema::drop('experiencia_edms');
    }
}
