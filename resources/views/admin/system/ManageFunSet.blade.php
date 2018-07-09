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
          <td align="center">管理员角色</td>
          <td align="center">成员</td>
          <td align="center">角色默认权限设置</td>
          <td align="center">修改</td>
          <td align="center">删除</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
          <td align="center">1</td>
          <td align="center">系统超管</td>
          <td align="center"><a href="{{url('admin/system/ManageFunSets')}}">1个</a></td>
          <td align="center"><a href="{{url('admin/system/ManageFunSetOk')}}">默认权限</a></td>
          <td align="center"><a href="#">修改</a></td>
          <td align="center">----</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
          <td align="center">2</td>
          <td align="center">管理员</td>
          <td align="center"><a href="{{url('admin/system/ManageFunSets')}}">2个</a></td>
            <td align="center"><a href="{{url('admin/system/ManageFunSetOk')}}">默认权限</a></td>
          <td align="center"><a href="#">修改</a></td>
          <td align="center">删除</td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
          <td align="center">3</td>
          <td align="center">普通管理员</td>
          <td align="center"><a href="{{url('admin/system/ManageFunSets')}}">5个</a></td>
            <td align="center"><a href="{{url('admin/system/ManageFunSetOk')}}">默认权限</a></td>
          <td align="center"><a href="#">修改</a></td>
          <td align="center">删除</td>
        </tr>
      </table>
	</form>
</div>
	<div style="width:45%;margin:auto;margin-top:20px;">
<form name="form2" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
    <tr>
      <td width="17%" align="right">角色名称</td>
      <td width="32%"><input type="text" name="textfield32"></td>
      <td width="10%"><input type="submit" name="Submit" value="保存"></td>
      <td width="41%">点击需要修改的角色，此处可置为修改</td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
