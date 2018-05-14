<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->timestamps();
        });
    

     DB::table('user_types')->insert([
          'value'=>'PPPoE',
        ]);
     DB::table('user_types')->insert([
          'value'=>'Hotspot',
        ]);
     DB::table('user_types')->insert([
          'value'=>'Public IP',
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types');
    }
}
