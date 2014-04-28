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
				        	{name : '5星',value : 10815,color:'#97b3bc'},
				        	{name : '4星',value : 5732,color:'#FF3333'},
				        	{name : '3星',value : 3530,color:'#cd5c5c'},
				        	{name : '2星',value : 1685,color:'#006666'},
				        	{name : '1星',value : 2219,color:'#CC3333'}
			        	];
	        	
				new iChart.Bar2D({
					render : 'canvasDiv',
					background_color : '#EEEEEE',
					data: data,
					title : '评价分布图',
					
					footnote : '数据来源：百度   单位：个',
					width : 800,
					height : 400,
					coordinate:{
						width:640,
						height:260,
						scale:[{
							 position:'bottom',	
							 start_scale:0,
							 end_scale:15000,
							 scale_space:2000
						}]
					},
					sub_option:{
						border:{
							enable : false
						},
						label:{color:'#333333'}
					},
					shadow:true,
					shadow_color:'#8d8d8d',
					shadow_blur:1,
					shadow_offsety:1,
					shadow_offsetx:1,
					legend:{enable:false}
				}).draw();
			});
		
		
		</script>
</head>
<body>
	<!--面包屑-->
	
	
	
	
	<table><tr><td><h2 class="title">评价分布图</h2></td><td>（最新更新时间：2013-05-14 更新周期：每天）</td></tr></table>
	
	<!--表格-->
	<table class="table">
	<thead>
	 <tr>
            <th>5星</th>
            <th>4星</th>
            <th>3星</th>
            <th>2星</th>
            <th>1星</th>
            </tr>
	</thead>
		
		<tbody>
           
            <tr>
            <td>
              10815
              </td>
              <td>
              5732
              </td>
              <td id="forum-8" class="forum-main">
              3530
              </td>

              <td id="forum-8" class="forum-main">
              1685
              </td>
              <td>
              2219
              </td>              
                                  
            </tr>
          </tbody>
	</table>
	
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
	
</body>
</html>