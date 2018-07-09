<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'App', 'prefix'=>'v1', 'middleware'=>['app.auth']], function(){
    Route::post('user/login', 'UserController@login');   //会员登录
    Route::post('user/register', 'UserController@register');  //会员注册
    Route::post('user/resetpwd', 'UserController@resetpwd'); //修改密码
    Route::get('user/reg_code_exist', 'UserController@regCodeExist'); //注册邀请码是否存在
    Route::post('user/authenticate', 'UserController@authenticate'); //用户实名认证
    Route::post('user/subscribe_category', 'UserController@subscribeCategory'); //用户收藏分类
    Route::get('user/categories/{id}', 'UserController@categories'); //用户收藏的分类列表
    Route::get('user/news/{id}', 'UserController@news');  //用户收藏的新闻列表
    Route::get('user/level/{id}', 'UserController@level'); //用户等级详情
    Route::get('user/sign/{id}', 'UserController@sign'); //用户签到
    Route::get('user/read','UserController@read'); //登录用户阅读新闻
    Route::get('user/msg', 'UserController@msg'); //用户消息记录 todo   暂时返回假数据
    Route::get('user/center/{id}', 'UserController@center'); //用户中心 todo  暂时返回假数据
    Route::any('user/info', 'UserController@info');  //用户详细信息
    Route::post('user/post', 'UserController@post'); //用户提交新闻 todo  暂时返回假数据
    Route::post('user/subscribe_news', 'UserController@subscribeNews'); //用户收藏新闻
    Route::get('user/history/{id}', 'UserController@history'); //用户新闻阅读记录
    Route::post('user/report', 'UserController@report'); //用户举报新闻
    Route::get('category/list', 'CategoryController@list'); //分类列表
    Route::get('category/news', 'CategoryController@news'); //子分类下的新闻列表，含专家解读 todo 暂时返回假数据
    Route::get('category/one', 'CategoryController@one'); //显示在底部导航分类
    Route::get('category/top', 'CategoryController@top'); //顶部分类导航
    Route::get('category/subitem/{id}', 'CategoryController@subitem'); //分类下属分类
    Route::post('sms/send', 'SmsController@send');  //发送验证码
    Route::get('news/category/{id}', 'NewsController@category'); //首页分类下面的新闻列表 todo  暂时返回假数据
    Route::get('news/detail/{id}', 'NewsController@detail'); //新闻详情  todo
    Route::get('news/search/{keyword}', 'NewsController@search'); //新闻搜索
    Route::get('news/point', 'NewsController@point'); //新闻打分
    Route::get('news/read/{id}', 'NewsController@read');  //未登录用户添加新闻阅读记录
    Route::get('launch/image', 'LaunchController@image'); //启动图
    Route::get('banner/list', 'BannerController@list'); //轮播图列表(banner)
    Route::get('tag/list', 'TagController@list'); //标签列表
    Route::get('tag/detail/{id}', 'TagController@detail'); //标签详情
    Route::get('config/report', 'ConfigController@report'); //获取举报原因
    Route::get('config/version', 'ConfigController@version'); //版本信息
    Route::get('config/about', 'ConfigController@about'); //关于我们
    Route::post('suggest/submit', 'SuggestController@submit'); //建议反馈
});

Route::group(['namespace'=>'Test','prefix'=>'v1/news'],function (){
    Route::get('/getList','ApiController@getList');
    Route::get('/getBanner','ApiController@getBanner');   //轮播图
    Route::get('/SystemConfig','ApiController@SystemConfig');  //启动页图片
    Route::post('/NewsList','ApiController@NewsList');  //新闻搜索
    Route::get('/categoryList','ApiController@CategoryList');   //分类
    Route::get('/LabelList','ApiController@LabelList');           //标签列表
    Route::get('/getUserCategory/{userId}','ApiController@getUserCategory');
    Route::post('/ReportReason','ApiController@AddReportReason');
    Route::get('/UserDetails/{userId}','ApiController@UserDetails');  //会员详情
    Route::get('/UserGrade/{userId}','ApiController@UserGrade');    //会员等级详情
    Route::get('/UserNewsList/{userId}','ApiController@UserNewsList');
    Route::post('/login','ApiController@login');  //登录
    Route::post('/UserEditPassword','ApiController@UserEditPassword');   //修改密码
    Route::post('/Register','ApiController@Register');   //会员注册
    Route::post('/Certification','ApiController@Certification');  //会员实名认证
    Route::get('/News/{category_id}/{userId}','ApiController@News');  //新闻列表
    Route::post('/AddNews','ApiController@AddNews');   //用户添加新闻
    Route::get('/MakePdf','MakePdfController@MakePdf');   //PDF
    Route::get('/SendOut/{phone}','MobileCodeController@SendOut');  //短信验证
    Route::post('/score','ApiController@score'); //新闻打分
    Route::post('/NewsCollection','ApiController@NewsCollection');  //新闻收藏
    Route::post('/EditInformation','ApiController@UserEditInformation');  //会员修改个人信息
    Route::get('/details/{UserId}/{NewsId}','ApiController@NewsDetails');  //新闻详情
    Route::get('/UserReadList/{userId}','ApiController@UserReadList');   //会员阅读列表
    Route::post('/ResetPassword','ApiController@ResetPassword');  //会员重置密码
    Route::get('/UserKeepList/{userId}','ApiController@UserKeepList');   //会员收藏新闻列表
    Route::get('/UserKeepCategory/{userId}','ApiController@UserKeepCategoryList');  //会员收藏分类列表
    Route::post('/EditUserCategory','ApiController@EditUserCategory');   //用户编辑收藏分类
    Route::get('/UserSingIn/{userId}','ApiController@UserSingIn');  //会员签到
    Route::get('/VerificationCode/{code}','ApiController@VerificationCode');   //会员验证邀请码
    Route::get('/MyKeep/{UserId}','ApiController@MyKeep');       //我的收录列表
    Route::get('/PolicyLabelList','ApiController@PolicyLabelList');   //政策标签列表
    Route::get('/PolicyCategoryList','ApiController@PolicyCategoryList');   //政策新闻列表
    Route::get('/Sort/{type}','ApiController@Sort');   //排序
    Route::get('/ReportList','ApiController@ReportList');  //举报原因列表
    Route::get('/AboutUs','ApiController@AboutUs');   //关于我们
    Route::get('/VersionInformation','ApiController@VersionInformation');   //版本信息
    Route::post('/Proposal','ApiController@Proposal');  //建议反馈
    Route::get('/ExpertAnalysis/{newsId}','ApiController@ExpertAnalysis');  //专家解读
    Route::get('/UserCount/{newsId}','ApiController@UserCount');  //阅读、录入、收藏统计
    Route::get('/UserMessage/{newsId}','ApiController@UserMessage');   //消息


});
//图片上传路由
Route::group(['namespace'=>'Uploads','prefix'=>'v1/news'],function (){
    Route::post('/upload','UploadsController@upload');
});