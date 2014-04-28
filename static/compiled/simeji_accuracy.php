<!-- edit by charles.nhzc 
        at 2013-05-10
 E-mail:charles.nhzc@gmail.com
 -->
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
		 <script type="text/javascript" src="../configuration/js/simeji/accuracyAjax.js"></script>
		 <link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
	
	<table><tr><td><h2 class="title"> 出词精度对比</h2></td></tr>
   
    <tr>
    <td>
    （最新更新时间：<?php echo $ac_time; ?> 更新周期：每个大版本发布）
    </td>
    </tr>
    </table>
	<h3 id="test" style="position:relative;left:20px;"> 
	<?php echo $accuracy0; ?>
	
	
	</h3>
	
	

	

	
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
	
	
	
<br>	
<br>
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test1" style="position:relative;left:20px;"> 
	<?php echo $accuracy1; ?>
	
	
	</h3>
	
	


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
	
		<h3 id="test2" style="position:relative;left:20px;"> 
	<?php echo $accuracy2; ?>
	
	
	</h3>
	
	
<br>		


<script type="text/javascript">
	$(function(){
				var data = [
				         	{
				         		name : 'ATOK',
				         		value:[<?php echo $ac_ATOK_top1; ?>,<?php echo $ac_ATOK_top6; ?>,<?php echo $ac_ATOK_top12; ?>],
				         		color:'#1385a5'
				         	},
				         	{
				         		name : 'Google',
				         		value:[<?php echo $ac_google_top1; ?>,<?php echo $ac_google_top6; ?>,<?php echo $ac_google_top12; ?>],
				         		color:'#c56966'
				         	},
							{
				         		name : 'simeji',
				         		value:[<?php echo $ac_simeji_top1; ?>,<?php echo $ac_simeji_top6; ?>,<?php echo $ac_simeji_top12; ?>],
				         		color:'#EEEE00'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv',
						data: data,
						labels:["首选率","前6覆盖率","前12覆盖率"],
						title : 'simeji最新版与竞品的覆盖率对比柱形图(%):',			
						footnote : '数据来源：百度',
						width : 800,
						height : 400,
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
								 end_scale:140,
								 scale_space:20
							}],
							width:600,
							height:260
						}
				});
				chart.draw();
			});
			
			
			
			
			
			$(function(){
			var data = [
			        	{
			        		name : '首选率',
			        		value:<?php echo $top1; ?>,
			        		color:'#aad0db',
			        		line_width:2
			        	},
			        	{
			        		name : '前六覆盖率',
			        		value:<?php echo $top6; ?>,
			        		color:'#f68f70',
			        		line_width:2
			        	},
						{
			        		name : '前十二覆盖率',
			        		value:<?php echo $top12; ?>,
			        		color:'#EEEE00',
			        		line_width:2
			        	}
			        ];
		    
			var labels = <?php echo $labels; ?>;
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv2',
				data: data,
				title : 'simeji历史版本对比',
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
							return name+":"+labels[i]+"版本<br/>覆盖率"+value+"%";
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
						 scale_space:1,
						 start_scale:80,
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
			
		</script>


</body>
</html>