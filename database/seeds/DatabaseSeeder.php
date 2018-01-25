<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'arthur.alves.venturin@gmail.com',
            'password' => Hash::make('123123'),
            'role_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('addresses')->insert([
           'cep'          => '88509000',
           'uf'           => 'sc',
           'cidade'       => 'Lages',
           'bairro'       => 'Universitário',
           'logradouro'   => 'Av. Dom pedro II',
            'numero'      => '1656',
            'complemento' => 'apto. 404',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('clinics')->insert([
           'clinica'  => 'Clinica Chapecó',
           'telefone' =>'2131231231',
           'email'    =>'clinicacha@odontop.com.br',
           'latitude' =>'12',
           'longitude'=>'-34',
           'address_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('clinics')->insert([
            'clinica'  => 'Clinica São Lourenço',
            'telefone' =>'312312312',
            'email'    =>'clinicaslo@odontop.com.br',
            'latitude' =>'32',
            'longitude'=>'-43',
            'address_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('jobs')->insert([
            'name' => 'secretaria',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('jobs')->insert([
            'name' => 'dentista',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('jobs')->insert([
            'name' => 'gerente',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('collaborators')->insert([
            'user_id' => 1,
            'job_id' => 1,
            'clinic_id' => 1,
            'name' => 'Bruno da Luz',
            'phone' => '491234-1212',
            'color' => 'teste',

        ]);
        DB::table('appointment_statuses')->insert([
           'status'=>'marcado'
        ]);
        DB::table('appointment_statuses')->insert([
            'status'=>'cancelado'
        ]);
        DB::table('appointment_statuses')->insert([
            'status'=>'reagendado'
        ]);
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

        DB::table('clinic_collaborator')->insert([
            'clinic_id' => 1,
            'collaborator_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);



    }
}
