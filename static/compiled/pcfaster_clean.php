<!-- edit by charles.nhzc 
        at 2013-05-14
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
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
		
	<table><tr><td><h2 class="title">清理功能对比</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>
	
	
	评价产品能够帮用户节省磁盘空间的能力:
	<!--表格-->
	
	<br>
	<br>
	<br>
	
	<table><tr><td><h2  style="font-size:21px;">PCF与CCleaner在系统清理点上的对比</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>
	
	
	<table class="table">
	<thead>
		<th></th>
		<th>PCF系统垃圾清理点个数</th>
		<th>CCleaner系统垃圾清理点个数</th>
	
	</thead>
	
	<tbody>
		<tr>
			<td>PCF 3.2 VS CCleaner 3.28</td>
			<td>18</td>
			<td>36</td>
		</tr>
			<tr>
			<td>PCF 3.4 VS CCleaner 4.01</td>
			<td>18</td>
			<td>36</td>
		</tr>
	
	
	</tbody>
	
	</table>
	
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
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h4>从以上数据可以看出：
	
<br>
PCF和CCleaner在系统垃圾的清理点上，目前还维持着各自的现状；
</h4>

<br>
<br>
<br>

<table><tr><td><h2  style="font-size:21px;">PCF与CCleaner在第三方清理点上的对比
</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>

	<table class="table">
	<thead>
		<th></th>
		<th>PCF支持的第三方软件数</th>
		<th>CCleaner支持的第三方软件数</th>
	
	</thead>
	
	<tbody>
		<tr>
			<td>PCF 3.2 VS CCleaner 3.28</td>
			<td>14</td>
			<td>259</td>
		</tr>
			<tr>
			<td>PCF 3.4 VS CCleaner 4.01</td>
			<td>277</td>
			<td>283</td>
		</tr>
	
	
	</tbody>
	
	</table>
	
	<br>
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
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h4>从以上数据可以看出：
	
<br>
最新版本的PCF在第三方软件清理点上有非常大的改善；但同时，CCleaner还在继续扩充它的第三方清理列表。
</h4>

<br>
<br>
<br>
	
	
	<table><tr><td><h2 class="title">详细评测结果如下：</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>
	<h3 style="font-size:21px;">在公共系统垃圾清理点上，PCF相比竞品CCleaner，在4个点上需要补充和完善，18个清理点则是欠缺状态：
	</h3>
	<table class="table">
		<thead>
			<th>PCF需完善的点（4个）</th>
			<th>Windows Log Files</th>
			<th>Thumbnail Cache</th>
			<th>Window Size/Location Cache</th>
			<th>浏览器cookies</th>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td>Delete Index.dat files</td>
				<td>Recent Documents</td>
				<td>Other Explorer MRUs</td>
				<td>Clipboard</td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;PCF</td>
				<td>DNS Cache</td>
				<td>Font Cache</td>
				<td>Old Prefetch data</td>
				<td>Menu Order Cache</td>
			</tr>
			<tr>
				<td>缺失的点</td>
				<td>Environment Path</td>
				<td>User Assist History</td>
				<td>IIS Log Files</td>
				<td>Hotfix Uninstallers</td>
			</tr>
			<tr>
				<td>（18个）</td>
				<td>Custom Folders</td>
				<td>Start Menu Shortcuts</td>
				<td>Desktop Shortcuts</td>
				<td>Wipe Free Space</td>
			</tr>
			<tr>
				<td></td>
				<td>Taskbar Jump Lists</td>
				<td>Network Passwords</td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h4>PCF需要在22个点上进行补充和挖掘，而且大多数的系统清理点清理策略和路径是内置的，需要QA和RD一起去使用工具进行分析和挖掘的。
</h4>

<br>
<br>
<br>

	<h3 style="font-size:21px;">第三方清理上PCF相比CCleaner有以下不足：</h3>
	<br>
<ul>	不支持某些软件的特殊清理策略；</ul>
<ul>	不支持Thunderbird和Opera两款浏览器；</ul>
<ul>	不支持64位软件的清理。</ul>


<br>
<br>
<br>
	
	
	
	
	<script>
	$(function(){
			var data = [
			        	
							{
			        		name : 'PCF系统垃圾清理点个数',
			        		value:[18,18],
			        		color:'#7A67EE',
			        		line_width:2
			        	},
							{
			        		name : 'CCleaner系统垃圾清理点个数',
			        		value:[36,36],
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = ["PCF 3.2 VS CCleaner 3.28","PCF 3.4 VS CCleaner 4.01"];
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv2',
				data: data,
				title : 'PCF与CCleaner在系统清理点上的对比',
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
							return value+"个点";
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
						 scale_space:5,
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
			        		name : 'PCF支持的第三方软件数',
			        		value:[14,277],
			        		color:'#7A67EE',
			        		line_width:2
			        	},
							{
			        		name : 'CCleaner支持的第三方软件数',
			        		value:[259,283],
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = ["PCF 3.2 VS CCleaner 3.28","PCF 3.4 VS CCleaner 4.01"];
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv',
				data: data,
				title : 'PCF与CCleaner在第三方清理点上的对比',
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
							return value+"个点";
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
						 scale_space:50,
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
	
	
	</script>
	

	
	
</body>
</html>