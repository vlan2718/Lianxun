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
<div id="adminTitle">信息管理 > 信息发布管理</div>
<div style=" float:left;padding-top:10px;">
		<form name="form3" method="post" action="">
			<select name="select11">
			  <option>按条件搜索</option>
			  <option>约定按什么条件</option>
		        </select>
			<input type="text" name="textfield2">
			<input type="submit" name="Submit2" value="查询">
	  </form>
    </div>
	<div id="rightFun">
		<div class="rightFunBtn"><a href="{{url('admin/message/newsEdit')}}">录入新信息</a></div>
		<div class="rightFunBtn"><a href="{{url('admin/message/batchImport')}}">批量导入信息</a></div>
	</div>
</div>
<div id="adminbody">
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
	<tr class="tableHeader">
	  <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
	  <td width="2%" align="center">ID</td>
	  <td width="6%" align="center">主类</td>
	  <td width="5%" align="center">子类</td>
	  <td width="19%">信息标题</td>
	  <td width="8%" align="center">信息解读</td>
	  <td width="7%" align="center">发布时间</td>
	  <td width="4%" align="center">状态</td>
	  <td width="3%" align="center">阅读</td>
	  <td width="3%" align="center">收藏</td>
	  <td width="2%" align="center">赞/评分</td>
	  <td width="2%" align="center">下载量</td>
	  <td colspan="2" align="center">信息来源</td>
	  <td width="7%" align="center">审核</td>
	  <td width="7%" align="center">编辑</td>
	  <td width="7%" align="center">删除</td>
	  <td width="9%" align="center">操作日志</td>
	</tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td align="center">10</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="#" onClick="alert('本文正在被其它管理员修订中，暂不可编辑！');return false();">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">共0条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><a href="#">未发布</a></td>
      <td align="center"><a href="#">2652</a></td>
      <td align="center"><a href="#">654</a></td>
      <td align="center"><a href="#">54</a></td>
      <td align="center"><a href="#">14</a></td>
      <td width="2%" align="center">转载</td>
      <td width="5%" align="center"><a href="http://www.qq.com" target="_blank">腾讯新闻</a></td>
      <td align="center"><a href="#">
        <select name="select2">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="#" onClick="alert('本文正在被其它管理员修订中，暂不可编辑！');return false();">修订中</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td align="center">9</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="newsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center"><a href="newJiedu.html">共10条</a></td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><a href="#">已发布</a></td>
      <td align="center"><a href="#">7457</a></td>
      <td align="center"><a href="#">342</a></td>
      <td align="center"><a href="#">75</a></td>
      <td align="center"><a href="#">23</a></td>
      <td align="center">录入</td>
      <td align="center">Admin</td>
      <td align="center"><a href="#">
        <select name="select">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td align="center">8</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="newsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">共120条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center"><a href="#">已发布</a></td>
      <td align="center"><a href="#">4123</a></td>
      <td align="center"><a href="#">662</a></td>
      <td align="center"><a href="#">47</a></td>
      <td align="center"><a href="#">3</a></td>
      <td align="center">转载</td>
      <td align="center"><a href="http://www.163.com" target="_blank">网易新闻</a></td>
      <td align="center"><a href="#">
        <select name="select3">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox5" value="checkbox"></td>
      <td align="center">7</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="newsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">345</td>
      <td align="center">745</td>
      <td align="center">78</td>
      <td align="center">5</td>
      <td align="center">用户</td>
      <td align="center">Yangfan</td>
      <td align="center"><a href="#">
        <select name="select4">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox6" value="checkbox"></td>
      <td align="center">6</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="newsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">5474</td>
      <td align="center">432</td>
      <td align="center">77</td>
      <td align="center">7</td>
      <td align="center">转载</td>
      <td align="center">今日头条</td>
      <td align="center"><a href="#">
        <select name="select5">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox7" value="checkbox"></td>
      <td align="center">5</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="newsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">5312</td>
      <td align="center">475</td>
      <td align="center">42</td>
      <td align="center">3</td>
      <td align="center">用户</td>
      <td align="center">Yangfan</td>
      <td align="center"><a href="#">
        <select name="select6">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox8" value="checkbox"></td>
      <td align="center">4</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="newsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">235</td>
      <td align="center">523</td>
      <td align="center">46</td>
      <td align="center">1</td>
      <td align="center"><span style="color:#FF0000">导入</span></td>
      <td align="center">Admin</td>
      <td align="center"><a href="#">
        <select name="select7">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox9" value="checkbox"></td>
      <td align="center">3</td>
      <td align="center">政治资讯</td>
      <td align="center">两会</td>
      <td><a href="newsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">5234</td>
      <td align="center">54</td>
      <td align="center">86</td>
      <td align="center">7</td>
      <td align="center"><span style="color:#FF0000">导入</span></td>
      <td align="center">Admin</td>
      <td align="center"><a href="#">
        <select name="select8">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox10" value="checkbox"></td>
      <td align="center">2</td>
      <td align="center">企业资讯</td>
      <td align="center">集团</td>
      <td><a href="newsEdit.html">美英法打击叙利亚之后 石油价格会疯涨吗？</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">6457</td>
      <td align="center">543</td>
      <td align="center">32</td>
      <td align="center">8</td>
      <td align="center">用户</td>
      <td align="center">Yangfan</td>
      <td align="center"><a href="#">
        <select name="select9">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
    <tr>
      <td align="center"><input type="checkbox" name="checkbox102" value="checkbox"></td>
      <td align="center">1</td>
      <td align="center">经济资讯</td>
      <td align="center">国际</td>
      <td><a href="newsEdit.html">11家境外机构备案 铁矿石期货国际化5月4日起飞</a></td>
      <td align="center">共10条</td>
      <td align="center">2018-4-6 13:30:23</td>
      <td align="center">已发布</td>
      <td align="center">2436</td>
      <td align="center">545</td>
      <td align="center">65</td>
      <td align="center">2</td>
      <td align="center"><span style="color:#FF0000">导入</span></td>
      <td align="center">Admin</td>
      <td align="center"><a href="#">
        <select name="select10">
          <option>新录未审</option>
          <option>已审通过</option>
          <option>退回修改</option>
          <option>违规撤销</option>
        </select>
      </a></td>
      <td align="center"><a href="newsEdit.html">编辑</a></td>
      <td align="center"><a href="#">删除</a></td>
      <td align="center"><a href="#">操作日志</a></td>
    </tr>
  </table>
</form>
</div>

<div id="pages">
	<div class="allFun">
		<form name="form2" method="post" action="">
			<input type="checkbox" name="checkbox11" value="checkbox">全选　
			<input name="Submit" type="button" value="删除">
			　　
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
