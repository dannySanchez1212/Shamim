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
        	'email'=>'giancolbe@gmail.com',
        ]);
    }
}
