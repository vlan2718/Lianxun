<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Constants;

class AppAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if(!$request->has('timestamp') || !$request->has('signature')){
            return response()->json(['code' => Constants::APP_ERROR_PARAMS, 'msg' => Constants::$errMsg[Constants::APP_ERROR_PARAMS], 'data'=>[]]);
        }
        $signature = $request->input('signature');
        $timestamp = intval($request->input('timestamp'));
        if(md5($timestamp . env('APP_KEY')) != $signature){
            return response()->json(['code' => Constants::APP_ERROR_SIGN, 'msg' => Constants::$errMsg[Constants::APP_ERROR_SIGN], 'data'=>[]]);
        }
        if((time() - $timestamp) > 120){
            return response()->json(['code' => Constants::APP_ERROR_TIMEOUT, 'msg' => Constants::$errMsg[Constants::APP_ERROR_TIMEOUT], 'data' => []]);
        }*/
        unset($request['timestamp'], $request['signature']);
        return $next($request);
    }
}
