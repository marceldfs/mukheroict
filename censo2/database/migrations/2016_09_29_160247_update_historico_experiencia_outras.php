<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHistoricoExperienciaOutras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historico_experiencia_outras', function ($table) {
            $table->dropColumn('instituicao');
            $table->dropColumn('profissao');
            $table->dropColumn('cargo');
        });
        
        Schema::table('historico_experiencia_outras', function ($table) {
            $table->string('instituicao')->length(35);
            $table->string('profissao')->length(35);
            $table->string('cargo')->length(35);
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
