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
		 <script type="text/javascript" src="../configuration/js/BAV/killAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
	
	<table><tr><td><h2 class="title">查杀率报告</h2></td><td>（最新更新时间：<?php echo $ki_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test1">
   <?php echo $kill1; ?>
	</h3>

	
	<!--表格-->
	<table class="table">
<thead>
<th></th>
<th>卡饭样本</th>
<th>感染式</th>
<th>文档</th>
<th>脚本</th>
<th>pe样本
启发 中
</th>


</thead>

<tbody>
<tr>
<td><?php echo $ki_version_1; ?></td>
<td><?php echo $ki_kafan_1; ?></td>
<td><?php echo $ki_infect_1; ?> </td>
<td><?php echo $ki_doc_1; ?> </td>
<td><?php echo $ki_scr_1; ?> </td>
<td><?php echo $ki_pe_1; ?> </td>

</tr>

<tr>
<td><?php echo $ki_version_2; ?> </td>
<td><?php echo $ki_kafan_2; ?> </td>
<td><?php echo $ki_infect_2; ?> </td>
<td><?php echo $ki_doc_2; ?> </td>
<td><?php echo $ki_scr_2; ?> </td>
<td><?php echo $ki_pe_2; ?> </td>


</tr><tr>
<td><?php echo $ki_version_3; ?> </td>
<td><?php echo $ki_kafan_3; ?> </td>
<td><?php echo $ki_infect_3; ?> </td>
<td><?php echo $ki_doc_3; ?> </td>
<td><?php echo $ki_scr_3; ?> </td>
<td><?php echo $ki_pe_3; ?> </td>

</tr><tr>
<td><?php echo $ki_version_4; ?> </td>
<td><?php echo $ki_kafan_4; ?> </td>
<td><?php echo $ki_infect_4; ?> </td>
<td><?php echo $ki_doc_4; ?> </td>
<td><?php echo $ki_scr_4; ?> </td>
<td><?php echo $ki_pe_4; ?> </td>

</tr><tr>
<td><?php echo $ki_version_5; ?> </td>
<td><?php echo $ki_kafan_5; ?> </td>
<td><?php echo $ki_infect_5; ?> </td>
<td><?php echo $ki_doc_5; ?> </td>
<td><?php echo $ki_scr_5; ?> </td>
<td><?php echo $ki_pe_5; ?> </td>

</tr><tr>
<td><?php echo $ki_version_6; ?> </td>
<td><?php echo $ki_kafan_6; ?> </td>
<td><?php echo $ki_infect_6; ?> </td>
<td><?php echo $ki_doc_6; ?> </td>
<td><?php echo $ki_scr_6; ?> </td>
<td><?php echo $ki_pe_6; ?> </td>
</tr>



</tbody>
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
	<?php echo $kill2; ?>
	</h3>
	
<br>
<br>
	
	
	
<script>

	$(function(){
				var data = [
				         	{
				         		name : 'BAV本地',
				         		value:<?php echo $ki_2; ?>,
				         		color:'#c56966'
				         	},
								{
				         		name : 'BAV本地+云',
				         		value:<?php echo $ki_3; ?>,
				         		color:'#1385a5'
				         	},
				         	{
				         		name : 'BAV本地+云+小红伞',
				         		value:<?php echo $ki_4; ?>,
				         		color:'#222'
				         	},
							{
				         		name : 'Nod32',
				         		value:<?php echo $ki_5; ?>,
				         		color:'#bed742'
				         	},
							{
				         		name : '金山毒霸',
				         		value:<?php echo $ki_6; ?>,
				         		color:'#594c6d'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv2',
						data: data,
						labels:["卡饭样本","感染式","文档","脚本","pe样本"],
						title : '检出率',			
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
								 end_scale:120,
								 scale_space:10
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