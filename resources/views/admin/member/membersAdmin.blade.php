<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员管理</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
<div id="topline">
    <div id="adminTitle">会员管理 > 会员管理</div>
    <div style=" float:left;padding-top:5px;">
        <form name="form3" method="post" action="">
            <select name="select11">
                <option>按条件搜索</option>
                <option>约定按什么条件</option>
            </select>
            <input type="text" name="textfield2">
            <input type="submit" name="Submit2" value="查询">
        </form>
    </div>
    <div id="rightFun">

    </div>
</div>
<div id="adminbody">
    <form name="form1" method="post" action="">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
            <tr class="tableHeader">
                <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                <td align="center">ID</td>
                <td align="center">受邀</td>
                <td align="center">手机账号</td>
                <td align="center">邀请码</td>
                <td align="center">状态</td>
                <td align="center">一对一消息</td>
                <td align="center">会员昵称</td>
                <td align="center">等级</td>
                <td align="center">签到</td>
                <td align="center">积分</td>
                <td align="center">重置密码</td>
                <td align="center">阅读</td>
                <td align="center">收藏</td>
                <td align="center">录入</td>
                <td align="center">收录</td>
                <td align="center">发布</td>
                <td align="center">修改资料</td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                <td align="center">10</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">13703280131</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select>      </td>
                <td align="center"><input type="button" name="Submit22" value="一对一消息"></td>
                <td align="center">杨帆</td>
                <td align="center">奖军</td>
                <td align="center">335天</td>
                <td align="center">3350</td>
                <td align="center"><a href="#">重置密码</a></td>
                <td align="center"><a href="#">3350</a></td>
                <td align="center"><a href="#">3350</a></td>
                <td align="center"><a href="#">3350</a></td>
                <td align="center"><a href="#">3350</a></td>
                <td align="center"><a href="#">3350</a></td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
                <td align="center">9</td>
                <td align="center">---</td>
                <td align="center"><a href="MemberInfo.html">18631280960</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select2">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit222" value="一对一消息"></td>
                <td align="center">刘河</td>
                <td align="center">司令</td>
                <td align="center">234天</td>
                <td align="center">2340</td>
                <td align="center"><a href="#">重置密码</a></td>
                <td align="center"><a href="#">2340</a></td>
                <td align="center"><a href="#">2340</a></td>
                <td align="center"><a href="#">2340</a></td>
                <td align="center"><a href="#">2340</a></td>
                <td align="center"><a href="#">2340</a></td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
                <td align="center">8</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">18931268127</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select3">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit223" value="一对一消息"></td>
                <td align="center">李军</td>
                <td align="center">军长</td>
                <td align="center">242天</td>
                <td align="center">2420</td>
                <td align="center"><a href="#">重置密码</a></td>
                <td align="center"><a href="#">2420</a></td>
                <td align="center"><a href="#">2420</a></td>
                <td align="center"><a href="#">2420</a></td>
                <td align="center"><a href="#">2420</a></td>
                <td align="center"><a href="#">2420</a></td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox5" value="checkbox"></td>
                <td align="center">7</td>
                <td align="center">受邀</td>
                <td align="center"><a href="MemberInfo.html">13703280131</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select4">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit224" value="一对一消息"></td>
                <td align="center">张三</td>
                <td align="center">师长</td>
                <td align="center">124天</td>
                <td align="center">1240</td>
                <td align="center">重置密码</td>
                <td align="center">1240</td>
                <td align="center">1240</td>
                <td align="center">1240</td>
                <td align="center">1240</td>
                <td align="center">1240</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox6" value="checkbox"></td>
                <td align="center">6</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">18631280960</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select5">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit225" value="一对一消息"></td>
                <td align="center">李四</td>
                <td align="center">旅长</td>
                <td align="center">153天</td>
                <td align="center">1530</td>
                <td align="center">重置密码</td>
                <td align="center">1530</td>
                <td align="center">1530</td>
                <td align="center">1530</td>
                <td align="center">1530</td>
                <td align="center">1530</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox7" value="checkbox"></td>
                <td align="center">5</td>
                <td align="center">---</td>
                <td align="center"><a href="MemberInfo.html">18931268127</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select6">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit226" value="一对一消息"></td>
                <td align="center">赵五</td>
                <td align="center">班 长 </td>
                <td align="center">43天</td>
                <td align="center">430</td>
                <td align="center">重置密码</td>
                <td align="center">430</td>
                <td align="center">430</td>
                <td align="center">430</td>
                <td align="center">430</td>
                <td align="center">430</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox8" value="checkbox"></td>
                <td align="center">4</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">13703280131</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select7">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit227" value="一对一消息"></td>
                <td align="center">马六</td>
                <td align="center">营长</td>
                <td align="center">65天</td>
                <td align="center">650</td>
                <td align="center">重置密码</td>
                <td align="center">650</td>
                <td align="center">650</td>
                <td align="center">650</td>
                <td align="center">650</td>
                <td align="center">650</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox9" value="checkbox"></td>
                <td align="center">3</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">18631280960</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select8">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit228" value="一对一消息"></td>
                <td align="center">刘丰</td>
                <td align="center">连长</td>
                <td align="center">98天</td>
                <td align="center">980</td>
                <td align="center">重置密码</td>
                <td align="center">980</td>
                <td align="center">980</td>
                <td align="center">980</td>
                <td align="center">980</td>
                <td align="center">980</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox10" value="checkbox"></td>
                <td align="center">2</td>
                <td align="center">---</td>
                <td align="center"><a href="MemberInfo.html">18931268127</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select9">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit229" value="一对一消息"></td>
                <td align="center">费翔</td>
                <td align="center">士兵</td>
                <td align="center">34天</td>
                <td align="center">340</td>
                <td align="center">重置密码</td>
                <td align="center">340</td>
                <td align="center">340</td>
                <td align="center">340</td>
                <td align="center">340</td>
                <td align="center">340</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
            <tr>
                <td align="center"><input type="checkbox" name="checkbox102" value="checkbox"></td>
                <td align="center">1</td>
                <td align="center"><a href="javascript:alert('点击弹出邀请人信息');void(0);">受邀</a></td>
                <td align="center"><a href="MemberInfo.html">13703280131</a></td>
                <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">Cr93aT</a></td>
                <td align="center"><select name="select10">
                        <option>未激活</option>
                        <option>已激活</option>
                        <option>暂停中</option>
                        <option>已停用</option>
                    </select></td>
                <td align="center"><input type="button" name="Submit2210" value="一对一消息"></td>
                <td align="center">郑琪</td>
                <td align="center">士兵</td>
                <td align="center">23天</td>
                <td align="center">230</td>
                <td align="center">重置密码</td>
                <td align="center">230</td>
                <td align="center">230</td>
                <td align="center">230</td>
                <td align="center">230</td>
                <td align="center">230</td>
                <td align="center"><a href="{{asset('admin/member/Info')}}">修改资料</a></td>
            </tr>
        </table>
    </form>
</div>

<div id="pages">
    <div class="allFun">
        <form name="form2" method="post" action="">
            <input type="checkbox" name="checkbox11" value="checkbox">全选　
            <input name="Submit" type="button" value="群发消息">
        </form>
    </div>
    <div class="pages">
        <div style="float:left">
            <ul>
                <li><<</li>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>>></li>
            </ul>
        </div>
        <div style="float:left;margin-left:20px;">
            共3页　每页 <input name="textfield" type="text" value="10" style="width:30px"> 条  共 30 条
        </div>
    </div>
</div>

</body>
</html>
