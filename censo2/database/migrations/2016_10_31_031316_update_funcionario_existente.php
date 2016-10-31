<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFuncionarioExistente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_existente', function ($table) {
            $table->integer('tipo_funcionario_id')->length(5)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_existente', function ($table) {
            $table->dropColumn('tipo_funcionario_id');
        });
    }
}
