<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>电报系统后台</title>
		<link href="css/init.css?v=<%=now()%>" rel="stylesheet" type="text/css">
		<link href="css/index.css?v=<%=now()%>" rel="stylesheet" type="text/css">
		<style>
			
			#sysMenus {float:left;padding:20px;width:auto;}
			#sysMenus li {float:left;width:90px;height:20px;margin:10px;background:#666;color:#CCC;border-radius:5px;padding:5px; text-align:center; cursor:pointer}
			#sysMenus li.sed { background:#FFE100;color:#383838}
			#sysMenus li.nosed { background:#666}
		</style>
		<script src="/js/jquery-1.8.2.min.js"></script>
		<script src="/js/base.js"></script>
		<script>
			$(function(){
				var leftLabel=0;
				var rightLabel=0;
				$("#bodytops").animate({"padding-left":'200px',"padding-right":'0px'});
				$("#bodyleft").animate({left:'0px'});
				$("#bodyright").animate({right:'-200px'});
				$("#mainbodys").animate({"padding-left":'200px'});
				$("#mainbodys").animate({"padding-right":'0px'});
				
				$("#leftLabel").click(function(){
					if(leftLabel==0){
						$("#bodyleft").animate({left:'-200px'},"fast");
						$("#bodytops").animate({"padding-left":'0px'},"fast");
						$("#mainbodys").animate({"padding-left":'0px'},"fast");
						$("#leftLabel").text(">");
						leftLabel++;
					}else{
						$("#bodyleft").animate({left:'0px'},"fast");
						$("#bodytops").animate({"padding-left":'200px'},"fast");
						$("#mainbodys").animate({"padding-left":'200px'},"fast");
						$("#leftLabel").text("<");
						leftLabel--;
					}
				});
				$("#rightLabel").click(function(){
					if(rightLabel==0){
						$("#bodyright").animate({right:'0px'},"fast");
						$("#bodytops").animate({"padding-right":'200px'},"fast");
						$("#mainbodys").animate({"padding-right":'200px'},"fast");
						$("#rightLabel").text(">");
						rightLabel++;
					}else{
						$("#bodyright").animate({right:'-200px'},"fast");
						$("#bodytops").animate({"padding-right":'0px'},"fast");
						$("#mainbodys").animate({"padding-right":'0px'},"fast");
						$("#rightLabel").text("<");
						rightLabel--;
					}
				});
			});
			
			function showdiv(divnum,divbefor,id,c1,c2){
				for(i=1;i<=divnum;i++){
					try{
						if(i==divbefor){
							document.getElementById(id+i).className=c1;
							document.getElementById(id+'Box'+i).style.display="block"
						}else{
							document.getElementById(id+i).className=c2;
							document.getElementById(id+'Box'+i).style.display="none"
						}
					}catch(e){
					
					}
				}
			}
		</script>
	</head>

<body>
	<div id="bodyleft">
		<div id="logo"></div>
		<div id="navs">
			<div id="MenuBox1">
				<ul>
					<li><a href="main.html" target="main">首页仪表盘</a></li>
				</ul>
				<ul>
					<li class="zmenu">会员管理</li>
					<li><a href="MemberLavel.html" target="main">会员等级设置</a></li>
					<li><a href="MemberJifenConfig.html" target="main">积分规则设置</a></li>
					<li><a href="MembersAdmin.html" target="main">会员管理</a></li>
				</ul>
				<ul>
					<li class="zmenu">信息管理</li>
					<li><a href="NewsClass.html" target="main">信息分类配置</a></li>
					<li><a href="stateTagAdmin.html" target="main">状态标签维护</a></li>
					<li><a href="tagAdmin.html" target="main">通用标签维护</a></li>
					<li><a href="newsadmin.html" target="main">信息发布管理</a></li>
					<li><a href="MemberNewsAdmin.html" target="main">会员录入的信息</a></li>
				</ul>
				<ul>
					<li class="zmenu">广告管理</li>
					<li><a href="indexAd.html" target="main">首屏广告管理</a></li>
				</ul>
				<ul>
					<li class="zmenu">系统设置</li>
					<li><a href="systemConfig.html" target="main">期初参数配置</a></li>
					<li><a href="systemSetup.html" target="main">系统设置</a></li>
					<li><a href="ManageFunSet.html" target="main">管理权限设置</a></li>
				</ul>
				
				
			</div>
			
		</div>
		
	</div>
	
	<div id="bodytop">
		<div id="bodytops">
			<div id="leftLabel"><</div>
			<div id="rightLabel"><</div>
			
			<div id="sysMenus" style="display:none">
				<ul>
					<li id="Menu1" class="sed" onClick="showdiv(7,1,'Menu','sed','nosed')">网站/网店</li>
					<li id="Menu2" onClick="showdiv(7,2,'Menu','sed','nosed')">营销</li>
					<li id="Menu3" onClick="showdiv(7,3,'Menu','sed','nosed')">客户</li>
					<li id="Menu4" onClick="showdiv(7,4,'Menu','sed','nosed')">组织/员工</li>
					<li id="Menu5" onClick="showdiv(7,5,'Menu','sed','nosed')">系统</li>
				</ul>
			</div>
			
			<div id="MemberTop">
				<div id="" style="float:left;width:48px;height:48px;border-radius:30px;margin:20px;background:url(images/headpic.jpg) #444;background-position:center;background-size:cover;border:2px solid #666"></div>
				<div style="float:left;padding-top:23px;">
					<div style="font-size:12px;color:#FFE100">系统管理员</div>
					<div style="margin-top:3px;text-align:right"><a href="ModManagePwd.html" target="main">修改密码</a>　　<a href="#">账户设置</a>　　<a href="index.html">退出系统</a></div>
				</div>
			</div>			
		</div>		
	</div>
	
	<div id="bodyright">
		<div id="ServerHead"></div>
		<div id="ServerUName">您的一对一项目经理<br><span style="font-size:16px;color:#FFE100">Keven</span></div>
		<div id="ServerList">
			<ul>
				<li><div class="ServerHeadpic"></div><div class="ServerInfo"><div class="ServerName">项目经理 Liu.he</div><div class="ServerText">M:13730295208</div></div></li>
				<li><div class="ServerHeadpic"></div><div class="ServerInfo"><div class="ServerName">技术总监 YangFan</div><div class="ServerText">M:13730295208</div></div></li>
				<li><div class="ServerHeadpic"></div><div class="ServerInfo"><div class="ServerName">UI设计师 Jessie</div><div class="ServerText">M:13730295208</div></div></li>
				<li><div class="ServerHeadpic"></div><div class="ServerInfo"><div class="ServerName">技术开发 JaFeng</div><div class="ServerText">M:13730295208</div></div></li>
				<li><div class="ServerHeadpic"></div><div class="ServerInfo"><div class="ServerName">测试 All.Team</div><div class="ServerText">M:13730295208</div></div></li>
			</ul>
		</div>
	</div>
	<div id="maintop"></div>
	<div id="mainbodys">
		<iframe name="main" src="main.html" style="width:100%;height:100%;border:0px;"></iframe>
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
		<!-- <div style="width:31.5%;float:left;height:200px;background:#FFF;border:1px solid #e0e0e0;margin:10px;"></div> -->
	</div>
</body>
</html>
