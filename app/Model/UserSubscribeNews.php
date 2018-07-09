<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserSubscribeNews extends Model
{
    protected $table = 'u_user_subscribe_news';

    protected $fillable = ['user_id', 'news_id', 'created_at'];

    public $timestamps = false;
}