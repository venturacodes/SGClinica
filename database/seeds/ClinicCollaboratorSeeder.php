<?php
use Illuminate\Database\Seeder;

class ClinicCollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinic_collaborator')->insert([
            'clinic_id' => 1,
            'collaborator_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
    }
}
