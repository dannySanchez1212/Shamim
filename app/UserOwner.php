<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOwner extends Model
{
        protected $table="owner_users";
    /**
     * The attributes that are mass assignable.|
     *
     * @var array
     */
    protected $fillable = ['owner_id', 'name', 'role_id', 'phone', 'localtion_id', 'email', 'password', 'is_active', 'created_at', 'updated_at', 'deleted_at', 'is_locked', 'token', 'locked_duration'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token',
    ];

}
