<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_id = DB::table('roles')->whereValue('Owner Admin')->value('id');

        DB::table('owner_users')->insert([
        	'role_id'=>$role_id,
        	'email'=>'andrecolbe81@gmail.com',
        	'password'=>bcrypt('12345'),
        ]);
    }
}
