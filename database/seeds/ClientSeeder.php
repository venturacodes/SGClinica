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
            'email' => 'paciente@paciente.com',
            'clinic_id'=> 1,
            'name' => 'Paciente',
            'phone' => '33232323',
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
            'email' => 'arthur.alves.venturin@gmail.com',
            'clinic_id'=> 1,
            'name' => 'Arthur Alves Venturin',
            'phone' => '999999999',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
