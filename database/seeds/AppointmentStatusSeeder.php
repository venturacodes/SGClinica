<?php

use Illuminate\Database\Seeder;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_statuses')->insert([
           'status'=>'marcado'
        ]);
        DB::table('appointment_statuses')->insert([
            'status'=>'cancelado'
        ]);
        DB::table('appointment_statuses')->insert([
            'status'=>'reagendado'
        ]);
    }
}
