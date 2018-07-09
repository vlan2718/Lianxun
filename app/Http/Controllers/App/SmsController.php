<?php

namespace App\Http\Controllers\App;

use App\Http\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SmsController extends AppBaseController
{
    public const CAPTCHA_CACHE_TIME = 300;

    public function send(Request $request)
    {
        $phone = $request->input('mobile');
        $code = rand(1000, 9999);
        $pwd = strtoupper(md5('SDK-BDY-010-00018'.'526100'));
        $content = "您的验证码为:{$code},请勿泄露您的验证码,10分钟内有效【联合亿商】";
        $postData = "sn=SDK-BDY-010-00018&pwd={$pwd}&mobile={$phone}&content={$content}&ext=&rrid=&stime=";
        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, 'http://sdk.entinfo.cn:8061/mdsmssend.ashx');
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curlHandler, CURLOPT_POST,true);
        curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($curlHandler);
        curl_close($curlHandler);
        if($response[0] != '-'){
            Redis::setex($phone, self::CAPTCHA_CACHE_TIME, $code);
            return $this->responseJSON(Constants::APP_SUCCESS);
        }
        return $this->responseJSON(Constants::APP_ERROR_SEND_MOBILE_MSG);
    }
}