<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class UserNewsHistory extends Model
{
    protected $table = 'u_user_news_history';

    protected $fillable = ['user_id', 'news_id'];

    public $timestamps = false;
}