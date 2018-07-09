<?php

namespace App\Http;

class LogActionConst
{
    public const ACTION_ADMIN_LOGIN = '登录系统';

    public const GET_LEVEL_LIST = '查看积分等级设置';
    public const CREATE_LEVEL = '创建积分等级设置';
    public const UPDATE_LEVEL = '修改积分等级设置';
    public const DELETE_LEVEL = '删除积分等级设置';

    public const GET_JI_FEN_CONFIG = '查看积分规则';
    public const SAVE_MEMBER_JI_FEN_CONFIG = '修改积分规则';
    public const GETMEMBERSADMIN='会员管理-查看';
    public const UPDATEUSERPASSWORD='会员管理-重置密码';
    public const GETUSERBYID='会员管理-修改资料';

    public const NEWSCLASSLIST='信息分类配置-查看';
    public const DELETENEWSCLASS='信息分类配置-删除';
    public const CREATENEWSCLASS='信息分类配置-添加';


    public const GETNEWADMINLIST='信息发布管理-查看';
    public const UPDATENEWSCLASS='信息分类配置-修改';
    public const DELETENEWADMINLIST='信息发布管理-删除';
    public const GETNEWSEDIT='信息发布管理-编辑';


    public const MEMBERNEWSADMINLIST='会员发布的信息-查看';
    public const DELETEMEMBERNEWSADMINLIST='会员发布的信息-删除';
    public const SHOULU='会员发布信息-收录';
    public const GETNEWSEDITMEMBER='会员发布的信息-编辑';




    public const GETADVERTISINGBY='广告管理-查看';
    public const DELETEADVERTISING='广告管理-删除';
    public const CREATEADVERTISING='广告管理-添加';
    public const UPDATEADVERTISING='广告管理-修改';


    public const GETMANAGEFUNSETLIST='权限--查看';
    public const UPDATEMANAGEFUNSETLISTID='权限--修改';
    public const CREATEMANAGEFUNSETLISTID='权限--添加';
    public const DELETEMANAGEFUNSETLISTID='权限--删除';
    public const GETROLESTRUE='权限--设置';


    public const GETSYSTEMSETUPLIST='系统设置--查看';
    public const UPDATESYSTEMSETUPLIST='系统设置--修改';




}