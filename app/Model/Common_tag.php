<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common_tag extends Model
{
    //
    protected $table='u_common_tag';
    public $fillable=['id','name','description'];
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    public function getCommonName(){
        return self::all();
    }
    public function updateStatus_label($id,$array){
        $Status_label=self::find($id);
        $Status_label->name=$array['name'];
        $Status_label->description=$array['description'];
        return $Status_label->save();
    }
    public function createStatus_label($array){
        return self::create($array);
    }
    public function NewsTag($newsId){
        $data=DB::table('u_news_tag')->join('u_common_tag','u_common_tag.id','=','u_news_tag.tag_id')
            ->where('u_news_tag.news_id',$newsId)->get();
        return $data;
    }
}
