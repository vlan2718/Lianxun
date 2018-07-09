<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>电报系统后台管理登录</title>
    <link href="css/init.css?v=242" rel="stylesheet" type="text/css">
    <link href="css/login.css?v=35" rel="stylesheet" type="text/css">
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/base.js"></script>
    <link href="/js/zuoyou/zuoyou.css?v=53245" type="text/css" rel="stylesheet" />
    <script src="/js/zuoyou/zuoyou.js"></script>
    <script src="/unebiz/js/MemberRegLogin.js?V=3242"></script>
    <script src="/js/getsmscode.js"></script>
    <script>
        $(function(){

            $("#FormLabel_reg").click(function(){
                $("#FormLabel_reg").css("background","#FFF");
                $("#FormLabel_login").css("background","#FFCC00");
                $("#MemberLoginForm").hide();
                $("#MemberRegForm").show();
            });

            $("#FormLabel_login").click(function(){
                $("#FormLabel_reg").css("background","#FFCC00");
                $("#FormLabel_login").css("background","#FFF");
                $("#MemberRegForm").hide();
                $("#MemberLoginForm").show();
            });

            $("#ForgetBtn").click(function(){
                var loginType=$("#loginType").val();
                if(loginType==0){
                    $("#LoginPwdBox").hide();
                    $("#LoginMobCodeBox").show();
                    $("#loginType").val(1);
                    $("#ForgetBtn").text("知道密码，切换为使用密码登录");
                }else{
                    $("#LoginMobCodeBox").hide();
                    $("#LoginPwdBox").show();
                    $("#loginType").val(0);
                    $("#ForgetBtn").text("忘记密码，使用短信验证的方式登录");
                }
            });

        });
    </script>
</head>

<body>
<div id="indexLogin">
    <div class="mainbody" style="padding-top:150px;">
        <form method="POST" action="{{ route('login') }}">
            {{csrf_field()}}
            <div style="width:330px;height:300px;margin:auto;">
                <div style="width:320px; margin:auto; background:url({{asset('admin/images/LOGO.jpg')}});height:50px; background-position:center; background-repeat:no-repeat; font-size:20px; text-align:center"></div>
                <div style="margin-top:20px;"><input type="text" name="username" class="loginPut" value="请输入管理员账号" onFocus="if(value==defaultValue){value='';this.style.color='#000'};" onBlur="if(!value){value=defaultValue;this.style.color='#CCC'};"></div>
                <div style="margin-top:20px;"><input type="text" name="password" class="loginPut" value="请输入密码" onFocus="if(value==defaultValue){value='';this.type='password';this.style.color='#000'};" onBlur="if(!value){value=defaultValue;this.type='text';this.style.color='#CCC'};"></div>
                <div style="margin-top:20px;">
                    <input type="submit"  value="登　　录" class="loginBtn">
                </div>
                <div style="margin-top:100px;text-align:center">&copy;Union E-Business 2018-2020.</div>
            </div>
        </form>
    </div>


</div>
</body>
</html>
