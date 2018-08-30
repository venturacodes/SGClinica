<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Get Available Permissions
	     *
	     */
		$permissions = Permission::all();

	    /**
	 * Attach Permissions to Roles
	     *
	     */
		$roleAdmin = Role::where('name', '=', 'Administrador')->first();
		foreach ($permissions as $permission) {
			$roleAdmin->attachPermission($permission);
		}
		$roleSecretary = Role::where('name', '=', 'Secretária')->first();
		foreach ($permissions as $permission) {
			$roleSecretary->attachPermission($permission);
		}
		$roleDoctor = Role::where('name', '=', 'Médico')->first();
		foreach ($permissions as $permission) {
			$roleDoctor->attachPermission($permission);
		}

    }

}