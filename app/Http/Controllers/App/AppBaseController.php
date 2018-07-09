<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Constants;

class AppBaseController extends Controller
{
    protected function responseJSON($code = Constants::APP_CODE_SUCCESS, $data = [])
    {
        $msg = isset( Constants::$errMsg[$code]) ?  Constants::$errMsg[$code] : '';
        return response()->json(['code' => $code, 'msg' =>$msg, 'data' => $data], 200, [], JSON_UNESCAPED_UNICODE);
    }
}