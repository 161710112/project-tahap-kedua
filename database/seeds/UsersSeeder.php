<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//membuat role admin
        $adminRole = new Role();
        $adminRole->name="Admin";
        $adminRole->display_name ="Admin";
        $adminRole->save();

        //membuat role member
        $memberRole = new Role();
        $memberRole->name="Member";
        $memberRole->display_name ="Member";
        $memberRole->save();

        //membuat user admin
        $admin = new User();
        $admin->name='Admin';
        $admin->email='admin@gmail.com';
        $admin->password =bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat user member
        $member = new User();
        $member->name="Sample Member";
        $member->email="member@gmail.com";
        $member->password =bcrypt('rahasia');
        $member->save();
        $member->attachRole($adminRole);
            }
}
