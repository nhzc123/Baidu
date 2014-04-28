<!-- edit by charles.nhzc 
        at 2013-05-10
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
	  <script type="text/javascript" src="../configuration/js/jquery-1.7.2.min.js"></script>
		 <script type="text/javascript" src="../configuration/js/simeji/responseAjax.js"></script>
		 <link rel="stylesheet" href="../configuration/css/default.css" />
		  <script type="text/javascript" src="../configuration/js/kindeditor-min.js"></script>
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
	
		<table><tr><td><h2 class="title">响应速度对比</h2></td></tr>
      
        <tr>
        <td>（最新更新时间：<?php echo $rs_time; ?> 更新周期：每个大版本发布）</td>
        </tr>
        </table>
		
		<h3 id="test6" style="position:relative;left:20px;"> 
	<?php echo $response1; ?>
	
	
	</h3>
	
	
<br>		
	
	<!--表格-->
	 <table class="table" border="1">
          
		  <thead>
		    <tr>
            <th></th>
            <th>simeji</th>
            <th>ATOK</th>
            <th>Google</th>
            </tr>
		  </thead>
          <tbody>
          
            <tr>
              <td>
              主观反应速度
              </td>
              <td id="forum-8" class="forum-main">
              <select id="simeji"><option value="1">很快</option><option value="2">普通</option><option value="3">较慢</option></select>
              </td>
              <td id="forum-8" class="forum-main">
              <select id="ATOK"><option value="1">很快</option><option value="2">普通</option><option value="3">较慢</option></select>
              </td>
              <td id="forum-8" class="forum-main">
              <select id="google"><option value="1">很快</option><option value="2">普通</option><option value="3">较慢</option></select>
              </td>              
            </tr>

            </tbody>
        </table>
		
	<h3 style="font-size:21px;">
    点评：
    </h3>
	<h3 id="test7" style="position:relative;left:20px;"> 
	<?php echo $response2; ?>
	
	
	</h3>
	
	
<br>	
<script>
$("#simeji").val(<?php echo $simeji; ?>);
$("#ATOK").val(<?php echo $ATOK; ?>);
$("#google").val(<?php echo $google; ?>);


</script>	
	
</body>
</html>