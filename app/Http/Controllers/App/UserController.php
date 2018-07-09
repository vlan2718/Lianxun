<?php

namespace App\Http\Controllers\App;

use App\Model\NewsReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Model\Users;
use App\Model\News;
use App\Model\UserAuthentication;
use App\Model\Category;
use App\Model\UserSubscribeCategory;
use App\Model\UserSubscribeNews;
use App\Model\UserLevel;
use App\Http\Constants;
use App\Http\Controllers\Utility\Util;
use App\Model\IntegralRule;

class UserController extends AppBaseController
{
    const DEFAULT_HEAD_IMG = '/images/default.jpg';
    const INVITE_USER_LENGTH = 4;
    const INVITE_SYS_LENGTH = 6;

    private function generateAppNewsInfo($news)
    {
        $item['id'] = $news->id;
        $item['title'] = $news->title;
        $item['category'] = $news->category->name;
        $item['read'] = $news->read;
        $item['point_num'] = $news->countPoint();
        $item['subscribe_num'] = $news->countSubscribe();
        $item['time'] = Util::formatTime(strtotime($news->history_time));
        return $item;
    }

    public function info(Request $request)
    {
        if(Users::whereKey($request->user_id)->count() == 0){
            return $this->responseJSON(Constants::APP_USER_NOT_EXIST);
        }
        if($request->isMethod('post')){
            $profileInfo = $authInfo = [];;
            if($request->hasFile('head_img'))   $profileInfo['head_img'] = '/uploads/' . $request->head_img->store('image');
            if(!empty($request->name)){
                $profileInfo['name'] = $request->name;
                $authInfo['name'] = $request->name;
            }
            if(!empty($request->id_card))   $authInfo['id_card'] = $request->id_card;
            if(!empty($request->organization))  $authInfo['organization'] = $request->organization;
            if(!empty($request->duty))  $authInfo['duty'] = $request->duty;
            if($request->hasFile('id_card_up')) $authInfo['id_card_up'] = $request->id_card_up->store('authentication');
            if($request->hasFile('id_card_down'))   $authInfo['id_card_down'] = $request->id_card_down->store('authentication');
            if(!empty($profileInfo))    Users::whereKey($request->user_id)->update($profileInfo);
            if(!empty($authInfo)){
                if(UserAuthentication::whereKey($request->user_id)->count() == 0){
                    $authInfo['id'] = $request->user_id;
                    UserAuthentication::create($authInfo);
                }else{
                    UserAuthentication::whereKey($request->user_id)->update($authInfo);
                }
            }
        }
        $user = Users::whereKey($request->user_id)->first();
        $data = [
            'head_img' => env('APP_URL') . $user->head_img,
            'mobile' => $user->mobile,
            'name' => $user->name,
            'id_card' => empty($user->authenticate) ? '' : $user->authenticate->id_card,
            'organization' => empty($user->authenticate) ? '' : $user->authenticate->organization,
            'duty' => empty($user->authenticate) ? '' : $user->authenticate->duty,
            'id_card_up' => empty($user->authenticate) ? '' : env('APP_URL') . '/uploads/' . $user->authenticate->id_card_up,
            'id_card_down' => empty($user->authenticate) ? '' : env('APP_URL') . '/uploads/' . $user->authenticate->id_card_up
        ];
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }

    public function center($id)
    {
        if($user = Users::whereKey($id)->first()){
            $data['head_img'] = env('APP_URL') . '/uploads/' . $user->head_img;
            $data['nickname'] = $user->nickname;
            $data['description'] = $user->descripion;
            $data['msg'] = ['这是会员的重要消息1'];
            $data['post'] = '5';
            $data['subscribe_num'] = '23';
            $data['read'] = '56';
            $data['point_num'] = '31';
            return $this->responseJSON(Constants::APP_SUCCESS, $data);
        }
        return $this->responseJSON(Constants::APP_USER_NOT_EXIST);
    }

    public function msg(Request $request)
    {
        $data = [
            'point' => ['today_num' => '32', 'total' => '453'],
            'integral' => ['today_num' => '22', 'total' => '780'],
            'comment' => ['today_num' => '0', 'total' => '0'],
            'msg_list' => [
                [
                    'time' => Util::formatDate(time(), false),
                    'message' => '我收到了一条消息',
                ]
            ],
        ];
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }

