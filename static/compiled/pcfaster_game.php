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
	
	
	<script type="text/javascript">
	$(function(){
				var data = [
				         	{
				         		name : 'AVG FPS',
				         		value:[63.264,63.918,63.994],
				         		color:'#1385a5'
				         	}
				         	
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv',
						data: data,
						labels:["未优化","PCF","Razer"],
						title : 'AVG FPS:',			
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
								 end_scale:100,
								 scale_space:20
							}],
							width:600,
							height:260
						}
				});
				chart.draw();
			});
			
			
			
			
			
			
			
		</script>
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
			
	<table><tr><td><h2 class="title">游戏功能对比</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>
	
	
	
	
	<!--表格-->
	评价产品在用户玩游戏时能为用户提升多少的FPS（越高表示游戏体验越好）
	<br>
	<br>
	
	
	<h3 style="font-size:21px;">	游戏过程中FPS提升效果</h3>
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
	
	<h4>在测试机上玩魔兽争霸游戏，没有使用加速器、使用PCF加速后和使用Razer加速后的FPS值差距微乎其微，说明两款游戏加速器目前对于魔兽争霸游戏的FPS几乎没有提升效果。
	后续需要采用其他游戏进行测试。



</h4>


<br>
<br>
<br>
<br>

<h3 style="font-size:21px;">	游戏扫描率</h3>
	
	<table class="table">
	<thead>
	<th></th>
	<th>已安装的游戏数</th>
	<th>PCF扫描出来的</th>
	<th>Razer扫描出来的</th>
	
	</thead>
	<tbody>
	<th>游戏个数</th>
	<th></th>
	<th></th>
	<th></th>
	</tbody>
	
	
	</table>
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h4>从以上数据可以看出：
	<br>
<li>	PCF的扫描率相对于上一版本有所提高，因为PCF对于游戏扫描的规则表进行了扩充，对扫描逻辑也进行了完善；</li>
<li>	本次评测中，PCF的扫描率相对Razer有哪些问题，哪些游戏PCF没有扫描出来；</li>




</h4>


<br/>

<br/>




	
	
	
	
	
	

	
	
</body>
</html>