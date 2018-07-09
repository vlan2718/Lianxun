<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'u_user_level';

    protected $fillable = ['level_name', 'sign_days', 'integral'];
}