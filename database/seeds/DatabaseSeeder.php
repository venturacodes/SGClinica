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
        $this->call('UserSeeder');
        $this->call('CollaboratorSeeder');
        $this->call('ClinicSeeder');
        $this->call('AppointmentStatusSeeder');
        $this->call('AppointmentSeeder');
        $this->call('ClinicCollaboratorSeeder');
        $this->call('ClientSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ConnectRelationshipsSeeder');
    }
}
