<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $table='u_system_log';
    public $timestamps=false;

    public function user_admin()
    {
        return $this->belongsTo('App\Model\User','admin_id','id');
    }

}
