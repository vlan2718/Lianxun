<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Integral_rule extends Model
{
    protected $table='u_integral_rule';
    protected $fillable=['name','value','event'];
    public $timestamps=false;

    public static function getIntegral_rule(){
        return self::get();
    }

    public function saveIntegral_rule($Integral_rule){
        $Integral=self::find($Integral_rule['id']);
        $Integral->name=$Integral_rule['name'];
        $Integral->value=$Integral_rule['value'];
        $Integral->event=$Integral_rule['event'];
    return    $Integral->save();

    }
}
