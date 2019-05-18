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
            'user_id' => 1,
            'clinic_id' => 1,
            'name' => 'Arthur Alves Venturin',
            'phone' => '491234-1212',
        ]);
    }
}
