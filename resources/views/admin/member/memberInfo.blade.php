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
		<div id="adminTitle">会员管理 > 会员信息</div>
	</div>

	<div id="adminbody">
	  <form name="form1" method="post" action="">
	    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
          <tr>
            <td width="21%" align="center" bgcolor="#f0f0f0">&nbsp;</td>
            <td width="9%" align="right" bgcolor="#f0f0f0">&nbsp;</td>
            <td colspan="3" bgcolor="#f0f0f0">&nbsp;</td>
            <td width="22%" bgcolor="#f0f0f0">&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="5" align="center"><div style="width:140px;height:140px; border-radius:100px; background:#CCC;"></div></td>
            <td align="right">会员状态</td>
            <td><select name="select">
              <option>未激活</option>
              <option>已激活</option>
              <option>暂停中</option>
              <option>已停用</option>
                        </select></td>
            <td align="right">会员等 级 </td>
            <td><select name="select2">
              <option>士兵</option>
                                    </select></td>
            <td rowspan="5" align="center"><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td align="right">手机账号</td>
            <td><input name="textfield" type="text"></td>
            <td align="right">密码</td>
            <td><input name="textfield4" type="text"></td>
          </tr>
          <tr>
            <td align="right">会员姓名</td>
            <td width="15%"><input type="text" name="textfield2"></td>
            <td width="10%" align="right">昵称</td>
            <td width="23%"><input type="text" name="textfield23"></td>
          </tr>
          <tr>
            <td align="right">性别</td>
            <td><input type="radio" name="radiobutton" value="radiobutton">
              男
              <input type="radio" name="radiobutton" value="radiobutton">
              女</td>
            <td align="right">注册时间</td>
            <td><input type="text" name="textfield232"></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td align="center">上传头像：
            <input type="file" name="textfield3" style="width:120px;"></td>
            <td align="right">用户描述</td>
            <td colspan="3"><textarea name="textarea" style="width:100%; height:100px"></textarea></td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>

          <tr>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td colspan="3"><input type="submit" name="Submit" value="保存用户信息"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
	  </form>
	</div>
</body>
</html>
