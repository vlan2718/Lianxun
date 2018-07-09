<?php

namespace App\Http\Controllers\Test;

use App\Model\User;
use App\Model\Advertising;
use App\Model\News;
use App\Model\Users;
use App\Model\Category;
use App\Model\Common_tag;
use App\Model\NewsReport;
use App\Model\SystemConfig;
use App\Model\UserSubscribeCategory;
use App\Model\UserNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ApiController extends Controller
{
    public $User=null;
    public $News=null;
    public $Users=null;
    public $Category=null;
    public $UserNews=null;
    public $Advertising=null;
    public $Common_tag=null;
    public $NewsReport=null;
    public $SystemConfig=null;

    public $UserSubscribeCategory=null;
    public function __construct(User $User,Advertising $Advertising,News $News,Category $Category,Common_tag $Common_tag,
       UserSubscribeCategory $UserSubscribeCategory,NewsReport $NewsReport,Users $Users,UserNews $UserNews,SystemConfig $SystemConfig
    )
    {
        $this->User=$User;
        $this->News=$News;
        $this->Users=$Users;
        $this->Category=$Category;
        $this->UserNews=$UserNews;
        $this->Advertising=$Advertising;
        $this->Common_tag=$Common_tag;
        $this->NewsReport=$NewsReport;
        $this->SystemConfig=$SystemConfig;
        $this->UserSubscribeCategory=$UserSubscribeCategory;
    }

    /*
     * 广告页轮播图
     */
    public function getBanner(){
         $data=$this->Advertising->getBannerList();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }

    /*
     * 启动页图片
     */
    public function SystemConfig(){
        $data=$this->SystemConfig->SystemConfigList();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }

    /*
     * 首页搜索
     */
    public function NewsList(Request $Request){
        if($Request->title || $Request->description || $Request->status_label){
            $data=$this->News->getNewsList($Request->all());
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
           return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 新闻列表
     */
    public function News($category_id,$userId){
        $data=$this->News->getNews($category_id,$userId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 新闻详情
     */
    public function NewsDetails($UserId,$NewsId){
        $data=$this->News->getNewsDetailsById($NewsId);
        $this->News->addNewsRecord($UserId,$NewsId);
        $tag=$this->Common_tag->NewsTag($NewsId);
        $point=$this->News->getNewsPointById($NewsId);
        $report=$this->News->getNewsReport();
        return view('api.index',['data'=>$data,'user_id'=>$UserId,'news_id'=>$NewsId,'tag'=>$tag,'point'=>$point,'report'=>$report]);

    }

    /*
     * 新闻分类列表
     */
    public function CategoryList(){
        $data=$this->Category->getCategoryList();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }

    /*
     * 标签列表
     */
    public function LabelList(){
        $data=$this->Common_tag->getCommonName();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 政策新闻分类列表
     */
    public function PolicyCategoryList(){
        $data=$this->Category->getCategoryList();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }

    /*
     * 政策标签列表
     */
    public function  PolicyLabelList(){
        $data=$this->Common_tag->getCommonName();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     *用户收藏分类
     */
    public function getUserCategory($userId){
        if($userId){
            $data=$this->UserSubscribeCategory->getUserSubscribeCategory($userId);
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少用户id'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
    * 新闻/分类 收藏
    */
    public function NewsCollection(Request $Request){
        if($Request->all()){
            $data=$this->News->NewsCollectionById($Request->all());
            if($data==false){
                return json_encode(['code'=>'0','msg'=>'收藏失败'],JSON_UNESCAPED_UNICODE);
            }
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0',',msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }


    /*
     * 举报原因接口   post
     */
    public function AddReportReason(Request $Request){
        if($Request->user_id && $Request->reason){
            $data=$this->NewsReport->AddNewsReport($Request->all());
           return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员详情   get
     */
    public function UserDetails($userId){
        if($userId){
            $data=$this->Users->getUserDetailsById($userId);
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少用户id'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员等级详情
     */
    public function UserGrade($userId){
        if($userId){
            $data=$this->Users->getUserGradeById($userId);
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'1','msg'=>'缺少用户id'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员消息列表
     */
    public function UserNewsList($userId){
        if($userId){
            $data=$this->Users->getUserNewsById($userId);
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'1','msg'=>'缺少用户id'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员注册
     */
    public function Register(Request $Request){
        if($Request->all()){
            $exists = Redis::exists('code:'.$Request->mobile.':'.$Request->mobile);
            if($exists==false){
                Redis::DEL('code:'.$Request->mobile.':');
            }
            $values = Redis::get('code:'.$Request->mobile.':');
            if($values!==$Request->code){
               return json_encode(['code'=>'0','msg'=>'验证码不正确，或已过期，请重新发送！'],JSON_UNESCAPED_UNICODE);
            }
            $data=$this->Users->UserRegister($Request->all());
            if($data==false){
                return json_encode(['code'=>'0','msg'=>'该手机号已注册'],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }

    /*
     * 会员登录
     */
    public function login(Request $Request){
        if($Request->all()){
            $data=$this->Users->UserLogin($Request->all());
            if($data==true){
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'0','msg'=>'账号或密码不正确'],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员修改密码
     */
    public function UserEditPassword(Request $Request){
        if($Request->all()){
            $data=$this->Users->UserEditPassword($Request->all());
            if($data==false){
                return json_encode(['code'=>'0','msg'=>'原密码不正确'],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员重置密码
     */
    public function ResetPassword(Request $Request){
        if($Request->all()){
            $exists = Redis::exists('code:'.$Request->mobile.':'.$Request->mobile);
            if($exists==false){
                Redis::DEL('code:'.$Request->mobile.':');
            }
            $values = Redis::get('code:'.$Request->mobile.':');

            if($values!==$Request->code){
                return json_encode(['code'=>'0','msg'=>'验证码不正确，或已过期，请重新发送！'],JSON_UNESCAPED_UNICODE);
            }
            $data=$this->Users->ResetPasswordByMobile($Request->all());
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员修改个人信息
     */
    public function UserEditInformation(Request $Request){
        $data=$this->Users->UserEditInformation($Request->all());
        if($data==false){
            return json_encode(['code'=>'0','msg'=>'修改失败'],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 实名认证
     */
    public function Certification(Request $Request){
        if($Request->all()){
            $data=$this->Users->UserCertification($Request->all());
            if($data){
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'0','msg'=>'提交失败'],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 新闻打分
     */
    public function score(Request $Request){
        if($Request->all()){
            $data=$this->News->UserScoreNews($Request->all());
            if($data==false){
                return json_encode(['code'=>'0','msg'=>'保存失败'],JSON_UNESCAPED_UNICODE);
            }
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }

    /*
     * 我的新闻收藏列表
     */
    public function UserKeepList($UserId){
        $data=$this->News->UserKeepListById($UserId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 用户分类收藏列表
     */
    public function UserKeepCategoryList($userId){
        $data=$this->Users->getUserKeepCategoryListById($userId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 用户编辑收藏分类
     */
    public function EditUserCategory(Request $Request){
        if($Request->all()){
           $data=$this->Users->EditUserCategory($Request->all());
           if($data==true){
               return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
           }else{
               return json_encode(['code'=>'0','msg'=>'保存失败'],JSON_UNESCAPED_UNICODE);
           }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }

    /*
     * 会员新闻提交
     */
    public function AddNews(Request $Request){
        if($Request->all()){
            $data=$this->UserNews->UserAddNews($Request->all());
            if($data==true){
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'0','msg'=>'添加失败'],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 阅读列表
     */
    public function UserReadList($UserId){
        $data=$this->News->UserReadListById($UserId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 会员签到
     */
    public function UserSingIn($UserId){
        $data=$this->Users->UserSingInById($UserId);
        if($data==false){
            return json_encode(['code'=>'1','data'=>'今天已经签到过了，明天再来！'],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 验证邀请码
     */
    public function VerificationCode($code){
        $data=$this->Users->UserVerificationCodeByCode($code);
        if($data==true){
            return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['code'=>'0','msg'=>'邀请码不正确，或已被使用'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 我的收录列表
     */
    public function MyKeep($UserId){
        $data=$this->UserNews->getMyKeepByType($UserId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 排序
     */
    public function Sort($type){
        $data=$this->News->getNewsSortByType($type);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 专家解读
     */
    public function ExpertAnalysis($newsId){
        $data=$this->News->getExpertAnalysisListById($newsId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 举报原因列表
     */
    public function ReportList(){
        $data=$this->News->getReportList();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 关于我们
     */
    public function AboutUs(){
        $data=$this->Users->getAboutUs();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 版本信息
     */
    public function VersionInformation(){
        $data=$this->Users->getVersionInformation();
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 建议反馈
     */
    public function Proposal(Request $Request){
        if($Request->all()){
            $data=$this->Users->aggProposal($Request->all());
            if($data==true){
                return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
            }else{
                return json_encode(['code'=>'0','msg'=>'提交失败'],JSON_UNESCAPED_UNICODE);
            }
        }else{
            return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 会员录入、收藏、阅读数量
     */
    public function UserCount($userId){
        $data=$this->Users->getUserNumber($userId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }
    /*
     * 系统消息
     */
    public function UserMessage($userId){
        $data=$this->Users->getUserMessageById($userId);
        return json_encode(['code'=>'1','data'=>$data],JSON_UNESCAPED_UNICODE);
    }

}
