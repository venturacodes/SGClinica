<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            'user_id' => 1,
            'clinic_id' => 1,
            'client_id' => 1,
            'collaborator_id' => 1,
            'appointment_status_id' => 1,
            'start_time' => \Carbon\Carbon::now(),
            'end_time' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
             'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
