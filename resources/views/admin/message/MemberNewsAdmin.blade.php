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
<div id="adminTitle">信息管理 > 会员录入的信息管理</div>
<div style="float:left;padding-top:10px;">
		<form name="form3" method="post" action="">
			<select name="select11">
			  <option>按条件搜索</option>
			  <option>约定按什么条件</option>
		        </select>
			<input type="text" name="textfield2">
			<input type="submit" name="Submit2" value="查询">
	  </form>
    </div>
</div>
<div id="adminbody">
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
	<tr class="tableHeader">
	  <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
	  <td width="2%" align="center">ID</td>
	  <td width="3%" align="center">会员</td>
	  <td width="5%" align="center">主类</td>
	  <td width="3%" align="center">子类</td>
	  <td width="20%">信息标题</td>
	  <td width="4%" align="center">相似度</td>
	  <td width="7%" align="center">录入时间</td>
	  <td width="7%" align="center">审核</td>
	  <td width="6%" align="center">共享设置</td>
	  <td width="5%" align="center">收录</td>
	  <td width="5%" align="center">状态</td>
	  <td colspan="2" align="center">信息来源</td>
	  <td width="4%" align="center">编l辑</td>
	  <td width="4%" align="center">删除</td>
	  <td width="4%" align="center">操作日志</td>
	</tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td align="center">10</td>
      <td align="center">杨帆</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="MemberNewsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center"><a href="#">423</a></td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><a href="#">
        <select name="select2">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center">不同意共享</td>
      <td align="center">未收录</td>
      <td align="center">未发布</td>
      <td width="3%" align="center">转载</td>
      <td width="5%" align="center">腾讯新闻</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td align="center">9</td>
      <td align="center">刘河</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="MemberNewsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center"><a href="#">24</a></td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><a href="#">
        <select name="select3">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td align="center">8</td>
      <td align="center">张三</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="MemberNewsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center"><a href="#">254</a></td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
            </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">转载</td>
      <td align="center">网易新闻</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox5" value="checkbox"></td>
      <td align="center">7</td>
      <td align="center">李四</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="MemberNewsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">74</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select4">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox6" value="checkbox"></td>
      <td align="center">6</td>
      <td align="center">杨帆</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="MemberNewsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">12</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select5">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">转载</td>
      <td align="center">今日头条</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox7" value="checkbox"></td>
      <td align="center">5</td>
      <td align="center">刘丰</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="MemberNewsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">32</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select6">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox8" value="checkbox"></td>
      <td align="center">4</td>
      <td align="center">郑琪</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="MemberNewsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">1</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select7">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox9" value="checkbox"></td>
      <td align="center">3</td>
      <td align="center">赵六</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="MemberNewsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">3</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select8">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox10" value="checkbox"></td>
      <td align="center">2</td>
      <td align="center">康源</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="MemberNewsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">6</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select9">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox102" value="checkbox"></td>
      <td align="center">1</td>
      <td align="center">马云</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="MemberNewsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">63</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><select name="select10">
        <option>新录未审</option>
        <option>已审通过</option>
        <option>退回修改</option>
        <option>违规撤销</option>
      </select></td>
      <td align="center">同意共享</td>
      <td align="center">已收录</td>
      <td align="center">已发布</td>
      <td align="center">录入</td>
      <td align="center">---</td>
      <td align="center"><a href="MemberNewsEdit.html">编l辑</a></td>
      <td align="center">删除</td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
  </table>
</form>
</div>

<div id="pages">
	<div class="allFun">
		<form name="form2" method="post" action="">
			<input type="checkbox" name="checkbox11" value="checkbox">全选　
			<input name="Submit" type="button" value="删除" class="delBtn">
			　　
			<input type="button" name="Submit2" value="拖拽排序">
			<input type="button" name="Submit3" value="释放拖拽">
		</form>
	</div>
	<div class="pages">
		<div style="float:left">
			<ul>
				<li><<</li>
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>>></li>
			</ul>
		</div>
		<div style="float:left;margin-left:20px;">
    共3页　每页 <input name="textfield" type="text" value="10" style="width:30px"> 条  共 30 条
    </div>
    </div>
    </div>

    </body>
</html>
