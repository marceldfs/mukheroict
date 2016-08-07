<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->length(6)->index()->unique();
            $table->string('nome_completo')->length(75);
            $table->integer('estado_civil')->length(5)->index();
            $table->integer('genero')->length(5)->index();
            $table->integer('tipo_documento')->length(5)->index();
            $table->string('numero_documento')->length(20);
            $table->integer('nuit')->length(9);
            $table->date('data_nascimento');
            $table->integer('provincia_naturalidade')->length(5)->index();
            $table->integer('distrito_naturalidade')->length(5)->index();
            $table->integer('banco_mzn')->length(5)->index();
            $table->biginteger('numero_conta_mzn');
            $table->string('nib_mzn')->length(21);
            $table->integer('banco_usd')->length(5)->index();
            $table->biginteger('numero_conta_usd');
            $table->string('nib_usd')->length(21);
            $table->integer('provincia_morada')->length(5)->index();
            $table->integer('distrito_morada')->length(5)->index();
            $table->integer('pais_morada')->length(5)->index();
            $table->string('localidade');
            $table->integer('celular');
            $table->integer('celular_alternativo');
            $table->string('morada')->length(150);
            $table->string('email')->length(35);
            $table->integer('user_created')->index();
            $table->integer('user_updated')->index();
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
        Schema::drop('funcionarios');
    }
}
