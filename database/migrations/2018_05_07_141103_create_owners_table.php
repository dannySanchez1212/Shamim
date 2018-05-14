<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('company');
            //$table->blob('company_logo');
            $table->binary('company_logo');
            $table->string('email',120);
            $table->string('phone');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('zip');
            $table->string('updated_by');


        });
    }
      
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
