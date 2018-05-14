<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$owner_id = DB::table('owners')->whereCompany('Administradores')->value('id');
    	$owner_user_id = DB::table('owner_users')->whereRole_id('1')->value('id');
    	$package_id = DB::table('packages')->whereName('PackagesTest')->value('id');
    	$user_type_id = DB::table('user_types')->whereValue('PPPoE')->value('id');
    	$name = DB::table('roles')->whereValue('Owner Admin')->value('value');

        DB::table('users')->insert([
        	'owner_id'=>$owner_id,
        	'owner_user_id'=>$owner_user_id,
        	'package_id'=>$package_id,
        	'user_type_id'=>$user_type_id,
        	'name'=>$name,
        	'email'=>'danny5sanchez5@gmail.com',
        	'password'=>bcrypt('12345'),
        ]);
    }
}
