<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiaress', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcionario_id')->index();
            $table->string('nome')->length(50);
            $table->integer('parentesco')->length(5)->index();
            $table->date('data_nascimento');
            $table->integer('contacto');
            $table->integer('tipo_documento')->length(5)->index();
            $table->string('numero_documento')->length(20);
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
        Schema::drop('familiaress');
    }
}
