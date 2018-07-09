<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'u_suggest';

    protected $fillable = ['user_id', 'contact', 'content'];


    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }

    public static function  getSuggestList(){
       return self::all();
    }

    public $timestamps = false;

}