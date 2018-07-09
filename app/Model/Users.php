<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Utility\Util;

class Users extends Model
{
    //
    protected $table = 'u_user';

    public const REG_CODE_TYPE_USER = 1;
    public const REG_CODE_TYPE_SYS = 2;

    public const USER_STATUS = 0;

    protected $fillable = ['mobile', 'password', 'head_img', 'user_invited_code', 'reg_invite_code', 'reg_code_type'];

    public function suggest()
    {
        return $this->hasMany('App\Model\Suggest','user_id','id');
    }

    //protected $dateFormat = 'U';

    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    /*
     * 生成邀请码
     * */
    public static function generateInviteCode()
    {
        while (true){
            $code = Util::randomString();
            if(Users::where('user_invited_code', $code)->count() == 0){
                return $code;
            }
        }
    }
    /*
     * 用户收藏的分类
     * */
    public function categories()
    {
        return $this->hasManyThrough('App\Model\Category', 'App\Model\UserSubscribeCategory', 'user_id', 'id', 'id', 'category_id')
            ->select(DB::raw('category_id id, name'));
    }
    /*
     * 用户的阅读历史
     * */
    public function history()
    {
        return $this->hasManyThrough('App\Model\News', 'App\Model\UserNewsHistory', 'user_id', 'id', 'id', 'news_id')
            ->select(DB::raw("u_news.*,u_user_news_history.created_at history_time"));
    }
    /*
     * 用户收藏的新闻列表
     * */
    public function news()
    {
        return $this->hasManyThrough('App\Model\News', 'App\Model\UserSubscribeNews', 'user_id', 'id', 'id', 'news_id')
            ->select(DB::raw("u_news.*,u_user_subscribe_news.created_at history_time"));
    }
    /*
     * 用户实名认证信息
     * */
    public function authenticate()
    {
        return $this->hasOne('App\Model\UserAuthentication', 'id');
    }
    /*--------------------------------------------------------------------------------------*/

    public function getUserDetailsById($uid){
            $data=DB::table('u_user')->join('u_user_authentication','u_user_authentication.user_id','=','u_user.id')
            ->where('u_user.id',$uid)->first();
        if($data->sign_time<strtotime(date("Y-m-d "))){
                $data->is_sign='0';
            }else{
                $data->is_sign='1';
        }
        return $data;
    }
//    public function User_level(){
//        return $this->belongsTo('App\Model\User_level','level','id');
//    }
    /*
     * 会员等级详情
     */
    public function getUserGradeById($uid){
        $user=self::where('id',$uid)->select('id','integral','sign')->first();
        $data=DB::table('u_user_level')->get();
            foreach ($data as $value){
            if($user->integral >=$value->integral && $user->sign >= $value->sign_days){
                $user['grade']=$value;
                return $user;
            }
        }
    }
    /*
     * 会员消息列表
     */
    public function getUserNewsById($uid){
        return DB::table('u_message')->where('user_id',$uid)->get();
    }
    /*
     * 会员注册
     */
    public function UserRegister($array){
        $data=self::where('mobile',$array['mobile'])->first();
        if($data){
            return false;
        }else{
            $code=rand(11111,99999);
            $this->mobile=$array['mobile'];
            $this->password=md5($array['password']);
            $this->reg_invite_code=$array['reg_invite_code'];
            $this->user_invited_code=$code;
            $this->save();
            DB::table('u_system_code')->insert(['code'=>$code,'mobile'=>$array['mobile'],'status'=>'0']);
            DB::table('u_system_code')->where('code',$array['reg_invite_code'])->update(['status'=>'1']);
            return $this->id;
        }
    }


    /*
     * 会员登录
     */
    public function UserLogin($array){
        $data=self::where([
            ['mobile',$array['mobile']],
            ['password',md5($array['password'])]
        ])->first();
        if($data){
            return $data;
        }else{
            return false;
        }
    }

