<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改管理密码</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
<div id="topline">
	<div id="adminTitle">修改管理密码</div>
</div>

<div id="adminbody">
  <form name="form1" method="post" action="">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableLists">
      <tr>
        <td align="right">原密码：</td>
        <td><input type="text" name="textfield"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">新密码：</td>
        <td><input type="text" name="textfield2"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">确认密码：</td>
        <td><input type="text" name="textfield22"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td><input type="submit" name="Submit" value="确定修改"></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </form>
</div>

</body>
</html>
