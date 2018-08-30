<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    /**
	     * Add Roles
	     *
	     */
    	if (Role::where('name', '=', 'Admin')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Admin',
	            'slug' => 'admin',
	            'description' => 'Administrador do sistema',
	            'level' => 5,
        	]);
	    }

    	if (Role::where('name', '=', 'User')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'User',
	            'slug' => 'user',
	            'description' => 'Papel de usuário comum.',
	            'level' => 1,
	        ]);
		}
		if (Role::where('name', '=', 'Doctor')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Doctor',
	            'slug' => 'doctor',
	            'description' => 'Papel de médico',
	            'level' => 3,
			]);
		}
		if (Role::where('name', '=', 'Secretary')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Secretary',
	            'slug' => 'secretary',
	            'description' => ' Papel de secretaria.',
	            'level' => 3,
	        ]);
	    }

    	if (Role::where('name', '=', 'Unverified')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Unverified',
	            'slug' => 'unverified',
	            'description' => 'Papel de usuário não verificado.',
	            'level' => 0,
	        ]);
	    }

    }

}