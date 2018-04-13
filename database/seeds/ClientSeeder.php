<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'email' => 'joaozinhodopastel@gmail.com',
            'clinic_id'=> 1,
            'name' => 'Joãozinho',
            'phone' => '33237502',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clients')->insert([
            'email' => 'pribb@gmail.com',
            'clinic_id'=> 1,
            'name' => 'Priscilla Bitencourt',
            'phone' => '999999999',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clients')->insert([
            'email' => 'bruno@gmail.com',
            'clinic_id'=> 1,
            'name' => 'Bruno da Luz',
            'phone' => '999999999',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
