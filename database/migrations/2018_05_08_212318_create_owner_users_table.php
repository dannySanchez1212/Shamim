<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_id');
            $table->string('name');
            $table->string('role_id');
            $table->string('phone');
            $table->string('email',120)->unique();
            $table->string('password');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_users');
    }
}
  