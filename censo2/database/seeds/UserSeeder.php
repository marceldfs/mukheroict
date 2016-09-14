<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@edm.co.mz',
            'active' => 1,
            'tipo_utilizador' => 1,
            'password' => bcrypt('654321'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'supervisor',
            'email' => 'supervisor@edm.co.mz',
            'active' => 1,
            'tipo_utilizador' => 2,
            'password' => bcrypt('654321'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'digitador',
            'email' => 'digitador@edm.co.mz',
            'active' => 1,
            'tipo_utilizador' => 3,
            'password' => bcrypt('654321'),
        ]);
    }
}
