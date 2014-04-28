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
	 <script type="text/javascript" src="../configuration/js/kindeditor-min.js"></script>
		  <script type="text/javascript" src="../configuration/js/jquery-1.7.2.min.js"></script>
		 <script type="text/javascript" src="../configuration/js/simeji/highlightAjax.js"></script>
		 <link rel="stylesheet" href="../configuration/css/default.css" />
		
	
	
</head>
<body>
	<!--面包屑-->
	
	

	<table><tr><td><h2 class="title">亮点功能对比</h2></td><td>（最新更新时间：<?php echo $hl_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	
	
	<!--表格-->
	<table class="table" border="1">
         <thead>
		  <tr>
            <th></th>
            <th>皮肤</th>
            <th>细胞词库</th>
            <th>云输入</th>
            <th>颜文字</th>
            </tr>
		 </thead>
          <tbody>
           
            <tr>
              <td>
			  <?php echo $ATOK_version; ?>
              </td>
              <td id="forum-8" class="forum-main">
              <select id="ATOK_skin"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
           <select id="ATOK_cell"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
             <select id="ATOK_cloud"><option value="1">√</option><option value="2">X</option></select>
              </td>              
              <td id="forum-8" class="forum-main">
            <select id="ATOK_font"><option value="1">√</option><option value="2">X</option></select>
              </td> 
              </tr>
            <tr>
              <td>
             <?php echo $google_version; ?>
              </td>
              <td id="forum-8" class="forum-main">
             <select id="google_skin"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
               <select id="google_cell"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
              <select id="google_cloud"><option value="1">√</option><option value="2">X</option></select>
              </td>              
              <td id="forum-8" class="forum-main">
              <select id="google_font"><option value="1">√</option><option value="2">X</option></select>
              </td> 
              </tr>

              <tr>
              <td>
              <?php echo $simeji_version; ?>
              </td>
              <td id="forum-8" class="forum-main">
            <select id="simeji_skin"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
               <select id="simeji_cell"><option value="1">√</option><option value="2">X</option></select>
              </td>
              <td id="forum-8" class="forum-main">
               <select id="simeji_cloud"><option value="1">√</option><option value="2">X</option></select>
              </td>  
              <td id="forum-8" class="forum-main">
               <select id="simeji_font"><option value="1">√</option><option value="2">X</option></select>
              </td>               
            </tr>            
          </tbody>
        </table>
		
	
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	<h3 id="test6" style="position:relative;left:20px;"> 
	<?php echo $highlight; ?>
	
	
	</h3>
	
	
<br>
<br>	
<br>		
	
	<script>
	$("#ATOK_skin").val(<?php echo $ATOK_skin; ?>);
	$("#ATOK_cell").val(<?php echo $ATOK_cell; ?>);
	$("#ATOK_cloud").val(<?php echo $ATOK_cloud; ?>);
	$("#ATOK_font").val(<?php echo $ATOK_font; ?>);
	
	$("#google_skin").val(<?php echo $google_skin; ?>);
	$("#google_cell").val(<?php echo $google_cell; ?>);
	$("#google_cloud").val(<?php echo $google_cloud; ?>);
	$("#google_font").val(<?php echo $google_font; ?>);
	
	$("#simeji_skin").val(<?php echo $simeji_skin; ?>);
	$("#simeji_cell").val(<?php echo $simeji_cell; ?>);
	$("#simeji_cloud").val(<?php echo $simeji_cloud; ?>);
	$("#simeji_font").val(<?php echo $simeji_font; ?>);
	
	
	
	</script>
</body>
</html>