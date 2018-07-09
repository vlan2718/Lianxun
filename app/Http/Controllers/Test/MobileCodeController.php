<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class MobileCodeController extends Controller
{
    //短信发送
    public function SendOut($phone){
        $code=rand(1111,9999);
        $pwd=strtoupper(md5('SDK-BDY-010-00018'.'526100'));
        $content='您的验证码为:'.$code.',请勿泄露您的验证码,10分钟内有效【联合亿商】';
        $url="http://sdk.entinfo.cn:8061/mdsmssend.ashx?sn=SDK-BDY-010-00018&pwd=".$pwd."&mobile=".$phone."&content=".$content."&ext=&stime=&rrid=&msgfmt=";
        $result=file_get_contents($url);
        if(strlen($result)>3){
            Redis::sEtex('code:'.$phone.':'.$phone,600,$code);
            Redis::set('code:'.$phone.':', $code);
            return json_encode(['code'=>'1','data'=>'true']);
        }else{
            return json_encode(['code'=>'0','msg'=>$result]);
        }
    }

}
