<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
        	'company'=>'Administradores',
        	'email'=>'danny5sanchez5@gmail.com',
            'company_logo'=>'logo Administradores',
            'phone'=>'4126464956',
            'address_line1'=>'oficina 1',
            'address_line2'=>'oficina 2',
            'country'=>'venezuela',
            'state'=>'tachira',
            'city'=>'san cristobal',
            'zip'=>'1111111',
            'updated_by'=>'1',
            
        ]);


    }
}
