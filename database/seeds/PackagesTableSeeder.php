<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$owner_id = DB::table('owners')->whereCompany('Administradores')->value('id');

        DB::table('packages')->insert([
        	'owner_id'=>$owner_id,
        	'name'=>'PackagesTest',
        ]);
    }
}
