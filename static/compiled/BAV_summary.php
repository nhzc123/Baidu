<!-- edit by charles.nhzc 
        at 2013-05-20
 E-mail:charles.nhzc@gmail.com
 --><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>百度深研国际化评测平台</title>
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
		 <script type="text/javascript" src="../configuration/js/BAV/summaryAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	
	
	
	
</head>
<body>
	<!--面包屑-->
	
	<table><tr><td><h2 class="title">评测综述</h2></td><td>（最新更新时间：<?php echo $sm_time; ?> 更新周期：每个大版本发布）</td></tr></table>
   <h3 id="test1">
   <?php echo $summary1; ?>
	</h3>

	


<table><tr><td><h2 class="title">性能、检出率对比</h2></td><td>（最新更新时间：<?php echo $dr_time; ?> 更新周期：每个大版本更新）</td></tr></table>
	
<table class="table">
<thead>
<th></th>
<th>CPU</th>
<th>内存（M）</th>
<th>扫描速度（Files/s）</th>
<th>样本清理速度（Files/s）</th>
<th>快速扫描时间（s）</th>


</thead>

<tbody>
<tr>
<td><?php echo $dr_version_bav; ?></td>
<td><?php echo $dr_cpu_bav; ?>%</td>
<td><?php echo $dr_memory_bav; ?></td>
<td><?php echo $dr_scan_bav; ?></td>
<td><?php echo $dr_clean_bav; ?></td>
<td><?php echo $dr_c_time_bav; ?></td>

</tr>

<tr>
<td><?php echo $dr_version_nod; ?></td>
<td><?php echo $dr_cpu_nod; ?>%</td>
<td><<?php echo $dr_memory_nod; ?></td>
<td><?php echo $dr_scan_nod; ?></td>
<td><?php echo $dr_clean_nod; ?></td>
<td><?php echo $dr_c_time_nod; ?></td>

</tr>

<tr>
<td><?php echo $dr_version_kis; ?></td>
<td><?php echo $dr_cpu_kis; ?>%</td>
<td><?php echo $dr_memory_kis; ?></td>
<td><?php echo $dr_scan_kis; ?></td>
<td><?php echo $dr_clean_kis; ?></td>
<td><?php echo $dr_c_time_kis; ?></td>

</tr>

</tbody>
</table>


<br>

<br>

<table>
	<tr>
	<td style="width:10%;">
	</td>
	<td>
	<div id='canvasDiv3' >
	</td>
	<td style="width:20%;">
	</td>
	</tr>
	
	</table>
	



<h3 style="font-size:21px;">
    点评：
    </h3>
	 <h3 id="test2">
	<?php echo $summary2; ?>
	</h3>
	
<br>
<br>
<table><tr><td><h2 class="title">样本拦截率对比</h2></td><td>（最新更新时间：<?php echo $ir_time; ?> 更新周期：每个大版本更新）</td></tr></table>

<table class="table">
<thead>
<th></th>
<th>样本个数</th>
<th>拦截个数</th>
<th>拦截率</th>

</thead>
<tbody>
<tr>
<td><?php echo $ir_version_bav; ?></td>
<td><?php echo $ir_sample_bav; ?></td>
<td><?php echo $ir_intercept_bav; ?></td>
<td><?php echo $ir_rate_bav; ?>%</td>
</tr>
<tr>
<td><?php echo $ir_version_360; ?></td>
<td><?php echo $ir_sample_360; ?></td>
<td><?php echo $ir_intercept_360; ?></td>
<td><?php echo $ir_rate_360; ?>%</td>
</tr>
</tbody>
</table>

		  
<h3 style="font-size:21px;">
    点评：
    </h3>
	 <h3 id="test3">
	<?php echo $summary3; ?>
	</h3>
	
	<br>
	
	<table><tr><td><h2 class="title">产品关键指标总览</h2></td><td>（最新更新时间：<?php echo $kp_time; ?> 更新周期：每个大版本发布）</td></tr></table>
	
	
	<!--表格-->
	<table class="table">
	<thead>
	 <tr>
            <th>国家</th>
          
            
            
            <th>MAU实际值</th>
			
			<th>organic 4周留存率</th>
			
		
            
            </tr>
	</thead>
		
		<tbody>
           
            <tr>
            <td>
              <?php echo $kp_country_bz; ?>
              </td>
			  
			 
			  
			   <td>
           <?php echo $kp_mau_bz; ?>
              </td>
			  
			   <td>
            <?php echo $kp_organic_bz; ?>%
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
            <?php echo $kp_country_id; ?>
              </td>
			  
			 
			  
			   <td>
             <?php echo $kp_mau_id; ?>
              </td>
			  
			   <td>
             <?php echo $kp_organic_id; ?>%
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
              <?php echo $kp_country_tl; ?>
              </td>
			  
			  
			  
			   <td>
           <?php echo $kp_mau_tl; ?>
              </td>
			  
			   <td>
              <?php echo $kp_organic_tl; ?>%
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
            <?php echo $kp_country_sa; ?>
              </td>
			  
			 
			  
			   <td>
               <?php echo $kp_mau_sa; ?>
              </td>
			  
			   <td>
             <?php echo $kp_organic_sa; ?>%
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
             <?php echo $kp_country_uae; ?>
              </td>
			  
			 
			  
			   <td>
           <?php echo $kp_mau_uae; ?>
              </td>
			  
			   <td>
            <?php echo $kp_organic_uae; ?>%
              </td>
            
                    
                                      
            </tr>
          </tbody>
	</table>
	
	
	<br>
	<br>
<br>



<script>

	$(function(){
				var data = [
				         	{
				         		name : 'BAV',
				         		value:<?php echo $dr_bav; ?>,
				         		color:'#c56966'
				         	},
								{
				         		name : 'Nod32',
				         		value:<?php echo $dr_nod; ?>,
				         		color:'#1385a5'
				         	},
				         	{
				         		name : '金山毒霸',
				         		value:<?php echo $dr_kis; ?>,
				         		color:'#222'
				         	}
							
				         ];
				var chart = new iChart.ColumnMulti2D({
						render : 'canvasDiv3',
						data: data,
						labels:["CPU(%)","内存(M)","扫描速度(Files/s)","样本清理速度(Files/s)","快速扫描时间(s)"],
						title : '性能对比',			
						footnote : '数据来源：百度',
						width : 1000,
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
								 end_scale:200,
								 scale_space:20
							}],
							width:800,
							height:260
						}
				});
				chart.draw();
			});

		
	
	
	
	
</script>
	
</body>
</html>
