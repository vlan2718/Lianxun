<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>仪表盘</title>
    <link href="{{asset('admin/css/init.css?v=1')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/main.css?v=524')}}" rel="stylesheet" type="text/css">
</head>

<script>

</script>

<body>
	<div id="topline">
		<div id="adminTitle">信息管理 > 标签编辑</div>
		<div id="rightFun"><a href="newsadmin.html">返回列表</a></div>
	</div>

	<div id="adminbody">
	  <form name="form1" method="post" action="">
	    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
          <tr>
            <td width="16%" align="right" bgcolor="#f0f0f0">标签名称</td>
            <td width="63%" bgcolor="#f0f0f0"><a href="#">
              <input type="text" name="textfield">
            </a></td>
            <td width="31%" bgcolor="#f0f0f0">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">标签解释</td>
            <td><textarea name="textarea" style="width:100%; height:100px"></textarea></td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">相关标签</td>
            <td><p>
              <input type="checkbox" name="checkbox" value="checkbox">
              标签
                <input type="checkbox" name="checkbox2" value="checkbox">
标签
<input type="checkbox" name="checkbox3" value="checkbox">
标签
<input type="checkbox" name="checkbox4" value="checkbox">
标签
<input type="checkbox" name="checkbox5" value="checkbox">
标签
<input type="checkbox" name="checkbox6" value="checkbox">
标签
<input type="checkbox" name="checkbox7" value="checkbox">
标签
<input type="checkbox" name="checkbox8" value="checkbox">
标签
<input type="checkbox" name="checkbox9" value="checkbox">
标签</p>
            <p>
              <input type="checkbox" name="checkbox10" value="checkbox">
标签
<input type="checkbox" name="checkbox11" value="checkbox">
标签
<input type="checkbox" name="checkbox12" value="checkbox">
标签
<input type="checkbox" name="checkbox13" value="checkbox">
标签
<input type="checkbox" name="checkbox14" value="checkbox">
标签
<input type="checkbox" name="checkbox15" value="checkbox">
标签
<input type="checkbox" name="checkbox16" value="checkbox">
标签
<input type="checkbox" name="checkbox17" value="checkbox">
标签
<input type="checkbox" name="checkbox18" value="checkbox">
标签</p>
            <p>
              <input type="checkbox" name="checkbox19" value="checkbox">
标签
<input type="checkbox" name="checkbox20" value="checkbox">
标签
<input type="checkbox" name="checkbox21" value="checkbox">
标签
<input type="checkbox" name="checkbox22" value="checkbox">
标签
<input type="checkbox" name="checkbox23" value="checkbox">
标签
<input type="checkbox" name="checkbox24" value="checkbox">
标签
<input type="checkbox" name="checkbox25" value="checkbox">
标签</p></td>
            <td align="center" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><input type="submit" name="Submit" value="提交保存" class="button" style="width:100px; height:35px; line-height:35px; font-size:14px;"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
	</div>
</body>
</html>
