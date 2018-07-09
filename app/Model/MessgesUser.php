<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MessgesUser extends Model
{
    protected $table='u_message';

    protected $fillable=['message','type','to_user_id','form_user_id','important'];

    public function toMessage($to_user_id,$message_Text,$important,$form_user_id){
        $array['to_user_id']=$to_user_id;
        $array['message']=$message_Text;
        $array['important']=$important;
        $array['form_user_id']=$form_user_id;
        $array['type']=$form_user_id;
      return  self::create($array);

    }
}