    /*
     * 会员修改密码
     */
    public function UserEditPassword($array){
        $data=self::where([
            ['mobile',$array['mobile']],
            ['password',md5($array['password'])]
        ])->first();
        if($data){
            return  self::where('mobile',$array['mobile'])->update(['password'=>md5($array['new_password'])]);
        }else{
            return false;
        }
    }
    /*
     * 会员重置密码
     */
    public function ResetPasswordByMobile($array){
        return  self::where('mobile',$array['mobile'])->update(['password'=>md5($array['new_password'])]);
    }
    /*
     * 会员修改个人信息
     */
    public function UserEditInformation($array){
        $data=self::find($array['id']);
        $data->head_img=$array['head_img'];
        $data->mobile=$array['mobile'];
        $data->name=$array['name'];
        $data->save();
        DB::table('u_user_authentication')->where('user_id',$array['id'])->update([
            'id_card_facade'=>$array['id_card_facade'],
            'id_card_verso'=>$array['id_card_verso'],
            'id_card'=>$array['id_card'],
            'real_name'=>$array['name'],
            'organizaztion'=>$array['organizaztion'],
            'duty'=>$array['duty'],
        ]);
        return true;
    }


    /*
     * 会员实名认证
     */
    public function UserCertification($array){
        $data=DB::table('u_user_authentication')->insert([
            'user_id'=>$array['user_id'],
            'real_name'=>$array['real_name'],
            'id_card'=>$array['id_card'],
            'organizaztion'=>$array['organizaztion'],
            'duty'=>$array['duty'],
            'id_card_facade'=>$array['id_card_facade'],
            'id_card_verso'=>$array['id_card_verso']
            ]);
        if($data){
            return $data;
        }else{
            return false;
        }
    }
    /*
     * 会员签到
     */
    public function UserSingInById($uid){
        $data=self::where('id',$uid)->select('sign_time')->first();
        if($data->sign_time<strtotime(date("Y-m-d "))){
            $number=DB::table('u_integral_rule')->where('id',1)->first();
            self::where('id',$uid)->increment('sign',1);
            self::where('id',$uid)->update(['sign_time'=>time()]);
            return self::where('id',$uid)->increment('integral',$number->value);
        }else{
            return false;
        }
    }
    /*
     * 验证邀请码
     */
    public function UserVerificationCodeByCode($code){
        if(strlen($code)>5){
            $data=DB::table('u_system_code')->where(['code'=>$code,'status'=>'0'])->first();
        }else{
            $data=DB::table('u_system_code')->where(['code'=>$code])->first();
        }
        if($data){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 关于我们
     */
    public function getAboutUs(){
        return DB::table('u_system_config_item')->select('value')->where('group_id',18)->first();
    }
    /*
     * 版本信息
     */
    public function getVersionInformation(){
        return DB::table('u_system_config_item')->select('value')->where('group_id',19)->first();
    }
    /*
     * 建议反馈
     */
    public function aggProposal($array){
        $value=$array['content'].','.$array['phone'];
        $data=DB::table('u_system_config_item')->insert([
            'group_id'=>'20',
            'label'=>'建议反馈',
            'value'=>$value
        ]);
        if($data){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 会员录入、收藏、阅读数量
     */
    public function getUserNumber($userId){
        $keep=DB::table('u_user_news')->where(['user_id'=>$userId,'news_id'=>'1'])->count();
        $collection=DB::table('u_user_subscribe_news')->where('user_id',$userId)->count();
        $read=DB::table('u_user_news_history')->where('user_id',$userId)->count();
        $data=['keep'=>$keep,'collection'=>$collection,'read'=>$read];
        return $data;
    }
    /*
     * 用户收藏分类列表
     */
    public function getUserKeepCategoryListById($userId){
        $data=DB::table('u_user_subscribe_category')->join('u_category','u_category.id','=','u_user_subscribe_category.category_id')
            ->select('u_user_subscribe_category.created_at','u_user_subscribe_category.order_no','u_user_subscribe_category.category_id','u_category.name','u_user_subscribe_category.user_id')
            ->where('u_user_subscribe_category.user_id',$userId)
            ->get();
        return $data;
    }
    /*
     * 用户编辑收藏分类
     */
    public function EditUserCategory($array){
        return DB::table('u_user_subscribe_category')->where(['user_id'=>$array['user_id'],'category_id'=>$array['category_id']])->update(['order_no'=>$array['order_no']]);
    }
    /*
     * 系统消息
     */
    public function getUserMessageById($userId){
        return DB::table('u_message')->where('to_user_id',$userId)->get();
    }

    public static function getUserList(){
        $users = self::all();
        $array=null;
        foreach ($users as $key=> $user){
            $array[$key]['id']=$user->id;
            $array[$key]['mobile']=$user->mobile;
            $array[$key]['nickname']=$user->nickname;
            $array[$key]['mobile']=$user->mobile;
            $array[$key]['reg_invite_code']=$user->reg_invite_code;
            $array[$key]['user_status']=$user->user_status;
            $array[$key]['sign']=$user->sign;//签到
            $array[$key]['integral']=$user->integral;//积分

            $array[$key]['user_invited_code']=$user->user_invited_code;
            $array[$key]['history']=DB::table('u_user_news_history')->where('user_id',$user->id)->count();
            $array[$key]['subscribe']=DB::table('u_user_subscribe_news')->where('user_id',$user->id)->count();
            $array[$key]['fabu']=DB::table('u_user_news')->where('user_id',$user->id)->count();
            $array[$key]['shoulu']=DB::table('u_user_news')->where('user_id',$user->id)->where('news_id',1)->count();
            $array[$key]['luru']=DB::table('u_user_news')->where('user_id',$user->id)->where('news_id',2)->count();

            $sign_days=DB::table('u_user_level')->where('sign_days','<=',$user->sign)->orderBy('sign_days', 'desc')->first();
            $integral=DB::table('u_user_level')->where('sign_days','<=',$user->integral)->orderBy('integral', 'desc')->first();
            $array[$key]['Level_sign']=$sign_days;
            $array[$key]['Level_integral']=$integral;
            if ($sign_days->sign_days > $integral->sign_days && $sign_days->integral > $integral->integral ){
                $array[$key]['level']=$integral;
                $array[$key]['level_id']=$integral->id;
                $array[$key]['level_name']=$integral->level_name;
            }else{
                $array[$key]['level']=$sign_days;
                $array[$key]['level_id']=$sign_days->id;
                $array[$key]['level_name']=$sign_days->level_name;
            }
        }
        return $array;
    }

    public function getUserByReg_invite_code($reg_invite_code){
        return self::where('user_invited_code',$reg_invite_code)->first();
    }

    public function getUserById($id){
        $user =self::find($id);
        //$array['id']=$user->id;
        $array['mobile']=$user->mobile;
        $array['nickname']=$user->nickname;
        $array['name']=$user->name;
        $array['gender']=$user->gender;
        $array['password']=$user->password;
        $array['head_img']=$user->head_img;
        $array['description']=$user->description;
        $array['user_status']=$user->user_status;
        $array['created_at']=$user->created_at->format('Y-m-d H:i:s');
        $array['updated_at']=$user->updated_at->format('Y-m-d H:i:s');
        $array['user_invited_code']=$user->user_invited_code;
        $array['openid']=$user->openid;
        $array['platform']=$user->platform;
        $array['reg_invite_code']=$user->reg_invite_code;
        $array['reg_code_type']=$user->reg_code_type;
        $array['integral']=$user->integral;
        $array['sign']=$user->sign;
        $array['sign_time']=$user->sign_time;
        $array['last_login_time']=$user->last_login_time;

        $sign_days=DB::table('u_user_level')->where('sign_days','<=',$user->sign)->orderBy('sign_days', 'desc')->first();
        $integral=DB::table('u_user_level')->where('sign_days','<=',$user->integral)->orderBy('integral', 'desc')->first();
        $array['Level_sign']=$sign_days;
        $array['Level_integral']=$integral;
        if ($sign_days->sign_days > $integral->sign_days && $sign_days->integral > $integral->integral ){
            $array['level']=$integral;
            $array['level_id']=$integral->id;
            $array['level_name']=$integral->level_name;
        }else{
            $array['level']=$sign_days;
            $array['level_id']=$sign_days->id;
            $array['level_name']=$sign_days->level_name;
        }

        return $array;
    }

    public function updateUserInfo($array){
        $user=self::find($array['id']);
        if($array['old_level_id'] != $array['level_id']){
            $new_leve=DB::table('u_user_level')->where('id',$array['level_id'])->first();
            $user->integral=$new_leve->integral;
            $user->sign=$new_leve->sign_days;
        }
        $user->mobile=$array['mobile'];
        $user->user_status=$array['user_status'];
        $user->name=$array['name'];
        $user->nickname=$array['nickname'];
        $user->gender=$array['gender'];
        $user->created_at=strtotime($array['created_at']);
        $user->description=$array['description'];
        $user->save();
    }

    public static function getUserRuleList(){

        $users=self::all();
        $array=null;
        foreach ($users as $key =>$user){
            $array[$key]['id']=$user->id;
            $array[$key]['name']=$user->name;
            $array[$key]['checked']=false;
        }

        return $array;
    }

    public  function getUserRuledList($arr){
        $users=self::all();
        $array=null;
        foreach ($users as $key =>$user){
            $array[$key]['id']=$user->id;
            $array[$key]['name']=$user->name;
            if(in_array($user->id,$arr) ){
                $array[$key]['checked']=true;
            }else{
                $array[$key]['checked']=false;
            }
        }
        return $array;
    }


//    public static function getUserList(){
//        $users = DB::table('u_user')
//            ->leftJoin('u_user_level', 'u_user_level.level_id', '=', 'u_user.level')
//            ->get();
//            $array=null;
//        foreach ($users as $key=> $user){
//            $array[$key]['id']=$user->id;
//            $array[$key]['mobile']=$user->mobile;
//            $array[$key]['nickname']=$user->nickname;
//            $array[$key]['mobile']=$user->mobile;
//            $array[$key]['level_name']=$user->level_name;
//            $array[$key]['reg_invite_code']=$user->reg_invite_code;
//            $array[$key]['user_status']=$user->user_status;
//            $array[$key]['sign']=$user->sign;
//            $array[$key]['integral']=$user->integral;
//            $array[$key]['user_invited_code']=$user->user_invited_code;
//            $array[$key]['history']=DB::table('u_user_news_history')->where('user_id',$user->id)->count();
//            $array[$key]['subscribe']=DB::table('u_user_subscribe_news')->where('user_id',$user->id)->count();
//            $array[$key]['fabu']=DB::table('u_user_news')->where('user_id',$user->id)->count();
//            $array[$key]['shoulu']=DB::table('u_user_news')->where('user_id',$user->id)->where('news_id',1)->count();
//            $array[$key]['luru']=DB::table('u_user_news')->where('user_id',$user->id)->where('news_id',2)->count();
//
//        }
//
//        return $array;
//    }

//    public function getUserByReg_invite_code($reg_invite_code){
//        return self::where('user_invited_code',$reg_invite_code)->first();
//    }

//    public function getUserById($id){
//        $user = DB::table('u_user')
//            ->where('u_user.id',$id)
//            ->leftJoin('u_user_level', 'u_user_level.level_id', '=', 'u_user.level')
//            ->get();
//        return $user;
//    }

//    public function updateUserInfo($array){
//        $user=self::find($array['id']);
//        $user->level=$array['level'];
//        $user->mobile=$array['mobile'];
//        $user->user_status=$array['user_status'];
//        $user->name=$array['name'];
//        $user->nickname=$array['nickname'];
//        $user->gender=$array['gender'];
//        $user->created_at=$array['created_at'];
//        $user->description=$array['description'];
//        $user->save();
//    }

}
