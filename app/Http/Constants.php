<?php

namespace App\Http;

class Constants
{
    public const APP_SUCCESS = 1;
    public const APP_ERROR_PARAMS = 2;
    public const APP_ERROR_TIMEOUT = 3;
    public const APP_ERROR_SIGN = 4;
    public const APP_ERROR_SEND_MOBILE_MSG = 5;
    public const APP_ERROR_CAPTCHA = 6;
    public const APP_ERROR_MOBILE_NOT_EXIST = 7;
    public const APP_FAILED = 8;
    public const APP_CONFIG_ERROR = 9;
    public const APP_INVITE_CODE_NOT_EXIST = 10;
    public const APP_ERROR_MOBILE_EXIST = 11;
    public const APP_ERROR_USER_DISABLED = 12;
    public const APP_MOBILE_ERROR = 13;
    public const APP_ERROR_LOGIN_FAILED = 14;
    public const APP_USER_NOT_EXIST = 15;
    public const APP_CATEGORY_NOT_EXIST = 16;
    public const APP_NEWS_NOT_EXIST = 17;
    public const APP_NEWS_HAS_POINT = 18;
    public const APP_ERROR_HAS_SIGN = 19;

    public const APP_AUTHENTICATE_SUCCESS_MSG = '认证成功';

    public static $errMsg = [
        self::APP_SUCCESS => '操作成功',
        self::APP_ERROR_PARAMS => '参数错误',
        self::APP_ERROR_TIMEOUT => '请求已过期',
        self::APP_ERROR_SIGN => '签名错误',
        self::APP_ERROR_SEND_MOBILE_MSG => '短信发送失败',
        self::APP_ERROR_CAPTCHA => '验证码错误或已失效',
        self::APP_ERROR_MOBILE_NOT_EXIST => '手机号不存在',
        self::APP_FAILED => '操作失败',
        self::APP_CONFIG_ERROR => '配置项错误',
        self::APP_INVITE_CODE_NOT_EXIST => '邀请码不存在',
        self::APP_ERROR_MOBILE_EXIST => '手机号已存在',
        self::APP_ERROR_USER_DISABLED => '用户禁止登录',
        self::APP_MOBILE_ERROR => '手机号格式错误',
        self::APP_ERROR_LOGIN_FAILED => '手机号或密码错误',
        self::APP_USER_NOT_EXIST => '用户不存在',
        self::APP_CATEGORY_NOT_EXIST => '分类不存在',
        self::APP_NEWS_NOT_EXIST => '新闻不存在',
        self::APP_NEWS_HAS_POINT => '您已经给该新闻打过分了',
        self::APP_ERROR_HAS_SIGN => '您今天已经签到'
    ];
}