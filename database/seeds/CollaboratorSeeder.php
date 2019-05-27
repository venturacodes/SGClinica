<?php
use Illuminate\Database\Seeder;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collaborators')->insert([
            'id' => 1,
            'user_id' => 1,
            'clinic_id' => 1,
            'name' => 'Administrador do Sistema',
            'phone' => '491234-1212',
        ]);
        DB::table('collaborators')->insert([
            'id' => 2,
            'user_id' => 2,
            'clinic_id' => 1,
            'name' => 'Gestor da clínica',
            'phone' => '491234-1212',
        ]);
        DB::table('collaborators')->insert([
            'id' => 3,
            'user_id' => 3,
            'clinic_id' => 1,
            'name' => 'Secretária da clínica',
            'phone' => '491234-1212',
        ]);
        DB::table('collaborators')->insert([
            'id' => 4,
            'user_id' => 4,
            'clinic_id' => 1,
            'name' => 'Médico da clínica',
            'phone' => '491234-1212',
        ]);
    }
}
