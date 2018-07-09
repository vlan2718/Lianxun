<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class NewsPoint extends Model
{
    protected $table = 'u_news_point';

    protected $fillable = ['user_id', 'news_id', 'point', 'created_at'];

    public $timestamps = false;
}