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
		<div id="adminTitle">信息管理 > 信息编辑</div>
		<div id="rightFun"><a href="{{url('admin/message/newsadmin')}}">返回列表</a></div>
	</div>

	<div id="adminbody">
	  <form name="form1" method="post" action="">
	    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
          <tr>
            <td width="16%" align="right" bgcolor="#f0f0f0">审核状态</td>
            <td bgcolor="#f0f0f0"><a href="#">
              <select name="select3">
                <option>新录未审</option>
                <option>已审通过</option>
                <option>退回修改</option>
                <option>违规撤销</option>
              </select>
            </a></td>
            <td align="right" bgcolor="#f0f0f0">&nbsp;</td>
            <td bgcolor="#f0f0f0">&nbsp;</td>
            <td width="31%" bgcolor="#f0f0f0">&nbsp;</td>
          </tr>
          <tr>
            <td align="right">所属分类</td>
            <td><select name="select">
              <option>主分类</option>
            </select>
              <select name="select2">
                <option>子分类</option>
              </select>            </td>
            <td align="right">状态标签</td>
            <td><select name="select5">
              <option>无标签</option>
              <option>已辟谣</option>
              <option>进行中</option>
              <option>专家预测</option>
              <option>政策解读</option>
            </select>            </td>
            <td rowspan="5" align="center"><div style="width:200px; height:136px; background:#CCC;"></div></td>
          </tr>
          <tr>
            <td align="right">信息标题</td>
            <td colspan="3"><input name="textfield" type="text" size="60">
              <input type="checkbox" name="checkbox3" value="checkbox">
              专题
              <input type="checkbox" name="checkbox" value="checkbox">
            特供
            <input type="checkbox" name="checkbox2" value="checkbox">
            最新</td>
          </tr>
          <tr>
            <td align="right">信息来源</td>
            <td width="14%"><input type="text" name="textfield2"></td>
            <td width="9%" align="right">作者</td>
            <td width="40%"><input type="text" name="textfield23"></td>
          </tr>
          <tr>
            <td align="right">是否转载</td>
            <td><input type="radio" name="radiobutton" value="radiobutton">
              否
                <input type="radio" name="radiobutton" value="radiobutton">
                是</td>
            <td align="right">原文时间</td>
            <td><input type="text" name="textfield232"></td>
          </tr>
          <tr>
            <td align="right">原文地址</td>
            <td colspan="3"><input name="textfield22" type="text" size="60"></td>
          </tr>
          <tr>
            <td align="right">信息短述</td>
            <td colspan="3"><textarea name="textarea" style="width:100%; height:100px"></textarea></td>
            <td align="center" valign="top">上传代表图：
            <input type="file" name="textfield3" style="width:160px;"></td>
          </tr>
          <tr>
            <td align="right" valign="top">信息详情</td>
            <td colspan="3"><textarea name="textarea2"  style="width:100%; height:100px">这里是个编辑器</textarea></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">打标签</td>
            <td colspan="3"><div class="addTagList">
				<ul>
					<li>标签</li>
					<li>标签</li>
					<li>标签</li>
					<li onClick="alert('弹出通用标签列表以供选择，和自定义输入框')" style="cursor:pointer">+</li>
				</ul>
			</div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">上传附件</td>
            <td colspan="3"><input type="file" name="textfield4"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">浏览权限</td>
            <td colspan="3"><input type="radio" name="radiobutton" value="radiobutton">
            所有人            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td colspan="3"><input type="radio" name="radiobutton" value="radiobutton">
仅所有会员
  <select name="select4">
    <option selected>所有会员</option>
    <option>某等级以上</option>
    <option>某等级以上</option>
  </select>
  <input name="checkbox42" type="checkbox" value="checkbox" checked>
仅认证会员可浏览 （<a href="#">设置黑白名单</a>）</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td colspan="3"><input type="submit" name="Submit" value="提交保存" class="button" style="width:100px; height:35px; line-height:35px; font-size:14px;"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
	</div>
</body>
</html>
