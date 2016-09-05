<?php

use Illuminate\Database\Seeder;

class TipoUtilizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_utilizadores')->insert([
            'descricao' => 'Administrador',
        ]);
        
        DB::table('tipo_utilizadores')->insert([
            'descricao' => 'Supervisor',
        ]);
        
        DB::table('tipo_utilizadores')->insert([
            'descricao' => 'Digitador',
        ]);
    }
}
