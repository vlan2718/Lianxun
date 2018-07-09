<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\LogActionConst;
use App\Model\Integral_rule;
use App\Model\MessgesUser;
use App\Model\User_level;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPSTORM_META\elementType;

class IndexController extends Controller
{

    protected $user_level=null;
    protected $integral_rule=null;
    protected $users=null;
    protected $messgesUser=null;

    public function __construct(User_level $user_level,Integral_rule $integral_rule,Users $users,MessgesUser $messgesUser)
    {
        $this->user_level=$user_level;
        $this->integral_rule=$integral_rule;
        $this->users=$users;
        $this->messgesUser=$messgesUser;
    }
    /*
     * 会员等级设置页面调用
     */
    public function MemberLavel(){

        return view('admin.vue-route');
    }

    public function getLavelList(){
        $this->addLog(LogActionConst::GET_LEVEL_LIST);
        return json_encode($this->user_level->getLevel(),JSON_UNESCAPED_UNICODE);
    }


    public function createLevel(Request $request){
        if($request->has("id")){

            $this->user_level->updateLevel($request->id,$request->all());
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else{
            $this->addLog(LogActionConst::CREATE_LEVEL);
          $level=$this->user_level->createLevel($request->all());
            return json_encode(['code'=>'1','data'=>$level],JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateLevel(Request $request){
        $this->addLog(LogActionConst::UPDATE_LEVEL);
        $this->user_level->updateLevel($request->id,$request->all());
        return json_encode($request->level_id,JSON_UNESCAPED_UNICODE);
    }

    public function deleteLevel(Request $request){
        $this->addLog(LogActionConst::DELETE_LEVEL);
       User_level::where('id',$request->id)->delete();
        return json_encode($request->id,JSON_UNESCAPED_UNICODE);
    }


    public function MemberJifenConfig(){
        return view('admin.vue-route');
    }

    public function getMemberJifenConfig(){

        $this->addLog(LogActionConst::GET_JI_FEN_CONFIG);
        $Jifen=Integral_rule::getIntegral_rule();
        return json_encode($Jifen,JSON_UNESCAPED_UNICODE);
    }

    public function saveMemberJifenConfig(Request $request){
        $this->addLog(LogActionConst::SAVE_MEMBER_JI_FEN_CONFIG);
        $Jifens=$request->Jifens;
        foreach ($Jifens as $jifen){
           $this->integral_rule->saveIntegral_rule($jifen);
        }
        return json_encode($Jifens,JSON_UNESCAPED_UNICODE);
    }


    public function MembersAdmin(){

        return view('admin.vue-route');
    }

    public function getMembersAdmin(){
        $this->addLog(LogActionConst::GETMEMBERSADMIN);
      $users=Users::getUserList();
//        $users=$this->users->find(1);
//        dd($users->User_level->name);
        return json_encode($users,JSON_UNESCAPED_UNICODE);
    }

    public function MemberInfo(Request $request,Users $users){
        return view('admin.vue-route');
    }

    public function getUserByReg_invite_code(Request $request){
      $user=$this->users->getUserByReg_invite_code($request->reg_invite_code);
        return json_encode($user,JSON_UNESCAPED_UNICODE);
    }

    public function getUserById(Request $request){
        $this->addLog(LogActionConst::GETUSERBYID);
        $user=$this->users->getUserById($request->id);
               return json_encode($user,JSON_UNESCAPED_UNICODE);
    }

    public function updateUserInfo(Request $request){
        $user=$this->users->updateUserInfo($request->all());
        if ($request->images){
            $bg = $request->get('images');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
           $users=Users::find($request->id);
            $users->head_img=$bgurl;
            $users->save();
        }

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function updateUserInfoAvatar(Request $request){

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }
    public function ModManagePwd(){
        return view('admin.vue-route');
    }

    public function updatePassword(Request $request){

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function updateUserPassword(Request $request){
        $this->addLog(LogActionConst::UPDATEUSERPASSWORD);
       $user= $this->users->find($request->userId);
       $user->password=md5($request->password);
       $user->save();
        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function tomessageUserId(Request $request){
        $important=0;
        if($request->important){
           $important=1;
        }else{
            $important=0;
        }
        $to_user_id=$request->to_user_id;
        $message_Text=$request->message_Text;
        $form_user_id=\Auth::user()->id;
        $this->messgesUser->toMessage($to_user_id,$message_Text,$important,$form_user_id);

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function tomessageUserIds(Request $request){
        $important=0;
        if($request->important){
            $important=1;
        }else{
            $important=0;
        }
        $message_Text=$request->message_Text;
        $form_user_id=\Auth::user()->id;
       $users=Users::all();

       foreach ($users as $user){
           $this->messgesUser->toMessage($user->id,$message_Text,$important,$form_user_id);
       }

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);

    }


}
