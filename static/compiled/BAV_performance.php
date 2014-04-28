<!-- edit by charles.nhzc 
        at 2013-05-20
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
		 <script type="text/javascript" src="../configuration/js/BAV/performanceAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	<h2 class="title">性能报告</h2>
	
	<table><tr><td><h2 class="title">客户端总体性能</h2></td><td>（最新更新时间：<?php echo $pe_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test1">
   <?php echo $performance1; ?>
	</h3>

	<!--表格-->
		<table class="table">
<thead>
<th></th>
<th>CPU（%）</th>
<th>内存（M）</th>
<th>IO读（M）</th>
<th>IO写（M）</th>



</thead>

<tbody>

<?php echo $pf_1; ?>

<tr>
<td><?php echo $pf_version_2; ?></td>
<td><?php echo $pf_cpu_2; ?></td>
<td><?php echo $pf_memory_2; ?></td>
<td><?php echo $pf_read_2; ?></td>
<td><?php echo $pf_write_2; ?></td>



</tr>

<tr>
<td><?php echo $pf_version_3; ?></td>
<td><?php echo $pf_cpu_3; ?></td>
<td><?php echo $pf_memory_3; ?></td>
<td><?php echo $pf_read_3; ?></td>
<td><?php echo $pf_write_3; ?></td>


</tr>

</tbody>
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
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
<h3 id="test2">
   <?php echo $performance2; ?>
	</h3>



<br>
<br>
<br>
	
	<table class="table">
<thead>
<th></th>
<th>白样本扫描速度（Files/s）</th>
<th>黑样本扫描速度（Files/s）</th>
<th>快速扫描速度（s）</th>
<th>病毒清理速度（Files/s）</th>



</thead>

<tbody>
<?php echo $p2_1; ?>

<tr>
<td><?php echo $p2_version_2; ?></td>
<td><?php echo $p2_white_2; ?></td>
<td><?php echo $p2_black_2; ?></td>
<td><?php echo $p2_scan_2; ?></td>
<td><?php echo $p2_clean_2; ?></td>


</tr>

<tr>
<td><?php echo $p2_version_3; ?></td>
<td><?php echo $p2_white_3; ?></td>
<td><?php echo $p2_black_3; ?></td>
<td><?php echo $p2_scan_3; ?></td>
<td><?php echo $p2_clean_3; ?></td>


</tr>

</tbody>
</table>


		
		
		
		
		
		
	
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
	
	
	<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv5' >
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
	<div id='canvasDiv6' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test3">
   <?php echo $performance3; ?>
	</h3>

<br>
<br>
	
	
	<table class="table">
<thead>
<th></th>
<th>开机时间（s）</th>
<th>复制文件时间（s）</th>
<th>进程启动时间（s）</th>
<th>浏览网页时间（s）</th>



</thead>

<tbody>
<tr>
<td><?php echo $p3_version_1; ?> </td>
<td><?php echo $p3_boot_1; ?> </td>
<td><?php echo $p3_copy_1; ?> </td>
<td><?php echo $p3_process_1; ?> </td>
<td><?php echo $p3_browser_1; ?> </td>


</tr>

<tr>
<td><?php echo $p3_version_2; ?> </td>
<td><?php echo $p3_boot_2; ?> </td>
<td><?php echo $p3_copy_2; ?> </td>
<td><?php echo $p3_process_2; ?> </td>
<td><?php echo $p3_browser_2; ?> </td>


</tr>


<tr>
<td><?php echo $p3_version_3; ?> </td>
<td><?php echo $p3_boot_3; ?> </td>
<td><?php echo $p3_copy_3; ?> </td>
<td><?php echo $p3_process_3; ?> </td>
<td><?php echo $p3_browser_3; ?> </td>


</tr>


</tbody>
</table>

	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test4">
   <?php echo $performance4; ?>
	</h3>


<br>
<br>
<br>
	
<table><tr><td><h2 class="title">客户端子引擎性能</h2></td><td>（最新更新时间：<?php echo $pe_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test5">
   <?php echo $performance5; ?>
	</h3>

	
	
	
	
	
	<table>
	<tr>
	<td style="width:20%;">
	</td>
	<td>
	<div id='canvasDiv7' >
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
	<div id='canvasDiv8' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	<br>
<br>
<br>




	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
<h3 id="test6">
   <?php echo $performance6; ?>
	</h3>

<br>



