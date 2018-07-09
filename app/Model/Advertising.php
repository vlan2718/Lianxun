<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    //

    protected $table='u_advertising';



    public $fillable=['id','name','from_time','order_type','end_time','image','duration','url'];
    public $timestamps=false;

    public function getBannerList(){
        return self::all();
    }
    public function getAdvertisingBy(){
        return self::orderBy('order_type', 'desc')->get();
    }
    public function updateStatus_label($id,$array){
        $advertising=self::find($id);
        $advertising->name=$array['name'];
        if(isset($array['from_time'])){
            $advertising->from_time=strtotime($array['from_time']);
        }
        if (isset($array['end_time'])){
            $advertising->end_time=strtotime($array['end_time']);
        }
        $advertising->duration=$array['duration'];
        $advertising->url=$array['url'];
        return $advertising->save();
    }

    public function createStatus_label($array){
        if(isset($array['from_time'])){
            $array['from_time']=strtotime($array['from_time']);
        }
        if (isset($array['end_time'])){
            $array['end_time']=strtotime($array['end_time']);
        }

        return self::create($array);
    }





}
