<?php

namespace App\Http\Controllers\Admin;

use App\Http\LogActionConst;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{

    public function index_main(){
        return view('admin.indexmain');
    }
    public function login_log(){
        $this->addLog(LogActionConst::ACTION_ADMIN_LOGIN);
        return redirect('/admin/index_main');
    }

    public function role_error(){
        return view('admin.vue-route');
    }

    public function main(){
        return view('admin.main');
    }

    public function modManagePwd(){
        return view('admin.vue-route');
    }
/*
 * 管理员密码修改
 */
    public function updatePasswordAdmin(Request $request){
        $user=\Auth::user();

       if (Hash::check($request->password,$user->password)){
           $user->password=Hash::make($request->NewPassword);
           $user->save();
           return json_encode(['code'=>'1','data'=>$user],JSON_UNESCAPED_UNICODE);
       }else{
           return json_encode(['code'=>'0','data'=>$user],JSON_UNESCAPED_UNICODE);
       }


    }

    public function vue_route(){
        return view('admin.vue-route');
    }

    public function getUser(){
        $users=Users::all();
        return $users;
    }

}
