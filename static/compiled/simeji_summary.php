<!-- edit by charles.nhzc 
        at 2013-05-10
 E-mail:charles.nhzc@gmail.com
 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>百度深研国际化评测平台</title>
	
	
	<link rel="stylesheet" href="../configuration/css/default.css" />
	<script id="nui-init" type="text/javascript" src="../configuration/nui/init.js"></script>
	<link rel="stylesheet" href="../configuration/css/iframe.css"/>
	<script type="text/javascript" src="../configuration/js/iframe.js"></script>
	<script type="text/javascript" src="../configuration/js/ichart.1.1.min.js"></script>
	<script type="text/javascript" src="../configuration/js/Chart.js"></script>
	<script src="../configuration/libraries/RGraph.common.core.js" ></script>
    <script src="../configuration/libraries/RGraph.radar.js" ></script>
    <script type="text/javascript" src="../configuration/libraries/RGraph.common.key.js" ></script>
	  <script type="text/javascript" src="../configuration/libraries/RGraph.common.dynamic.js" ></script>
	    <script type="text/javascript" src="../configuration/libraries/RGraph.common.effects.js" ></script>
		  <script type="text/javascript" src="../configuration/libraries/RGraph.common.js" ></script>
		  <script type="text/javascript" src="../configuration/js/kindeditor-min.js"></script>
		  <script type="text/javascript" src="../configuration/js/jquery-1.7.2.min.js"></script>
		 <script type="text/javascript" src="../configuration/js/simeji/summaryAjax.js"></script>
		  
		 
	
		
</head>
<body>
	<!--面包屑-->
	
	<table><tr><td><h2 class="title">1111111评测综述</h2></td><td>（最新更新时间：<?php echo $rd_time; ?> 更新周期：每个大版本发布）</td></tr></table>
    
	<h3 id="test" style="position:relative;left:20px;"> 
	<?php echo $summary1; ?>
	
	
	</h3>
	
	
<br>		
	
    <p>
    细节如下:
    </p>

	
	<table>
	<tr>
	<td style="width:30%;">
	</td>
	<td>
	<!-- <canvas id="canvas" height="450" width="450"></canvas> -->
             <canvas id="XdRdcvs" width="445" height="300">[No canvas support]</canvas>
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	<tr>
	<td style="width:30%;">
	</td>
	<!-- <td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蓝色代表simeji,红色代表google，黑色代表A-tok
	</td> -->
    <td> 
   
   
</td> 
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	
	
<br>
	
 <h3 style="font-size:21px;">
    点评：
    </h3>
	<h3 id="test1" style="position:relative;left:20px;"> 
	<?php echo $summary2; ?>
	
	
	</h3>
	
	
<br>
<h3 style="font-size:21px;">
    雷达图评分标准：
    </h3>
	<h3 id="test2" style="position:relative;left:20px;"> 
	<?php echo $summary3; ?>
	
	
	</h3>
	
	
	
	
	
	<table><tr><td><h2 class="title">产品关键指标总览</h2></td><td>（最新更新时间：<?php echo $kp_time; ?> 更新周期：每周）</td></tr></table>
	
	
	<!--表格-->
	<table class="table">
	<thead>
	 <tr>
            <th>当前最新版本</th>
          
            <th>MAU实际值</th>
            
            <th>organic 4周留存率</th>
            
            </tr>
	</thead>
		
		<tbody>
           
            <tr>
            <td>
               <?php echo $version; ?>
              </td>
            
              <td id="forum-8" class="forum-main">
              <?php echo $mau; ?>>
              </td>

            
              <td>
             <?php echo $retention; ?> %
              </td>              
                                      
            </tr>
          </tbody>
	</table>
	

	<br>
<br>	
<br>


	<h3 style="font-size:21px;">
    点评：
    </h3>
	<h3 id="test3" style="position:relative;left:20px;"> 
	<?php echo $summary4; ?>
	
	
	</h3>
	
	
<br>
	<table><tr><td><h2 class="title">用户评分总览</h2></td><td>（最新更新时间：<?php echo $us_time; ?> 更新周期：每个大版本发布 数据来源：googlePlay）</td></tr></table>
	
	<table class="table">
          <!-- <caption>产品关键指标总览</caption> -->
		  
		  <thead>
		  <th></th>
		  <th>simeji</th>
            <th>Google</th>
            <th>ATOK</th>
		  </thead>
            <tbody>
             <tr>
            <th>平均评分</th>
            <th><?php echo $us_simeji_point; ?></th>
            <th><?php echo $us_google_point; ?></th>
            <th><?php echo $us_ATOK_point; ?></th>
            </tr>
			<tr>
            <th>安装该app的用户数量</th>
            <th><?php echo $us_simeji_num; ?></th>
            <th><?php echo $us_google_num; ?></th>
            <th><?php echo $us_ATOK_num; ?></th>
            </tr>
          
          </tbody></table>
		  
		 
		  <br>
<br>	
<br>
		  
		 <h3 style="font-size:21px;">
    点评：
    </h3>
	<h3 id="test4" style="position:relative;left:20px;"> 
	<?php echo $summary5; ?>
	
	
	</h3>
	
	
		  
<!-- ss -->
	    <script>
      
		
		
		
         window.onload = function ()
        {
            var radar = new RGraph.Radar('XdRdcvs', [<?php echo $rd_simeji_accuracy; ?>,<?php echo $rd_simeji_response; ?>,<?php echo $rd_simeji_cpu; ?>,<?php echo $rd_simeji_pss; ?>,<?php echo $rd_simeji_package; ?>], [<?php echo $rd_google_accuracy; ?>,<?php echo $rd_google_response; ?>,<?php echo $rd_google_cpu; ?>,<?php echo $rd_google_pss; ?>,<?php echo $rd_google_package; ?>], [<?php echo $rd_ATOK_accuracy; ?>,<?php echo $rd_ATOK_response; ?>,<?php echo $rd_ATOK_cpu; ?>,<?php echo $rd_ATOK_pss; ?>,<?php echo $rd_ATOK_package; ?>]);
            radar.Set('chart.labels', ["精度(前12覆盖率)评分","反应时间评分","CPU占用评分","pss占用评分","安装包大小评分"]);
			radar.Set('colors',['transparent']);
			radar.Set('strokestyle',['red','black','blue']);
            radar.Set('chart.key', ['simeji','Google','ATOK']);
			radar.Set('chart.key.colors', ['red','black','blue']);
			radar.Set('linewidth',3);
            //radar.Set('chart.colors', ['green','red','blue']);
			
            radar.Draw();
        }
    </script>

	
	
	
	
</body>
</html>
