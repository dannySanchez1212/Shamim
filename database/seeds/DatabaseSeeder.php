<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(OwnerTableSeeder::class);

        $this->call(PackagesTableSeeder::class);

        $this->call(UserAdminSeeder::class);
        
        $this->call(UserTableSeeder::class);
    }
}
