<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table="users";
    /**
     * The attributes that are mass assignable.|
     *
     * @var array
     */
    protected $fillable = ['owner_id', 'owner_user_id', 'package_id', 'user_type_id', 'name', 'email', 'password', 'location_id', 'map', 'remember_token', 'activation_date', 'created_at', 'updated_at', 'deleted_at', 'status' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