<script>


			$(function(){
			var data = [
			        	{
			        		name : 'BavAs',
			        		value:<?php echo $cpu_bavas; ?>,
			        		color:'#aad0db',
			        		line_width:2
			        	},
			        	{
			        		name : 'BavSk',
			        		value:<?php echo $cpu_bavsk; ?>,
			        		color:'#f68f70',
			        		line_width:2
			        	},
						{
			        		name : 'BavDs',
			        		value:<?php echo $cpu_bavds; ?>,
			        		color:'#EEEE00',
			        		line_width:2
			        	},
							{
			        		name : 'BavSs',
			        		value:<?php echo $cpu_bavss; ?>,
			        		color:'#7A67EE',
			        		line_width:2
			        	},
						{
			        		name : 'BavCs',
			        		value:<?php echo $cpu_bavcs; ?>,
			        		color:'#8B2500',
			        		line_width:2
			        	},
						{
			        		name : 'BavVt',
			        		value:<?php echo $cpu_bavvt; ?>,
			        		color:'#6959CD',
			        		line_width:2
			        	},
							{
			        		name : 'BavBh',
			        		value:<?php echo $cpu_bavbh; ?>,
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = <?php echo $labels3; ?>;
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv7',
				data: data,
				title : 'cpu(%)',
				width : 800,
				height : 400,
				legend : {
					enable : true,
					row:1,//设置在一行上显示，与column配合使用
					column : 'max',
					valign:'top',
					background_color:null,//设置透明背景
					offsetx:-30,//设置x轴偏移，满足位置需要
					border : false 
				},
				tip:{
					enable : true,
					listeners:{
						 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
						parseText:function(tip,name,value,text,i){
							return value;
						}
					}
				},
				crosshair:{
					enable:true,
					line_color:'#62bce9',
					line_width:2
				},
				sub_option:{
					label:false,
					point_size:10
				},
				background_color:'#f2f2f2',
				coordinate:{
					axis : {
						width : [0, 0, 2, 0]
					},
					
					background_color:'#ffffff',
					height:'90%',
					scale:[{
						 position:'left',	
						 scale_space:4,
						 start_scale:0,
						 scale_enable:false,//禁用小横线
						 listeners:{
							parseText:function(t,x,y){
								return {text:t+"%"}
							}
						}
					},{
						 position:'bottom',	
						 start_scale:1,
						 end_scale:12,
						 parseText:function(t,x,y){
							return {textY:y+10}
						 },
						 labels:labels
					}]
				},
				
			});
			chart.draw();
		
		});
		
		
		$(function(){
			var data = [
			        	{
			        		name : 'BavAs',
			        		value:<?php echo $pss_bavas; ?>,
			        		color:'#aad0db',
			        		line_width:2
			        	},
			        	{
			        		name : 'BavSk',
			        		value:<?php echo $pss_bavsk; ?>,
			        		color:'#f68f70',
			        		line_width:2
			        	},
						{
			        		name : 'BavDs',
			        		value:<?php echo $pss_bavds; ?>,
			        		color:'#EEEE00',
			        		line_width:2
			        	},
							{
			        		name : 'BavSs',
			        		value:<?php echo $pss_bavss; ?>,
			        		color:'#7A67EE',
			        		line_width:2
			        	},
						{
			        		name : 'BavCs',
			        		value:<?php echo $pss_bavcs; ?>,
			        		color:'#8B2500',
			        		line_width:2
			        	},
						{
			        		name : 'BavVt',
			        		value:<?php echo $pss_bavvt; ?>,
			        		color:'#6959CD',
			        		line_width:2
			        	},
							{
			        		name : 'BavBh',
			        		value:<?php echo $pss_bavbh; ?>,
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = <?php echo $labels3; ?>;
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv8',
				data: data,
				title : 'pss(M)',
				width : 800,
				height : 400,
				legend : {
					enable : true,
					row:1,//设置在一行上显示，与column配合使用
					column : 'max',
					valign:'top',
					background_color:null,//设置透明背景
					offsetx:-30,//设置x轴偏移，满足位置需要
					border : false 
				},
				tip:{
					enable : true,
					listeners:{
						 //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
						parseText:function(tip,name,value,text,i){
							return value;
						}
					}
				},
				crosshair:{
					enable:true,
					line_color:'#62bce9',
					line_width:2
				},
				sub_option:{
					label:false,
					point_size:10
				},
				background_color:'#f2f2f2',
				coordinate:{
					axis : {
						width : [0, 0, 2, 0]
					},
					
					background_color:'#ffffff',
					height:'90%',
					scale:[{
						 position:'left',	
						 scale_space:4,
						 start_scale:0,
						 scale_enable:false,//禁用小横线
						 listeners:{
							parseText:function(t,x,y){
								return {text:t}
							}
						}
					},{
						 position:'bottom',	
						 start_scale:1,
						 end_scale:12,
						 parseText:function(t,x,y){
							return {textY:y+10}
						 },
						 labels:labels
					}]
				},
				
			});
			chart.draw();
		
		});
		
		$(function(){
				var data = [
				         	{
				         		name : '<?php echo $pf_version_1_1; ?>',
				         		value:[<?php echo $pf_cpu_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $pf_version_1_2; ?>',
				         		value:[0,<?php echo $pf_cpu_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $pf_version_1_3; ?>',
				         		value:[0,0,<?php echo $pf_cpu_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $pf_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $pf_cpu_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $pf_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $pf_cpu_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $pf_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $pf_cpu_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv',
						data: data,
						labels:<?php echo $labels1; ?>,
						title : 'CPU(%)',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:100,
								 scale_space:10
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});
			
	$(function(){
				var data = [
				         	{
				         		name : '<?php echo $pf_version_1_1; ?>',
				         		value:[<?php echo $pf_memory_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $pf_version_1_2; ?>',
				         		value:[0,<?php echo $pf_memory_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $pf_version_1_3; ?>',
				         		value:[0,0,<?php echo $pf_memory_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $pf_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $pf_memory_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $pf_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $pf_memory_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $pf_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $pf_memory_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv2',
						data: data,
						labels:<?php echo $labels1; ?>,
						title : '内存(M)',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:100,
								 scale_space:10
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});
			
			
			$(function(){
				var data = [
				         	{
				         		name : '<?php echo $p2_version_1_1; ?>',
				         		value:[<?php echo $p2_white_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $p2_version_1_2; ?>',
				         		value:[0,<?php echo $p2_white_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $p2_version_1_3; ?>',
				         		value:[0,0,<?php echo $p2_white_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $p2_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $p2_white_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $p2_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $p2_white_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $p2_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $p2_white_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv3',
						data: data,
						labels:<?php echo $labels2; ?>,
						title : '白样本扫描（Files/s）',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:30,
								 scale_space:3
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});
			
			$(function(){
				var data = [
				         {
				         		name : '<?php echo $p2_version_1_1; ?>',
				         		value:[<?php echo $p2_black_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $p2_version_1_2; ?>',
				         		value:[0,<?php echo $p2_black_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $p2_version_1_3; ?>',
				         		value:[0,0,<?php echo $p2_black_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $p2_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $p2_black_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $p2_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $p2_black_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $p2_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $p2_black_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv4',
						data: data,
						labels:<?php echo $labels2; ?>,
						title : '黑样本扫描（Files/s）',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:16,
								 scale_space:2
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});
			
			$(function(){
				var data = [
				         {
				         		name : '<?php echo $p2_version_1_1; ?>',
				         		value:[<?php echo $p2_scan_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $p2_version_1_2; ?>',
				         		value:[0,<?php echo $p2_scan_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $p2_version_1_3; ?>',
				         		value:[0,0,<?php echo $p2_scan_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $p2_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $p2_scan_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $p2_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $p2_scan_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $p2_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $p2_scan_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv5',
						data: data,
						labels:<?php echo $labels2; ?>,
						title : '快速扫描时间（s）',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:250,
								 scale_space:20
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});
			
			$(function(){
				var data = [
				         	{
				         		name : '<?php echo $p2_version_1_1; ?>',
				         		value:[<?php echo $p2_clean_1_1; ?>,0,0,0,0,0],
				         		color:'#c56966'
				         	},
								{
				         		name : '<?php echo $p2_version_1_2; ?>',
				         		value:[0,<?php echo $p2_clean_1_2; ?>,0,0,0,0],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '<?php echo $p2_version_1_3; ?>',
				         		value:[0,0,<?php echo $p2_clean_1_3; ?>,0,0,0],
				         		color:'#222'
				         	},
							{
				         		name : '<?php echo $p2_version_1_4; ?>',
				         		value:[0,0,0,<?php echo $p2_clean_1_4; ?>,0,0],
				         		color:'#bed742'
				         	},
							{
				         		name : '<?php echo $p2_version_2; ?>',
				         		value:[0,0,0,0,<?php echo $p2_clean_2; ?>,0],
				         		color:'#594c6d'
				         	},
							{
				         		name : '<?php echo $p2_version_3; ?>',
				         		value:[0,0,0,0,0,<?php echo $p2_clean_3; ?>],
				         		color:'#508a88'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv6',
						data: data,
						labels:<?php echo $labels2; ?>,
						title : '病毒清理（Files/s）',			
						footnote : '数据来源：百度',
						width : 1200,
						height : 600,
						background_color : '#ffffff',
						legend:{
							enable:true,
							background_color : null,
							border : {
								enable : false
							}
						},
						coordinate:{
							background_color : '#f1f1f1',
							scale:[{
								 position:'left',	
								 start_scale:0,
								 end_scale:8,
								 scale_space:1
							}],
							width:800,
							height:460
						}
				});
				chart.draw();
			});


	
			

			
			

</script>

	
	
</body>
</html>