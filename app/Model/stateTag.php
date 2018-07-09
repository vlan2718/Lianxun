<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stateTag extends Model
{
    protected $table='u_status_label';
    public $fillable=['id','name'];
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function updateStatus_label($id,$name){
        $Status_label=self::find($id);
        $Status_label->name=$name;
       return $Status_label->save();
    }

    public function createStatus_label($array){
        return self::create($array);
    }
}
