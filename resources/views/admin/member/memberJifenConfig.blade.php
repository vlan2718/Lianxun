<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>仪表盘</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="topline">
		<div id="adminTitle">会员管理 > 会员积分规则</div>
	</div>

	<div id="adminbody">
	  <form name="form1" method="post" action="">
	    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
          <tr class="tableHeader">
            <td width="11%" align="right" bgcolor="#f0f0f0">积分项目</td>
            <td width="68%" bgcolor="#f0f0f0">积分设置</td>
            <td width="21%" bgcolor="#f0f0f0">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">会员注册</td>
            <td><input name="textfield" type="text" value="0" size="10">
            分</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">会员登录</td>
            <td><input type="text" name="textfield2" value="0" size="10">
分</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">完善信息</td>
            <td><input type="text" name="textfield10" value="0" size="10">
分</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">每日签到</td>
            <td><input type="text" name="textfield3" value="0" size="10">
分/次</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">阅读资讯</td>
            <td><input type="text" name="textfield4" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">收藏资讯</td>
            <td><input type="text" name="textfield5" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">点赞评分</td>
            <td><input type="text" name="textfield6" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">分享</td>
            <td><input type="text" name="textfield8" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">录入</td>
            <td><input type="text" name="textfield9" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">审核通过</td>
            <td><input type="text" name="textfield92" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">被收录</td>
            <td><input type="text" name="textfield922" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">被发布</td>
            <td><input type="text" name="textfield923" value="0" size="10">
分/条</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">意见反馈</td>
            <td><input type="text" name="textfield7" value="0" size="10">
分/次</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><input type="submit" name="Submit" value="保存设置"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
	</div>
</body>
</html>
