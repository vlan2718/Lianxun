<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='u_admin';
    protected $fillable=['1','role_id','username','password'];
    protected $hidden=['password'];

    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function systemlog()
    {
        return $this->hasMany('App\Model\SystemLog','admin_id','id');
    }

}
