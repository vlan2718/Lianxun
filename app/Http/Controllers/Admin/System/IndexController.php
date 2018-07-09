<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\LogActionConst;
use App\Model\Suggest;
use App\Model\SystemLog;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function systemConfig(){
        return view('admin.system.systemConfig');
    }


    public function systemSetup(){
        return view('admin.vue-route');
    }




    public function ManageFunSet(){
        return view('admin.vue-route');
    }

    public function getManageFunSetList(){
    $this->addLog(LogActionConst::GETMANAGEFUNSETLIST);
        $ManageFunSetLists=\DB::table('u_role')->get();
        $array=null;
        foreach ($ManageFunSetLists as $key=> $manageFunSetList){
            $array[$key]['id']=$manageFunSetList->id;
            $array[$key]['name']=$manageFunSetList->name;
            $user_count=\DB::table('u_admin')->where('role_id',$manageFunSetList->id)->count();
            $array[$key]['user_count']=$user_count;
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function createManageFunSetListId(Request $request){
        $this->addLog(LogActionConst::CREATEMANAGEFUNSETLISTID);
        $ManageFunSetLists=\DB::table('u_role')->insert(['name'=>$request->name]);
        return json_encode($ManageFunSetLists,JSON_UNESCAPED_UNICODE);
    }
    public function updateManageFunSetListId(Request $request){
        $this->addLog(LogActionConst::UPDATEMANAGEFUNSETLISTID);
        $ManageFunSetLists=\DB::table('u_role')->where('id',$request->id)->update(['name'=>$request->name]);
        return json_encode($ManageFunSetLists,JSON_UNESCAPED_UNICODE);
    }
    public function deleteManageFunSetListId(Request $request){
        $this->addLog(LogActionConst::DELETEMANAGEFUNSETLISTID);
        $ManageFunSetLists=\DB::table('u_role')->where('id',$request->id)->delete();
        return json_encode($ManageFunSetLists,JSON_UNESCAPED_UNICODE);
    }


    public function ManageFunSets(){
        return view('admin.vue-route');
    }

    public function ManageFunSetsLists(Request $request){
        $users=\DB::table('u_admin')->where('role_id',$request->id)->get();
        $array=null;
        foreach ($users as $key=> $user){
            $array[$key]['id']=$user->id;
            $array[$key]['username']=$user->username;
            $array[$key]['password']=$user->password;
            $array[$key]['role_id']=$user->role_id;
            $role=\DB::table('u_role')->where('id',$user->role_id)->first();
          $array[$key]['role_name']=$role->name;
        }

        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }
    public function updateManageFunSetsLists(Request $request){
        $users=\DB::table('u_admin')->where('id',$request->id)->update(
            [
                'username'=>$request->username,
                'password'=>$request->password,
                'role_id'=>$request->role_id,

            ]
        );

        return json_encode($users,JSON_UNESCAPED_UNICODE);
    }

    public function ManageFunSetOk(){
        return view('admin.vue-route');
    }

    public function getRole_fun(){
      $funs=\DB::table('u_action_fun')->get();

      $array=null;
      foreach ($funs as $key=>$fun){
          $array[$fun->fun_ation]=$fun->id;
      }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function getRole(Request $request){
        $funs=\DB::table('u_role')->where('id',$request->id)->first();
        $array=null;
        if(!isset($funs->fun)){
            return json_encode($array,JSON_UNESCAPED_UNICODE);
        }
        $arrayFun=explode('@',trim($funs->fun,'@'));


        foreach ($arrayFun as $key =>$value){
           // $array[$key]['id']=$value;
            $fun=\DB::table('u_action_fun')->where('id',$value)->first();
            $array[$fun->fun_ation]=$value;
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function updateRoleIds(Request $request){
        $array=null;
        foreach ($request->roleIds as $key=>$roleId){
            if($roleId){
                $fun=\DB::table('u_action_fun')->where('fun_ation',$key)->first();
                $array[]=$fun->id;
            }
        }
        $fun_srt='@'.implode("@", $array)."@";
        \DB::table('u_role')->where('id',$request->id)->update(['fun'=>$fun_srt]);
        return json_encode($fun_srt,JSON_UNESCAPED_UNICODE);
    }

    public function getRolesTrue(Request $request){
        $this->addLog(LogActionConst::GETROLESTRUE);
        $funAll=\DB::table('u_action_fun')->get();
        $funs=\DB::table('u_role')->where('id',$request->id)->first();
        $ArrayFunAll=null;
        if(!isset($funs->fun)){
            foreach ($funAll as $key=>$value){
                $ArrayFunAll[$value->fun_ation] =false;
            }
        }
        $arrayFun=explode('@',trim($funs->fun,'@'));
        foreach ($funAll as $key=>$value){
           if (in_array($value->id,$arrayFun)){
               $ArrayFunAll[$value->fun_ation] =true;
           }else{
               $ArrayFunAll[$value->fun_ation] =false;
           }
        }
        return json_encode($ArrayFunAll,JSON_UNESCAPED_UNICODE);
    }


    public function getSystemSetupList(Request $request){
        $this->addLog(LogActionConst::GETSYSTEMSETUPLIST);
        $systemLists=\DB::table('u_system_config_item')->get();
        $array=null;
        foreach ($systemLists as $systemList){
            $array[$systemList->key]=$systemList->value;
        }

        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function updateSystemSetupList(Request $request){
$this->addLog(LogActionConst::UPDATESYSTEMSETUPLIST);
        $array_input=$request->bibibi;
        foreach ($array_input as $key=>$value){
            \DB::table('u_system_config_item')->where('key',$key)->update(['value'=>$value]);
        }

        if ($request->images){
            $bg = $request->get('images');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            \DB::table('u_system_config_item')->where('key','APP_LOGO')->update(['value'=>$bgurl]);
        }
        if ($request->logoimages){
            $bg = $request->get('logoimages');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            \DB::table('u_system_config_item')->where('key','APP_LAUNCH_IMAGE')->update(['value'=>$bgurl]);
        }



        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function suggest(){
        return view('admin.vue-route');
    }

    public function suggestList(){
        $suggestLists=Suggest::getSuggestList();
        $array=null;
        foreach ($suggestLists as $key=> $suggestList){

            $array[$key]['id']=$suggestList->id;
            $array[$key]['user_id']=$suggestList->user_id;
            $array[$key]['contact']=$suggestList->contact;
            $array[$key]['content']=$suggestList->content;
            //$array[$key]['create_at']=$suggestList->create_at;
            //$array[$key]['user_name']=$suggestList->users->name;
            //$array[$key]['user_mobile']=$suggestList->users->mobile;


        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function systemLog(){
        return view('admin.vue-route');
    }

    public function systemLogLists(){
        $systemLogLists=SystemLog::orderBy('created_at','desc')->get();

        $array=null;
        foreach ($systemLogLists as $key =>$systemLogList){
//            dd($systemLogList->user_admin->username);
            $array[$key]['id']=$systemLogList->id;
            $array[$key]['admin_id']=$systemLogList->user_admin->username;
            $array[$key]['action']=$systemLogList->action;
            $array[$key]['created_at']=date('Y-m-d H:i:s',$systemLogList->created_at);
        }

        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }




}
