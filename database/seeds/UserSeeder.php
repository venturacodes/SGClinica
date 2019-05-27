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
            'id' => 1,
            'email' => 'admin@puclinica.com.br',
            'password' => Hash::make('123123'),
            'role_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('users')->insert([
            'id' => 2,
            'email' => 'gestor@puclinica.com.br',
            'password' => Hash::make('123123'),
            'role_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'email' => 'secretaria@puclinica.com.br',
            'password' => Hash::make('123123'),
            'role_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'email' => 'medico@puclinica.com.br',
            'password' => Hash::make('123123'),
            'role_id' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
