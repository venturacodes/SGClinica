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
            'job_id' => 1,
            'clinic_id' => 1,
            'name' => 'Bruno da Luz',
            'phone' => '491234-1212',
            'color' => 'teste',
        ]);
    }
}
