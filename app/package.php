<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $table="packages";

    protected $fillable = ['owner_id', 'name', 'user_group', 'bw_download', 'bw_upload', 'burst_bw_rate_limit', 'fup_bw_download', 'fup_bw_upload', 'bw_data_limit', 'rate', 'billing_period', 'grace_period', 'nas_ids'];


}
