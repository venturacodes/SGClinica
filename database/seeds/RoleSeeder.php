<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'Role used by user administrator',
            'level' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Secretary',
            'slug' => 'sec',
            'description' => "Role used by the secretary can see doctor's agenda",
            'level' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Doctor',
            'slug' => 'doc',
            'description' => 'Role used by user doctor in general, most basic role in system, besides guest.',
            'level' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
