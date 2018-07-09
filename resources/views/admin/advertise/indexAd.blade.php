<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页仪表盘</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="topline">
		<div id="adminTitle">广告管理 > 首屏广告管理</div>
	</div>

	<div id="adminbody">

		<div style="float:left; width:900px; height:300px; padding:20px;">
		<div>
			<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
	<tr class="tableHeader">
	  <td align="center">ID</td>
	  <td align="center">广告名称</td>
	  <td align="center">发布时段</td>
	  <td align="center">排序</td>
	  <td align="center">链接</td>
	  <td align="center">状态</td>
	  <td align="center">修改</td>
	  <td align="center">删除</td>
	</tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
      <td align="center">奔驰试驾</td>
      <td align="center">2018/4/6至2018/4/18</td>
      <td align="center">拉下</td>
      <td align="center">链接</td>
      <td align="center">已发布</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td align="center">长江证券</td>
      <td align="center">2018/4/6至2018/4/18</td>
      <td align="center">拉上　拉下 </td>
      <td align="center">链接</td>
      <td align="center">已发布</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td align="center">平安保险</td>
      <td align="center">2018/4/6至2018/4/18</td>
      <td align="center">拉上</td>
      <td align="center">链接</td>
      <td align="center">已发布</td>
      <td align="center">修改</td>
      <td align="center">删除</td>
    </tr>
  </table>
</form>
</div>
<div style="margin:auto;margin-top:20px;">
<form name="form2" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
    <tr>
      <td align="right">广告名称</td>
      <td><input type="text" name="textfield"></td>
      <td align="right">发布时段</td>
      <td><input name="textfield2" type="text" size="15"></td>
      <td align="right">至</td>
      <td><input name="textfield3" type="text" size="15"></td>
      <td align="right">播放时长</td>
      <td><input name="textfield6" type="text" value="6" size="3">
        秒</td>
    </tr>
    <tr>
      <td align="right">上传图片</td>
      <td><input type="file" name="textfield4" style="width:150px;"></td>
      <td align="right">链接地址</td>
      <td colspan="3"><input name="textfield5" type="text" size="45"></td>
      <td colspan="2" align="center"><input type="submit" name="Submit" value="保存"></td>
      </tr>
  </table>
</form>
</div>

		</div>


		<div style="float:left; width:400px; padding:20px">
			<div style="width:360px; height:620px; background:#CCC; position:relative; border:1px solid #CCC">
				<div style="padding:20px; height:490px;position:relative">
				<div style="border:1px solid #999; border-radius:15px; width:40px; height:15px; padding:3px; text-align:center; line-height:15px;margin:0px; float:right">广告</div>
				<div style="position:absolute;bottom:0px; width:70px; left:50%; margin-left:-35px;">
					<ul>
						<li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
						<li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
						<li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
					</ul>
				</div>
				</div>
				<div style="clear:both; width:100%; height:80px; background:#FFF; position:absolute; bottom:0px;"></div>
			</div>
		</div>

	</div>
</body>
</html>
