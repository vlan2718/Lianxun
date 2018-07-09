<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_level extends Model
{
    protected $table='u_user_level';
    protected $fillable=['id','level_name','sign_days','integral'];
    protected $primaryKey='id';
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function users(){

            return $this->hasMany('App\Model\Users','level','id');
    }
    public static function getLevel(){
        return self::orderBy('integral', 'asc')->get();
    }

    public function createLevel($array){
        return self::create($array);
    }
    public function updateLevel($id,$array){
        $level=$this->find($id);
        $level->level_name=$array['level_name'];
        $level->sign_days=$array['sign_days'];
        $level->integral=$array['integral'];
        return $level->save();
    }

}
