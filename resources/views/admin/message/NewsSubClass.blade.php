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
<div id="adminTitle">信息管理 > 信息分类管理</div>
</div>
<div id="adminbody">
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
	<tr class="tableHeader">
	  <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
	  <td width="4%" align="center">ID</td>
	  <td width="10%" align="center">主分类</td>
	  <td width="14%" align="center">分类名称</td>
	  <td width="47%" align="center">默认推荐</td>
	  <td width="10%" align="center">修改</td>
	  <td width="13%" align="center">删除</td>
	</tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td align="center">1</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td align="center">2</td>
      <td align="center">经济资讯</td>
      <td align="center">财经</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td align="center">3</td>
      <td align="center">经济资讯</td>
      <td align="center">理财</td>
      <td align="center">不推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox5" value="checkbox"></td>
      <td align="center">4</td>
      <td align="center">经济资讯</td>
      <td align="center">保险</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox6" value="checkbox"></td>
      <td align="center">5</td>
      <td align="center">经济资讯</td>
      <td align="center">金融</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox7" value="checkbox"></td>
      <td align="center">6</td>
      <td align="center">经济资讯</td>
      <td align="center">投资</td>
      <td align="center">不推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox8" value="checkbox"></td>
      <td align="center">7</td>
      <td align="center">经济资讯</td>
      <td align="center">行情</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox9" value="checkbox"></td>
      <td align="center">8</td>
      <td align="center">经济资讯</td>
      <td align="center">美联储</td>
      <td align="center">推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox10" value="checkbox"></td>
      <td align="center">9</td>
      <td align="center">经济资讯</td>
      <td align="center">证券</td>
      <td align="center">不推荐</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
  </table>
</form>
</div>



<div style="width:35%;margin:auto;margin-top:20px;">
<form name="form2" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
    <tr>
      <td width="16%" align="right">所属主类</td>
      <td width="17%"><select name="select">
        <option>经济资讯</option>
        <option>政治资讯</option>
        <option>企业资讯</option>
      </select>
      </td>
      <td width="21%" align="right">子分类名称</td>
      <td width="30%"><input type="text" name="textfield"></td>
      <td width="12%"><input type="submit" name="Submit" value="添加"></td>
      <td width="4%">&nbsp;</td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
