<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		
		if (Permission::where('name', '=', 'Can View Appointments')->first() === null) {
			Permission::create([
			    'name' => 'Can View Appointments',
			    'slug' => 'show.appointments',
			    'description' => 'Can View Appointments',
			    'model' => 'Permission',
			]);
        }
		if (Permission::where('name', '=', 'Can view the next Appointments')->first() === null) {
			Permission::create([
			    'name' => 'Can view the next Appointments',
			    'slug' => 'show.nextAppointments',
			    'description' => 'Can view the next Appointments, used by the doctor.',
			    'model' => 'Permission',
			]);
		}
		
		if (Permission::where('name', '=', 'Can create new Appointments')->first() === null) {
			Permission::create([
			    'name' => 'Can create new Appointments',
			    'slug' => 'create.appointment',
			    'description' => 'Can create new Appointments.',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can edit Appointments')->first() === null) {
			Permission::create([
			    'name' => 'Can edit Appointments',
			    'slug' => 'edit.appointment',
			    'description' => 'Can edit Appointments.',
			    'model' => 'Permission',
			]);
		}
		if (Permission::where('name', '=', 'Can delete Appointments')->first() === null) {
			Permission::create([
			    'name' => 'Can delete Appointments',
			    'slug' => 'delete.appointment',
			    'description' => 'Can delete Appointments.',
			    'model' => 'Permission',
			]);
        }
		
		
		if (Permission::where('name', '=', 'Can view collaborators')->first() === null) {
			Permission::create([
			    'name' => 'Can view collaborators',
			    'slug' => 'show.collaborator',
			    'description' => 'Can view collaborators',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can create new collaborators')->first() === null) {
			Permission::create([
			    'name' => 'Can create new collaborators',
			    'slug' => 'create.collaborator',
			    'description' => 'Can create new collaborators',
			    'model' => 'Permission',
			]);
        }
		if (Permission::where('name', '=', 'Can delete collaborators')->first() === null) {
			Permission::create([
			    'name' => 'Can delete collaborators',
			    'slug' => 'delete.collaborator',
			    'description' => 'Can delete collaborators',
			    'model' => 'Permission',
			]);
		}
		
		if (Permission::where('name', '=', 'Can edit collaborators')->first() === null) {
			Permission::create([
			    'name' => 'Can edit collaborators',
			    'slug' => 'edit.collaborator',
			    'description' => 'Can edit collaborators',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can view Clients')->first() === null) {
			Permission::create([
			    'name' => 'Can view Clients',
			    'slug' => 'show.client',
			    'description' => 'Can view Clients',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can create new Clients')->first() === null) {
			Permission::create([
			    'name' => 'Can create new Clients',
			    'slug' => 'create.client',
			    'description' => 'Can create new Clients',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can delete Clients')->first() === null) {
			Permission::create([
			    'name' => 'Can delete Clients',
			    'slug' => 'delete.client',
			    'description' => 'Can delete Clients',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can edit Clients')->first() === null) {
			Permission::create([
			    'name' => 'Can edit Clients',
			    'slug' => 'edit.client',
			    'description' => 'Can edit Clients',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can view clinics')->first() === null) {
			Permission::create([
			    'name' => 'Can view clinics',
			    'slug' => 'show.clinic',
			    'description' => 'Can view clinics',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can create new clinics')->first() === null) {
			Permission::create([
			    'name' => 'Can create new clinics',
			    'slug' => 'create.clinic',
			    'description' => 'Can create new clinics',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can delete clinics')->first() === null) {
			Permission::create([
			    'name' => 'Can delete clinics',
			    'slug' => 'delete.clinic',
			    'description' => 'Can delete clinics',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can edit clinics')->first() === null) {
			Permission::create([
			    'name' => 'Can edit clinics',
			    'slug' => 'edit.clinic',
			    'description' => 'Can edit clinics',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can view medicines')->first() === null) {
			Permission::create([
			    'name' => 'Can view medicines',
			    'slug' => 'show.medicine',
			    'description' => 'Can view medicines',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can create new medicines')->first() === null) {
			Permission::create([
			    'name' => 'Can create new medicines',
			    'slug' => 'create.medicine',
			    'description' => 'Can create new medicines',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can delete medicines')->first() === null) {
			Permission::create([
			    'name' => 'Can delete medicines',
			    'slug' => 'delete.medicine',
			    'description' => 'Can delete medicines',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can edit medicines')->first() === null) {
			Permission::create([
			    'name' => 'Can edit medicines',
			    'slug' => 'edit.medicine',
			    'description' => 'Can edit medicines',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can view receipts')->first() === null) {
			Permission::create([
			    'name' => 'Can view receipts',
			    'slug' => 'show.receipt',
			    'description' => 'Can view receipts',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can create new receipt')->first() === null) {
			Permission::create([
			    'name' => 'Can create new receipt',
			    'slug' => 'create.receipt',
			    'description' => 'Can create new receipt',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can delete receipts')->first() === null) {
			Permission::create([
			    'name' => 'Can delete receipts',
			    'slug' => 'delete.receipt',
			    'description' => 'Can delete receipts',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can edit receipts')->first() === null) {
			Permission::create([
			    'name' => 'Can edit receipts',
			    'slug' => 'edit.receipt',
			    'description' => 'Can edit receipts',
			    'model' => 'Permission',
			]);
        }
		
		if (Permission::where('name', '=', 'Can view reports')->first() === null) {
			Permission::create([
			    'name' => 'Can view reports',
			    'slug' => 'show.report',
			    'description' => 'Can view reports',
			    'model' => 'Permission',
			]);
        }
		/**
	     * Add Permissions
	     *
	     */
        if (Permission::where('name', '=', 'Can View Users')->first() === null) {
			Permission::create([
			    'name' => 'Can View Users',
			    'slug' => 'view.users',
			    'description' => 'Can view users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Create Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Create Users',
			    'slug' => 'create.users',
			    'description' => 'Can create new users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Edit Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Edit Users',
			    'slug' => 'edit.users',
			    'description' => 'Can edit users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Delete Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Delete Users',
			    'slug' => 'delete.users',
			    'description' => 'Can delete users',
			    'model' => 'Permission',
			]);
        }

    }
}