    public function login(Request $request)
    {
        if(!$request->filled(['mobile', 'password'])){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $data = $request->all();
        $host = env('APP_URL');
        if($user = Users::select(DB::raw("id, mobile, nickname, level, name, gender, concat('{$host}/', head_img) head_img, description, user_invited_code, sign_time"))
            ->where(['mobile' => $data['mobile'], 'password' => $data['password']])->first()){
            $user->last_login_time = time();
            $user->save();
            $user->sign_time = $user->sign_time > strtotime(date('Y-m-d')) ? 1 : 0;
            return $this->responseJSON(Constants::APP_SUCCESS, $user);
        }
        return $this->responseJSON(Constants::APP_ERROR_LOGIN_FAILED);
    }

    public function register(Request $request)
    {
        if(!$request->filled(['mobile', 'captcha', 'password', 'code'])){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $data = $request->all();
        $captcha = Redis::get($data['mobile']);
        if(empty($captcha) || $captcha != $data['captcha']){
            return $this->responseJSON(Constants::APP_ERROR_CAPTCHA);
        }
        if(!Util::checkMobile($data['mobile'])){
            return $this->responseJSON(Constants::APP_MOBILE_ERROR);
        }
        if(Users::where('mobile', $data['mobile'])->count() > 0){
            return $this->responseJSON(Constants::APP_ERROR_MOBILE_EXIST);
        }
        $inviteCode = $data['code'];
        if(strlen($inviteCode) != self::INVITE_SYS_LENGTH && strlen($inviteCode) != self::INVITE_USER_LENGTH || Users::where('user_invited_code', $inviteCode)->count() == 0){
            return $this->responseJSON(Constants::APP_INVITE_CODE_NOT_EXIST);
        }
        $userInfo = [
            'mobile' => $data['mobile'],
            'password' => $data['password'],
            'nickname' => '',
            'level' => 0,
            'name' => '',
            'gender' => 0,
            'description' => '',
            'last_login_time' => time(),
            'head_img' => self::DEFAULT_HEAD_IMG,
            'user_invited_code' => Users::generateInviteCode(),
            'reg_invite_code' => $inviteCode,
            'reg_code_type' => strlen($inviteCode) == self::INVITE_USER_LENGTH ? Users::REG_CODE_TYPE_USER : Users::REG_CODE_TYPE_SYS,
        ];
        $user = Users::create($userInfo);
        $userInfo['id'] = $user->id;
        $userInfo['head_img'] = env('APP_URL') . $userInfo['head_img'];
        $userInfo['last_login_time'] = Util::formatDate($userInfo['last_login_time']);
        $userInfo['created_at'] = Util::formatDate(strtotime($user->created_at));
        $userInfo['updated_at'] = Util::formatDate(strtotime($user->updated_at));
        $userInfo['sign_time'] = 0;
        unset($userInfo['password']);
        return $this->responseJSON(Constants::APP_SUCCESS, $userInfo);
    }

    public function regCodeExist(Request $request)
    {
        if(!$request->filled('code')){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $code = $request->input('code');
        if(strlen($code) != self::INVITE_USER_LENGTH && strlen($code) != self::INVITE_SYS_LENGTH){
            return $this->responseJSON(Constants::APP_SUCCESS, 0);
        }
        return $this->responseJSON(Constants::APP_SUCCESS, Users::where('user_invited_code', $code)->count());
    }

    public function resetpwd(Request $request)
    {
        if(!$request->filled(['mobile', 'captcha', 'password'])){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $data = $request->all();
        $captcha = Redis::get($data['mobile']);
        if(empty($captcha)){
            return $this->responseJSON(Constants::APP_ERROR_CAPTCHA);
        }
        if($data['captcha'] != $captcha){
            return $this->responseJSON(Constants::APP_ERROR_CAPTCHA);
        }
        if($user = Users::where('mobile', $data['mobile'])->first()){
            $user->password = $data['password'];
            if($user->save()){
                return $this->responseJSON(Constants::APP_SUCCESS);
            }
            return $this->responseJSON(Constants::APP_FAILED);
        }
        return $this->responseJSON(Constants::APP_ERROR_MOBILE_NOT_EXIST);
    }

    public function authenticate(Request $request)
    {
        if(!$request->filled(['id', 'name', 'id_card', 'organization', 'duty']) || !$request->hasFile('id_card_up') || !$request->hasFile('id_card_down')){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $data = $request->except(['id_card_up', 'id_card_down']);
        if($user = Users::where('id', $data['id'])){
            $data['id_card_up'] = '/uploads/' . $request->id_card_up->store('authentication');
            $data['id_card_down'] = '/uploads/' . $request->id_card_down->store('authentication');
            if($userAuthInfo = UserAuthentication::where('id', $data['id'])->first()){
                foreach ($data as $key=>$value){
                    $userAuthInfo->setAttribute($key, $value);
                }
                $userAuthInfo->save();
                return $this->responseJSON(Constants::APP_SUCCESS);
            }
            UserAuthentication::create($data);
            return $this->responseJSON(Constants::APP_SUCCESS);
        }
        return $this->responseJSON(Constants::APP_USER_NOT_EXIST);
    }

    public function subscribeCategory(Request $request)
    {
        if(!$request->filled(['user_id', 'categories']) || Users::whereKey($request->user_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        $userId = intval($request->user_id);
        $postCategories = explode('|', $request->categories);
        $saveCategories = [];
        $timestamp = time();
        $distinct = [];
        foreach($postCategories as $item) {
            $array = explode(',', $item);
            $categoryId = intval($array[0]);
            if(Category::where('id', $categoryId)->count() == 0){
                return $this->responseJSON(Constants::APP_CATEGORY_NOT_EXIST);
            }
            $orderNo = isset($array[1]) ? intval($array[1]) : 0;
            if(!in_array("{$userId}_{$categoryId}", $distinct)) {
                $saveCategories[] = ['user_id' => $userId, 'category_id' => $categoryId, 'created_at' => $timestamp, 'order_no' => $orderNo];
                $distinct[] = "{$userId}_{$categoryId}";
            }
        }
        UserSubscribeCategory::where('user_id', $userId)->delete();
        UserSubscribeCategory::insert($saveCategories);
        return $this->responseJSON(Constants::APP_SUCCESS);
    }

    public function categories($id)
    {
       return $this->responseJSON(Constants::APP_SUCCESS, Users::where('id', $id)->first()->categories);
    }

    public function sign($id)
    {
        if($user = Users::whereKey($id)->first()){
            if($user->sign_time > strtotime(date('Y-m-d'))){
                return $this->responseJSON(Constants::APP_ERROR_HAS_SIGN);
            }
            $user->sign_time = time();
            $user->sign = $user->sign + 1;
            $user->integral = $user->integral + IntegralRule::where('event', IntegralRule::EVENT_SIGN)->first()->value;
            $user->save();
            return $this->responseJSON(Constants::APP_SUCCESS, ['sign' => $user->sign, 'integral' => $user->integral]);
        }
        return $this->responseJSON(Constants::APP_ERROR_PARAMS);
    }

    public function subscribeNews(Request $request)
    {
        if(!$request->filled(['user_id', 'news_id']) || Users::whereKey($request->user_id)->count() == 0 || News::whereKey($request->news_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        if(UserSubscribeNews::where(['user_id' => $request->user_id, 'news_id' => $request->news_id])->count('id') == 0) {
            UserSubscribeNews::create(['user_id' => $request->user_id, 'news_id' => $request->news_id, 'created_at' => time()]);
        }
        return $this->responseJSON(Constants::APP_SUCCESS);
    }

    public function level($id)
    {
        if($user = Users::whereKey($id)->first()){
            $userLevel = UserLevel::where([['sign_days', '>=', $user->sign], ['integral', '>=', $user->integral]])->orderBy('sign_days')->orderBy('integral')->first();
            return $this->responseJSON(Constants::APP_SUCCESS, ['sing_days' => $user->sign, 'integral' => $user->integral, 'level' => $userLevel->level_name]);
        }
        return $this->responseJSON(Constants::APP_ERROR_PARAMS);
    }

    public function history($id)
    {
        if($user =  Users::whereKey($id)->first()){
            $data = [];
            foreach ($user->history as $news){
                $data[] = $this->generateAppNewsInfo($news);
            }
            return $this->responseJSON(Constants::APP_SUCCESS, $data);
        }
        return $this->responseJSON(Constants::APP_ERROR_PARAMS);

    }

    public function read(Request $request)
    {
        if(!$request->filled(['user_id', 'news_id']) || Users::whereKey($request->user_id)->count() == 0 || News::whereKey($request->news_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        if(UserNewsHistory::where(['user_id' => $request->user_id, 'news_id' => $request->news_id])->count() == 0){
            UserNewsHistory::create($request->all());
        }
        return $this->responseJSON(Constants::APP_SUCCESS);
    }

    public function news($id)
    {
        if($user =  Users::whereKey($id)->first()){
            $data = [];
            foreach ($user->news as $news){
                $data[] = $this->generateAppNewsInfo($news);
            }
            return $this->responseJSON(Constants::APP_SUCCESS, $data);
        }
        return $this->responseJSON(Constants::APP_ERROR_PARAMS);
    }

    public function post()
    {
        return $this->responseJSON(Constants::APP_SUCCESS);
    }

    public function report(Request $request)
    {
        if(!$request->filled(['user_id', 'news_id', 'reason', 'remark']) || Users::whereKey($request->user_id)->count() == 0 || News::whereKey($request->news_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        NewsReport::create($request->all());
        return $this->responseJSON(Constants::APP_SUCCESS);
    }
}