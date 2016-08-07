<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioEfectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_efectivos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->integer('tamanho_camisete')->length(5)->index();
            $table->integer('tamanho_botas')->length(5)->index();
            $table->integer('tamanho_fato')->length(5)->index();
            $table->integer('tamanho_capacete')->length(5)->index();
            $table->integer('tipo_sanguineo')->length(5)->index();
            $table->integer('numero_inss')->length(9);
            $table->integer('tipo_carta_conducao')->length(5)->index();
            $table->string('numero_carta_conducao')->length(20);    
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
        Schema::drop('funcionario_efectivos');
    }
}
