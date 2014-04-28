<!-- edit by charles.nhzc 
        at 2013-05-10
 E-mail:charles.nhzc@gmail.com
 -->

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<title>simeji评测平台</title>
	<script id="nui-init" type="text/javascript" src="../configuration/nui/init.js"></script>
	<link rel="stylesheet" href="../configuration/css/style.css"/>
	<script type="text/javascript" src="../configuration/js/script.js"></script>
	
	
</head>
<body>
	<!--[if lte IE 8]>
	<div class="tipsBar" id="dIETips" onclick="this.style.display='none';oa.init()">
		还在用IE？用 <a href="https://www.google.com/chrome/" target="_blank">Chrome</a> 吧！
	</div>
	<![endif]-->
	<!--[if lte IE 6]>
	<div class="tipsBar" style="position:absolute;left:0;top:0;width:100%">
		系统不支持IE6，请升级IE或者使用<a href="https://www.google.com/chrome/" 
target="_blank">其他浏览器</a>。
	</div>
	<![endif]-->
	<div class="page">
		<header id="dHeader" class="header">
			<h1 class="logo">
				<b>Baidu</b>国际化客户端评测
				<span class="logo-ver">1.3.0</span>
			</h1>

			<div class="shortcut">
				<!--
						在item那一层增加shortcut-item-unfold显示菜单，或者用
						
oa.fold(this,"shortcut-item",true,"unfold")显示，oa.fold(this,"shortcut-item",t
rue,"fold")隐藏
					-->
				<div class="shortcut-item shortcut-item-1"
					onmouseover="oa.fold(this,'shortcut-item',false,'unfold')"
					onmouseout="oa.fold(this,'shortcut-item',false,'fold')">
					<div class="shortcut-item-dropdown">
						公司链接
						<b class="ico ico-coolArr ico-coolArr-down"></b>
					</div>
					<div class="shortcut-menu">
						<div class="shortcut-menu-item">
							<a target="_blank" href="http://family.baidu.com/core/index.jsp"
								class="shortcut-menu-item-link">百度之家</a>
							<a target="_blank"
								href="http://dbd.baidu.com/bdpf/login.jsp"
								class="shortcut-menu-item-link">大百度交流平台</a>
							<a target="_blank" href="http://erp.baidu.com/"
								class="shortcut-menu-item-link">ERP系统</a>
							<a target="_blank" href="http://icafe.baidu.com/"
								class="shortcut-menu-item-link">iCafe系统</a>
							<a target="_blank"
								href="http://doc.hz.netease.com/display/email/Home"
								class="shortcut-menu-item-link">公司wiki</a>
						</div>
					</div>
				</div>
				<div class="shortcut-item shortcut-item-2"
					onmouseover="oa.fold(this,'shortcut-item',false,'unfold')"
					onmouseout="oa.fold(this,'shortcut-item',false,'fold')">
					<div class="shortcut-item-dropdown">
						部门链接
						<b class="ico ico-coolArr ico-coolArr-down"></b>
					</div>
					<div class="shortcut-menu">
						<div class="shortcut-menu-item">
							<a target="_blank" href="
http://wiki.babel.baidu.com/twiki/bin/view/Com/Test/I18nclientQaGeneralLear
ning#日报与周报"
								class="shortcut-menu-item-link">部门wiki</a>
						</div>
					</div>
				</div>
			</div>
			
			<div style="position:relative;left:220px;top:10px;"><a href="index.php"><p style="color:#fff;font-size:20px;" >返回主页</p>
			</a></div>
			</header>
		
		<div class="body">

				<div id="dUserInfo" class="userInfo mod">
					<div class="userInfo-user">
						<div class="userInfo-user-face face">
							<img src="../configuration/img/simeji/simeji65x65.png" />
						</div>
						<div class="userInfo-user-name"></div>
						<div id="motto" class="userInfo-user-hi">

							Simeji is a Japanese and English IME(Software keyboard).
							
