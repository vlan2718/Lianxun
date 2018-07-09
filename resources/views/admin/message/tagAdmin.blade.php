<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>信息管理</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
<div id="topline">
<div id="adminTitle">信息管理 > 通用标签维护管理</div>

<!--  <div id="rightFun">
  <select name="select">
    <option>全部标签</option>
    <option>系统标签</option>
    <option>用户标签</option>
  </select>
  </div>-->

</div>
<div id="adminbody">
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
	<tr class="tableHeader">
	  <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
	  <td align="center">ID</td>
	  <td align="center">标签</td>
	  <td align="center">名下系统发布</td>
	  <td align="center">名下用户录入</td>
	  <td align="center">修改</td>
	  <td align="center">删除</td>
	</tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td align="center">1</td>
      <td align="center">十九大</td>
      <td align="center"><a href="{{url('admin/message/newsadmin')}}">名下此标签文章(10)</a></td>
      <td align="center"><a href="{{url('admin/message/MemberNewsAdmin')}}">名下用户录入</a></td>
      <td align="center"><a href="{{url('admin/message/tagEdit')}}">修改</a></td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td align="center">2</td>
      <td align="center">美联储</td>
      <td align="center"><a href="newsAdmin.html">名下此标签文章(10)</a></td>
      <td align="center"><a href="MemberNewsAdmin.html">名下用户录入</a></td>
      <td align="center"><a href="tagEdit.html">修改</a></td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td align="center">3</td>
      <td align="center">地震</td>
      <td align="center"><a href="newsAdmin.html">名下此标签文章(10)</a></td>
      <td align="center"><a href="MemberNewsAdmin.html">名下用户录入</a></td>
      <td align="center"><a href="tagEdit.html">修改</a></td>
      <td align="center">删除</td>
    </tr>
  </table>
</form>
</div>

<div style="width:40%;margin:auto;margin-top:20px;">
<form name="form2" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
    <tr>
      <td width="24%" align="right">标签名称</td>
      <td width="25%"><input type="text" name="textfield"></td>
      <td width="45%"><input type="submit" name="Submit" value="添加"></td>
      <td width="6%">&nbsp;</td>
    </tr>
  </table>
</form>
</div>

</body>
</html>
