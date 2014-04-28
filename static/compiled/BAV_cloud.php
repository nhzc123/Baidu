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
		 <script type="text/javascript" src="../configuration/js/BAV/cloudAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	<h2 class="title">云评测报告</h2>
	
	<table><tr><td><h2 class="title">云性能评测</h2></td><td>（最新更新时间：<?php echo $cl_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test1">
   <?php echo $cloud1; ?>
	</h3>

	
	<!--表格-->
		<table class="table">
<thead>
<th></th>
<th>CPU</th>
<th>内存</th>
<th>响应速度（ms）</th>
<th>吞吐量（req/s）</th>
<th>检出率</th>
<th>超时率</th>


</thead>

<tbody>
<tr>
<td><?php echo $cl_version_ol; ?> </td>
<td><?php echo $cl_cpu_ol; ?> </td>
<td><?php echo $cl_memory_ol; ?> </td>
<td><?php echo $cl_response_ol; ?> </td>
<td><?php echo $cl_capacity_ol; ?> </td>
<td><?php echo $cl_detection_ol; ?> %</td>
<td><?php echo $cl_overtime_ol; ?> %</td>


</tr>

<tr>
<td><?php echo $cl_version_new; ?> </td>
<td><?php echo $cl_cpu_new; ?> </td>
<td><?php echo $cl_memory_new; ?> </td>
<td><?php echo $cl_response_new; ?> </td>
<td><?php echo $cl_capacity_new; ?> </td>
<td><?php echo $cl_detection_new; ?> %</td>
<td><?php echo $cl_overtime_new; ?> %</td>


</tr>



</tbody>
</table>

	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test2">
   <?php echo $cloud2; ?>
	</h3>



<br>
<br>
	
	
<table><tr><td><h2 class="title">云效果评测</h2></td><td>（最新更新时间：<?php echo $clef_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test3">
   <?php echo $cloud3; ?>
	</h3>

	
	<!--表格-->
		<table class="table">
<thead>
<th></th>
<th>云后台鉴定速度</th>
<th>样本个数</th>
<th>检出个数</th>
<th>检出率</th>
<th>扫描耗时</th>



</thead>

<tbody>
<tr>
<td><?php echo $clef_version_bavcl; ?> </td>
<td><?php echo $clef_speed_bavcl; ?> </td>
<td><?php echo $clef_sample_bavcl; ?> </td>
<td><?php echo $clef_detection_bavcl; ?> </td>
<td><?php echo $clef_rate_bavcl; ?>%</td>
<td><?php echo $clef_processed_bavcl; ?> </td>



</tr>

<tr>
<td><?php echo $clef_version_bavncl; ?> </td>
<td><?php echo $clef_speed_bavncl; ?> </td>
<td><?php echo $clef_sample_bavncl; ?> </td>
<td><?php echo $clef_detection_bavncl; ?> </td>
<td><?php echo $clef_rate_bavncl; ?>%</td>
<td><?php echo $clef_processed_bavncl; ?> </td>



</tr>

<tr>
<td><?php echo $clef_version_eng; ?> </td>
<td><?php echo $clef_speed_eng; ?> </td>
<td><?php echo $clef_sample_eng; ?> </td>
<td><?php echo $clef_detection_eng; ?> </td>
<td><?php echo $clef_rate_eng; ?>%</td>
<td><?php echo $clef_processed_eng; ?> </td>



</tr>

<tr>
<td><?php echo $clef_version_red; ?> </td>
<td><?php echo $clef_speed_red; ?> </td>
<td><?php echo $clef_sample_red; ?> </td>
<td><?php echo $clef_detection_red; ?> </td>
<td><?php echo $clef_rate_red; ?>%</td>
<td><?php echo $clef_processed_red; ?> </td>



</tr>

<tr>
<td><?php echo $clef_version_nod; ?> </td>
<td><?php echo $clef_speed_nod; ?> </td>
<td><?php echo $clef_sample_nod; ?> </td>
<td><?php echo $clef_detection_nod; ?> </td>
<td><?php echo $clef_rate_nod; ?>%</td>
<td><?php echo $clef_processed_nod; ?> </td>



</tr>



</tbody>
</table>

	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test4">
   <?php echo $cloud4; ?>
	</h3>

<br>
<br>
	
	
	
	
	

	
	
</body>
</html>