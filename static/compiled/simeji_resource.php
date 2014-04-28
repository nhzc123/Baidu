<!-- edit by charles.nhzc 
        at 2013-05-31
 E-mail:charles.nhzc@gmail.com
 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>百度深研国际化评测平台</title>
	<script id="nui-init" type="text/javascript" src="../configuration/nui/init.js"></script>
	<link rel="stylesheet" href="../configuration/css/iframe.css"/>
	<script type="text/javascript" src="../configuration/js/iframe.js"></script>
	<script type="text/javascript" src="../configuration/js/ichart.1.1.min.js"></script>
	 <script type="text/javascript" src="../configuration/js/kindeditor-min.js"></script>
		  <script type="text/javascript" src="../configuration/js/jquery-1.7.2.min.js"></script>
		 <script type="text/javascript" src="../configuration/js/simeji/resourceAjax.js"></script>
		 <link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	<style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style> 
	<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml]').click(function(e) {
					
					$("#test").empty();
					$("#test").html(editor.html());
					
				
					
					
					
				});
				
				
			});
			
			var editor1;
			KindEditor.ready(function(K) {
				editor1 = K.create('textarea[name="content1"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml1]').click(function(e) {
					
					$("#test1").empty();
					$("#test1").html(editor1.html());
					
				
					
					
					
				});
				
				
			});
			
			var editor2;
			KindEditor.ready(function(K) {
				editor2 = K.create('textarea[name="content2"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml2]').click(function(e) {
					
					$("#test2").empty();
					$("#test2").html(editor2.html());
					
				
					
					
					
				});
				
				
			});
			
	</script>
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
	<table><tr><td><h2 class="title">资源占用对比</h2></td></tr>
    
    <tr>
    <td>（最新更新时间：<?php echo $re_time; ?>  更新周期：每个大版本发布）</td>
    </tr>
    </table>
	
	<h3 id="test" style="position:relative;left:20px;"> 
	<?php echo $resource0; ?>
	
	
	</h3>
	
	<form>
			<textarea name="content" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml" value="保存" onclick="sendHtml(0)"/>
				
			</p>
		</form>
<br>
<br>	
<br>		


	<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv2' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	<div class="filter block">
		<div class="filter-label">新增或修改simeji数据</div>
		
		<div class="filter-item">
			版本：<input id="re_simeji_version" type="text"></input>
		</div>
		
		<div class="filter-item">
			cpu：<input id="re_simeji_cpu" type="text" ></input>
		</div>
		
		<div class="filter-item">
			pss：<input id="re_simeji_pss" type="text" ></input>
		</div>
		
		
		
	<input type="button" name="" value="保存" onclick="sendSimeji()" />
	
			
		</div>
		
		<div class="filter block">
		<div class="filter-label">修改google数据</div>
		
		<div class="filter-item">
			版本：<input id="re_google_version" type="text" value=<?php echo $re_google_version; ?>></input>
		</div>
		
		<div class="filter-item">
			cpu：<input id="re_google_cpu" type="text" value=<?php echo $re_google_cpu; ?>></input>
		</div>
		
		<div class="filter-item">
			pss：<input id="re_google_pss" type="text" value=<?php echo $re_google_pss; ?>></input>
		</div>
		
		<input type="button" name="" value="保存" onclick="sendGoogle()" />
			
		</div>
		
		<div class="filter block">
		<div class="filter-label">修改ATOK数据</div>
		
			<div class="filter-item">
			版本：<input id="re_ATOK_version" type="text" value=<?php echo $re_ATOK_version; ?>></input>
		</div>
		
		<div class="filter-item">
			cpu：<input id="re_ATOK_cpu" type="text" value=<?php echo $re_ATOK_cpu; ?> ></input>
		</div>
		
		<div class="filter-item">
			pss：<input id="re_ATOK_pss" type="text" value=<?php echo $re_ATOK_pss; ?> ></input>
		</div>
		
		
	<input type="button" name="" value="保存" onclick="sendATOK()" />
			
		</div>
	
	
	
	<br>
<br>	
<br>
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test1" style="position:relative;left:20px;"> 
	<?php echo $resource1; ?>
	
	
	</h3>
	
	<form>
			<textarea name="content1" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml1" value="保存" onclick="sendHtml(1)"/>
				
			</p>
		</form>
<br>
<br>	
<br>		

<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv3' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv4' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test2" style="position:relative;left:20px;"> 
	<?php echo $resource2; ?>
	
	
	</h3>
	
	<form>
			<textarea name="content2" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml2" value="保存" onclick="sendHtml(2)"/>
				
			</p>
		</form>
<br>
<br>	
<br>		

<script>

		
	
		
			$(function(){
			var data = [
			        	{
			        		name : '北京',
			        		value:<?php echo $pss; ?>,
			        		color:'#1f7e92',
			        		line_width:3
			        	}
			       ];
			var chart = new iChart.LineBasic2D({
						render : 'canvasDiv2',
						data: data,
						title : 'simeji各个版本PSS平均占用情况（KB）',
						width : 800,
						height : 400,
						coordinate:{height:'90%',background_color:'#f6f9fa'},
						sub_option:{
							hollow_inside:false,//设置一个点的亮色在外环的效果
							point_size:16
						},
						labels:<?php echo $labels; ?>
					});
			chart.draw();
		});
		
		$(function(){
			var data = [
			        	{
			        		name : '北京',
			        		value:<?php echo $cpu; ?>,
			        		color:'#1f7e92',
			        		line_width:3
			        	}
			       ];
			var chart = new iChart.LineBasic2D({
						render : 'canvasDiv',
						data: data,
						title : 'simeji各个版本平均CPU占用情况（%）',
						width : 800,
						height : 400,
						coordinate:{height:'90%',background_color:'#f6f9fa'},
						sub_option:{
							hollow_inside:false,//设置一个点的亮色在外环的效果
							point_size:16
						},
						labels:<?php echo $labels; ?>
					});
			chart.draw();
		});
		
		$(function(){
			var data = [
			        	{name : <?php echo $re_simeji_version; ?>,value :<?php echo $re_simeji_pss; ?> ,color:'#a5c2d5'},
			        	{name : <?php echo $re_google_version; ?>,value : <?php echo $re_google_pss; ?>,color:'#cbab4f'},
			        	{name : <?php echo $re_ATOK_version; ?>,value : <?php echo $re_ATOK_pss; ?>,color:'#76a871'}
			        	
		        	];
        	
			new iChart.Bar2D({
				render : 'canvasDiv3',
				data: data,
				title : 'pss平均占用与竞品对比情况（KB）',
				showpercent:false,
				decimalsnum:2,
				width : 800,
				height : 400,
				
			
			}).draw();
	});
	
	$(function(){
			var data = [
			        	{name : <?php echo $re_simeji_version; ?>,value :<?php echo $re_simeji_cpu; ?>,color:'#a5c2d5'},
			        	{name : <?php echo $re_google_version; ?>,value : <?php echo $re_google_cpu; ?>,color:'#cbab4f'},
			        	{name : <?php echo $re_ATOK_version; ?>,value : <?php echo $re_ATOK_cpu; ?>,color:'#76a871'}
			        	
		        	];
        	
			new iChart.Bar2D({
				render : 'canvasDiv4',
				data: data,
				title : 'CPU平均占用与竞品对比情况（%）',
				showpercent:false,
				decimalsnum:2,
				width : 800,
				height : 400,
				
			
			}).draw();
	});
</script>
	
</body>
</html>