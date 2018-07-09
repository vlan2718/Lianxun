<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserSubscribeCategory extends Model
{
    protected $table = 'u_user_subscribe_category';

    public function getUserSubscribeCategory($uid){
//        return self::where('user_id',$uid)->get();
        return DB::table('u_user_subscribe_category')->join('u_category','u_user_subscribe_category.category_id','=','u_category.id')
                                                    ->where('u_user_subscribe_category.user_id','=',$uid)
                                                    ->get();
    }
}
