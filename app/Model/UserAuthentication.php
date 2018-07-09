<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAuthentication extends Model
{
    public $table = 'u_user_authentication';

    public $fillable = ['id', 'name', 'id_card', 'organization', 'duty', 'id_card_up', 'id_card_down'];

    public $dateFormat = 'U';
}