<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class owner extends Model
{
    protected $table="owners";

    protected $fillable = ['company', 'company_logo', 'email', 'phone', 'address_line1', 'address_line2', 'city', 'state', 'country', 'zip'];

}

