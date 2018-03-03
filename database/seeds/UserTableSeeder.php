<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_standard = Role::where('name', 'standard')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->name = 'John Smith';
        $employee->email = 'standard@example.com';
        $employee->password = bcrypt('standard');
        $employee->save();
        $employee->roles()->attach($role_standard);

        $manager = new User();
        $manager->name = 'Admin Name';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('admin');
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}
