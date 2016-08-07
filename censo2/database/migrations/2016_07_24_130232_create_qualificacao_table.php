<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualificacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->integer('instituicao')->length(5)->index();
            $table->string('curso')->length(50);
            $table->integer('certificado')->length(5)->index();
            $table->date('data_inicio');
            $table->date('data_fim');
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
        Schema::drop('qualificacaos');
    }
}