It provides various software keyboards, like flick-style. 
<br>
These make your input experience more comfortable.
<br>
Skin is another function. You can customize the background of your keyboard as you like .


						</div>
					</div>
				</div>



				<div class="main grids grids-2">

					<div class="grids-item grids-item-1" id="dNavs">
						<div class="nav themeColor-2 mod nav-unfold">
							<div class="nav-colorBar"></div>
							<!-- 激活时（右侧显示内容）增加 nav-title-active -->

							<div class="nav-title"
								onclick="fFold(this.parentNode,'nav',true)" id="dNav1">
								<div>
									评测概述
									<span class="navAlert txt-aside" data-type="navAlert"><span
										id="monitor_num" data-type="text"></span> </span>
								</div>


								<b class="nav-title-foldSymbol"></b><b
									class="ico ico-arr ico-arr-l"><span class="ico-arr-main">&#9670;
</span><span
									class="ico-arr-bdr">&#9670;</span> </b>
							</div>
							<ul class="nav-list">
								<!-- 激活时（右侧显示内容）增加 nav-list-item-active -->
								<li class="nav-list-item">
									<div class="nav-list-item-title" id="dNav2"
										onclick="oa.go('index.php?name=simeji&childPage=summary')">
										总体报告
										<span class="navAlert txt-aside" data-type="navAlert"><span
											id="untreated_num" data-type="text"></span> </span>
									</div>
								</li>
								
								
							</ul>
						</div>
						<div class="nav themeColor-3 mod nav-unfold">
							<div class="nav-colorBar"></div>
							<div class="nav-title"
								onclick="fFold(this.parentNode,'nav',true)">

								<div>
									竞品对比
									<span class="navAlert txt-aside" data-type="navAlert"><span
										id="auto_num" data-type="text"></span>
								</div>
								<b class="nav-title-foldSymbol"></b><b
									class="ico ico-arr ico-arr-l"><span class="ico-arr-main">&#9670;
</span><span
									class="ico-arr-bdr">&#9670;</span> </b>

							</div>
							<ul class="nav-list">

								<li class="nav-list-item ">
									<div class="nav-list-item-title nav-list-item-title-spec"
										onclick="fFold(this.parentNode,'nav-list-item')">
										<b class="nav-list-item-title-foldSymbol"></b>精度对比
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
									<ul class="nav-list-subList">
										<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=accuracy')">
										精度报告
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
										<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=accuracyMethod')">
										精度评测方法
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>

									</ul>
								</li>

								<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=highlight')">
										亮点功能对比
										<b id="set_untreated"></b>
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
									<li class="nav-list-item ">
									<div class="nav-list-item-title nav-list-item-title-spec"
										onclick="fFold(this.parentNode,'nav-list-item')">
										<b class="nav-list-item-title-foldSymbol"></b>性能对比
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
									<ul class="nav-list-subList">
										<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=response')">
										响应速度
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
										<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=resource')">
										资源消耗
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
								<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=performanceMethod')">
										性能评测方法
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>

									</ul>
								</li>


							</ul>
						</div>
						<div class="nav themeColor-4 mod nav-unfold">
							<div class="nav-colorBar"></div>
							<div class="nav-title"
								onclick="fFold(this.parentNode,'nav',true)">
								用户反馈
								<b class="nav-title-foldSymbol"></b><b
									class="ico ico-arr ico-arr-l"><span class="ico-arr-main">&#9670;
</span><span
									class="ico-arr-bdr">&#9670;</span> </b>
							</div>
							<ul class="nav-list">

								<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=feedbackPoint')">
										评价等级
										<b id="set_untreated"></b>
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
								<li class="nav-list-item">
									<div class="nav-list-item-title"
										onclick="oa.go('index.php?name=simeji&childPage=feedbackContent')">
										反馈内容
										<b class="ico ico-arr ico-arr-l"><span
											class="ico-arr-main">&#9670;</span><span class=
"ico-arr-bdr">&#9670;</span>
										</b>
									</div>
								</li>
								
							</ul>
						</div>
					
						
					</div>


					<div class="grids-item grids-item-2">
						<div id="dContent" class="content mod">
						</div>
					</div>
				</div>

			</div>
		
		<footer id="dFooter" class="footer">
			
		</footer>
	</div>
	<script type="text/javascript">
		// 切换内容demo
		oa.go('index.php?name=simeji&childPage=summary');
	</script>
<footer>
  <div >
   
    <hr>
    <div class="userInfo-user-hi" style="text-align:center">
     
        
        © 2013 Baidu    Design by: charles.nhzc || hi:周超_嗷嗷
        
        
     
     
    </div>
  </div>
</footer>
	
</body>

</html>