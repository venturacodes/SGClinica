<?php
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->insert([
           'name'  => 'Clinica Chapecó',
           'phone' =>'2131231231',
           'email'    =>'clinicacha@odontop.com.br',
           'latitude' =>'12',
           'longitude'=>'-34',
           'address_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clinics')->insert([
            'name'  => 'Clinica São Lourenço',
            'phone' =>'312312312',
            'email'    =>'clinicaslo@odontop.com.br',
            'latitude' =>'32',
            'longitude'=>'-43',
            'address_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
