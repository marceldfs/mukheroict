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
    }
}
