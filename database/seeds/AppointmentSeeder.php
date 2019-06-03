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
        \Carbon\Carbon::setLocale('pt_BR');
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 1,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('appointments')->insert([
            'client_id' => 1,
            'collaborator_id' => 4,
            'is_done' => true,
            'title'=> 'Profilaxia do Bruno',
            'start' => \Carbon\Carbon::now(),
            'end' => \Carbon\Carbon::now()->addHour(1),
            'note' => 'profilaxia do bruno',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        
    }
}
