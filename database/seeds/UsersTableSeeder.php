<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $userRole 			= Role::where('name', '=', 'User')->first();
        $adminRole 			= Role::where('name', '=', 'Admin')->first();
		$permissions 		= Permission::all();

	    /**
	     * Add Users
	     *
	     */
        if (User::where('email', '=', 'admin@sgclinica.com')->first() === null) {
	        $newUser = User::create([
	            'name' => 'Admin',
	            'email' => 'admin@sgclinica.com',
	            'password' => bcrypt('123123'),
	        ]);
	        $newUser->attachRole($adminRole);
			foreach ($permissions as $permission) {
				$newUser->attachPermission($permission);
			}

        }

        if (User::where('email', '=', 'sec@sgclinica.com')->first() === null) {
	        $newUser = User::create([
	            'name' => 'Secretária',
	            'email' => 'sec@sgclinica.com',
	            'password' => bcrypt('123123'),
	        ]);
	        $newUser->attachRole($userRole);

        }

    }
}