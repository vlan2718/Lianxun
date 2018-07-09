<?php

namespace App\Http\Controllers\Utility;


class Util
{
    public static function formatDate($timestamp, $hasSecond = true)
    {
        if($hasSecond){
            return date('Y-m-d H:i:s', $timestamp);
        }
        return date('Y-m-d H:i', $timestamp);
    }

    public static function formatTime($timestamp)
    {
        $time = time() - $timestamp;   ////return date('H:i', $timestamp);
        if ($time >= 31104000) { // N年前
            $num = (int)($time / 31104000);
            return $num.'年前';
        }
        if ($time >= 2592000) { // N月前
            $num = (int)($time / 2592000);
            return $num.'月前';
        }
        if ($time >= 86400) { // N天前
            $num = (int)($time / 86400);
            return $num.'天前';
        }
        if ($time >= 3600) { // N小时前
            $num = (int)($time / 3600);
            return $num.'小时前';
        }
        if ($time > 60) { // N分钟前
            $num = (int)($time / 60);
            return $num.'分钟前';
        }
        return '1分钟前';
    }

    public static function checkMobile($mobile)
    {
        return preg_match("/^1[34578]\d{9}$/", $mobile);
    }

    public static function randomString($length = 4)
    {
        $chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charArray = [];
        for($i = 0; $i < $length; $i++){
            $charArray[] =$chars[mt_rand(0, 61)];
        }
        return implode('', $charArray);
    }
}