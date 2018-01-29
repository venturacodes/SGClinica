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
            'user_id' => '1',
            'address_id' => '1',
            'name' => 'Arthur Alves Venturin',
            'phone' => '33237502',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clients')->insert([
            'user_id' => '2',
            'address_id' => '1',
            'name' => 'Priscilla Bitencourt',
            'phone' => '999999999',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clients')->insert([
            'user_id' => '3',
            'address_id' => '1',
            'name' => 'Bruno da Luz',
            'phone' => '999999999',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
