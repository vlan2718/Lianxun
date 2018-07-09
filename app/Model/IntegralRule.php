<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class IntegralRule extends Model
{
    protected $table = 'u_integral_rule';

    public $timestamps = false;

    public const EVENT_SIGN = 'sign';
}