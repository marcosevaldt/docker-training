<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user 	 = Role::where('name', 'user')->first();
        $role_admin  = Role::where('name', 'administrator')->first();

        $manager = new User();
        $manager->name = 'Marcos Evaldt';
        $manager->email = 'marcos@example.com';
        $manager->password = bcrypt('secret');
        $manager->phone = '(51) 983186509';
        $manager->document = '84625937000';
        $manager->save();
        $manager->roles()->attach($role_admin);

        $manager = new User();
        $manager->name     = 'Paulo Renato';
        $manager->email    = 'paulo@example.com';
        $manager->password = bcrypt('secret');
        $manager->phone    = '(51) 905681389';
        $manager->document = '84625937000';
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}
