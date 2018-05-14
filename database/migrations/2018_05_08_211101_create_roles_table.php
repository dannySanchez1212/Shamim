<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_id');
            $table->string('value');            
            $table->timestamps();
        });



        DB::table('roles')->insert([
          'owner_id'=>'1',
          'value'=>'Owner Admin',
        ]);
       DB::table('roles')->insert([
          'owner_id'=>'2',
          'value'=>'Technical Support',
        ]);
       DB::table('roles')->insert([
           'owner_id'=>'3',
          'value'=>'Customer Support',
        ]);
       DB::table('roles')->insert([
        'owner_id'=>'4',
          'value'=>'Billing Manager',
        ]);
       DB::table('roles')->insert([
        'owner_id'=>'5',
          'value'=>'Customer Service',
        ]);
       DB::table('roles')->insert([
        'owner_id'=>'6',
          'value'=>'Area Manager',
        ]);
       DB::table('roles')->insert([
        'owner_id'=>'7',
          'value'=>'Report Manager',
        ]);
       DB::table('roles')->insert([
        'owner_id'=>'8',
          'value'=>'Lineman',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}