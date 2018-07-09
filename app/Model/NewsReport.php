<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsReport extends Model
{
    protected $table='u_news_report';

    public $timestamps = false;

    protected $fillable = ['user_id', 'news_id', 'reason', 'remark'];

    public function AddNewsReport($array){
        if(isset($array['remark'])){
            $data=$array['remark'];
        }else{
            $data=null;
        }
        return self::insert([
            'user_id'=>$array['user_id'],
            'reason'=>$array['reason'],
            'remark'=>$data
        ]);

    }
}
