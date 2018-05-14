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
        $owner_id = DB::table('owners')->whereCompany('Administradores')->value('id');

        DB::table('owner_users')->insert([
        	'role_id'=>$role_id,
            'owner_id'=>$owner_id,
            'name'=>'danny5sanchez5',
        	'email'=>'danny5sanchez5@gmail.com',
        	'password'=>bcrypt('12345'),
            'phone'=>'4126464956'
        ]);

        DB::table('oauth_clients')->insert([
            'id'=>'f3d259ddd3ed8ff3843839b',
            'secret'=>'ZXi4ZwTfv8K9xQEQKc92qof5m0IgzkyY3qxmQwtB',
            'name'=>'Admim',
            'created_at'=>'Main website',
            'updated_at'=>'0000–00–00 00:00:00'
        ]); 
    }
            
}
