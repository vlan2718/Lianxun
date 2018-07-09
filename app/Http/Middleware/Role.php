<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Role
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

        $user_role_id=Auth::user()->role_id;
       $role_fun= \DB::table('u_role')->where('id',$user_role_id)->first();
       $arr_role=explode("@",trim($role_fun->fun,'@')); //查看会员都有哪些权限
       $route_name=$request->route();//获取路由 即方法
        $fun_id=\DB::table('u_action_fun')->where('fun_ation',$route_name->getName())->first();
        $ok_role=in_array($fun_id->id,$arr_role);
        if (!$ok_role){
            return response()->json(0);
        }

        return $next($request);


    }
}
