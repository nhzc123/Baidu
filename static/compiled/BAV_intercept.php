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
		 <script type="text/javascript" src="../configuration/js/BAV/interceptAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	
	<table><tr><td><h2 class="title">拦截率报告</h2></td><td>（最新更新时间：<?php echo $in_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	<h3 id="test1">
   <?php echo $intercept1; ?>
	</h3>

	
		<table class="table">
<thead>
<th></th>
<th>样本总数</th>
<th>拦截样本个数</th>
<th>360弹Bav不弹数目</th>
<th>Bav弹360不弹数目</th>
<th>拦截率</th>


</thead>

<tbody>

<tr>
<td><?php echo $in_version_bav; ?> </td>
<td><?php echo $in_sample_bav; ?> </td>
<td><?php echo $in_intercept_bav; ?> </td>
<td><?php echo $in_only360_bav; ?> </td>
<td><?php echo $in_onlybav_bav; ?> </td>
<td><?php echo $in_rate_bav; ?>%</td>


</tr>
<tr>
<td><?php echo $in_version_360; ?> </td>
<td><?php echo $in_sample_360; ?> </td>
<td><?php echo $in_intercept_360; ?> </td>
<td><?php echo $in_only360_360; ?> </td>
<td><?php echo $in_onlybav_360; ?> </td>
<td><?php echo $in_rate_360; ?>%</td>


</tr>





</tbody>
</table>


<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h3 id="test2">
	<?php echo $intercept2; ?>
	</h3>
	
	<br>
	
	
	

	
	
</body>
</html>