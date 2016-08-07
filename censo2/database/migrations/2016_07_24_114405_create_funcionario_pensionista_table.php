<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioPensionistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_pensionistas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->decimal('pensao_mzn')->length(9,2);
            $table->decimal('pensao_usd')->length(9,2);
            $table->string('codigo_ex_familiar')->length(6)->index();
            $table->string('nome_ex_familiar')->length(50);
            $table->integer('parentesco')->length(5)->index();
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
        Schema::drop('funcionario_pensionistas');
    }
}
