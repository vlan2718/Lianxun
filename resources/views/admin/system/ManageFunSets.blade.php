<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理权限设置</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
<div id="topline">
<div id="adminTitle">管理权限设置</div>
</div>
<div id="adminbody">
	<form name="form1" method="post" action="">
	  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
        <tr class="tableHeader">
          <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
          <td align="center">ID</td>
          <td align="center">角色</td>
          <td align="center">成员</td>
          <td align="center">账户名</td>
          <td align="center">密码</td>
          <td align="center">权限设置</td>
          <td align="center">修改</td>
          <td align="center">删除</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
          <td align="center">1</td>
          <td align="center">管理员</td>
          <td align="center">杨帆</td>
          <td align="center">yangfan</td>
          <td align="center">123456</td>
          <td align="center"><a href="ManageFunSetOk.html">权限设置</a></td>
          <td align="center">修改</td>
          <td align="center">----</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
          <td align="center">2</td>
          <td align="center">管理员</td>
          <td align="center">刘河</td>
          <td align="center">liuhe</td>
          <td align="center">654321</td>
          <td align="center"><a href="ManageFunSetOk.html">权限设置</a></td>
          <td align="center">修改</td>
          <td align="center">删除</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
          <td align="center">3</td>
          <td align="center">管理员</td>
          <td align="center">张三</td>
          <td align="center">zhangsan</td>
          <td align="center">888888</td>
          <td align="center"><a href="ManageFunSetOk.html">权限设置</a></td>
          <td align="center">修改</td>
          <td align="center">删除</td>
        </tr>
      </table>
	</form>
</div>
	<div style="width:60%;margin:auto;margin-top:20px;">
<form name="form2" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
    <tr>
      <td align="right">角色</td>
      <td><select name="select">
        <option>系统超管</option>
        <option>管理员</option>
        <option>普通管理员</option>
      </select>
      </td>
      <td align="right">成员</td>
      <td><input name="textfield2" type="text" size="10"></td>
      <td align="right">登录账户</td>
      <td><input type="text" name="textfield3"></td>
      <td>密码</td>
      <td><input type="text" name="textfield32"></td>
      <td><input type="submit" name="Submit" value="添加"></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
