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
	<script type="text/javascript" src="../configuration/js/Chart.js"></script>
	<script src="../configuration/libraries/RGraph.common.core.js" ></script>
    <script src="../configuration/libraries/RGraph.radar.js" ></script>
    <script type="text/javascript" src="../configuration/libraries/RGraph.common.key.js" ></script>
	  <script type="text/javascript" src="../configuration/libraries/RGraph.common.dynamic.js" ></script>
	    <script type="text/javascript" src="../configuration/libraries/RGraph.common.effects.js" ></script>
		  <script type="text/javascript" src="../configuration/libraries/RGraph.common.js" ></script>
	
	
	<script>
	
	$(function(){
			var data = [
			        	{
			        		name : '巴西',
			        		value:[82.2,85.93,86.59,86.57,85.38],
			        		color:'#aad0db',
			        		line_width:2
			        	},
			        	{
			        		name : '泰国',
			        		value:[95.50,96.72,97.36,97.57,97.29],
			        		color:'#f68f70',
			        		line_width:2
			        	},
						{
			        		name : '印尼',
			        		value:[96.03,97.16,97.83,98.15,97.87],
			        		color:'#EEEE00',
			        		line_width:2
			        	},
							{
			        		name : '沙特',
			        		value:[96.03,97.16,97.83,98.15,97.87],
			        		color:'#7A67EE',
			        		line_width:2
			        	},
							{
			        		name : '阿联酋',
			        		value:[96.03,97.16,97.83,98.15,97.87],
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = ["5.4.0","5.5.0","5.6.0","5.7.0","6.0.0"];
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv2',
				data: data,
				title : 'pcFaster各国家MAU值对比',
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
		
		
		$(function(){
			var data = [
			        	{
			        		name : '巴西',
			        		value:[82.2,85.93,86.59,86.57,85.38],
			        		color:'#aad0db',
			        		line_width:2
			        	},
			        	{
			        		name : '泰国',
			        		value:[95.50,96.72,97.36,97.57,97.29],
			        		color:'#f68f70',
			        		line_width:2
			        	},
						{
			        		name : '印尼',
			        		value:[96.03,97.16,97.83,10,97.87],
			        		color:'#EEEE00',
			        		line_width:2
			        	},
							{
			        		name : '沙特',
			        		value:[96.03,97.16,97.83,10,10],
			        		color:'#7A67EE',
			        		line_width:2
			        	},
							{
			        		name : '阿联酋',
			        		value:[96.03,97.16,97.83,90,97.20],
			        		color:'#171717',
			        		line_width:2
			        	}
			        ];
		    
			var labels = ["5.4.0","5.5.0","5.6.0","5.7.0","6.0.0"];
			
			var chart = new iChart.LineBasic2D({
				render : 'canvasDiv',
				data: data,
				title : 'pcFaster各国家留存率对比',
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
</head>
<body>
	<!--面包屑-->
	
	<table><tr><td><h2 class="title">评测综述</h2></td><td>（最新更新时间：2013-05-14 更新周期：每个大版本发布）</td></tr></table>
    产品目标是在多个主要功能上追赶并超越相应的竞品，打造出亮点功能；其中清理能力竞品为CCleaner、优化能力竞品是Soluto、游戏加速竞品是Razer Game Faster。
	
	<table class="table">
	<thead>
	<th></th>
	<th>竞品</th>
	<th>竞争趋势</th>
	<tbody>
	<tr>
	<td>开机优化</td>
	<td>Soluto</td>
	<td>劣势较大</td>
	</tr>
	<tr>
	<td>清理能力</td>
	<td>CCleaner</td>
	<td>弱于</td>
	</tr>
	<tr>
	<td>游戏加速</td>
	<td>Razer Game Faster</td>
	<td>相当</td>
	</tr>
	
	</tbody>
	</thead>
	
	</table>
	
<li>目前PCF相比竞品CCleaner在第三方软件的清理能力上还有较大的差距，PCF只勉强达到了竞品免费版的清理能力，而竞品专业版的清理范围要广泛的多；</li>

<li>PCF相比soluto在优化能力上也有较大的差距，竞品支持上千款软件的优化、禁用，而PCF目前只支持约200款软件，且禁用功能还不完善；</li>

<li>相比竞品Razer Game Faster，PCF对FPS的提升效果与竞品相当，游戏扫描率上还略好于竞品。</li>


	
	
	<br>
	<br>
	<br>
	
	<table><tr><td><h2 class="title">产品关键指标总览</h2></td><td>（最新更新时间：2013-05-14 更新周期：每周）</td></tr></table>
	
	
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
              巴西
              </td>
			  
			 
			  
			   <td>
              
              </td>
			  
			   <td>
              
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
              泰国
              </td>
			  
			 
			  
			   <td>
              
              </td>
			  
			   <td>
              
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
              印尼
              </td>
			  
			  
			  
			   <td>
              
              </td>
			  
			   <td>
              
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
              沙特
              </td>
			  
			 
			  
			   <td>
              
              </td>
			  
			   <td>
              
              </td>
            
                    
                                      
            </tr>
			
			 <tr>
            <td>
              阿联酋
              </td>
			  
			 
			  
			   <td>
              
              </td>
			  
			   <td>
              
              </td>
            
                    
                                      
            </tr>
          </tbody>
	</table>
	<h3 style="font-size:21px;">
    点评：
    </h3>
	<h4>补充
</h4>
	
	<br>
	<br>
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
	
	<h4>从以上数据可以看出：
	
<br>
Simeji新版本在精度上较之前版本有明显改进
</h4>

<br>
<br>
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
	
	<h3 style="font-size:21px;">
    点评：
    </h3>
	
	<h4>从以上数据可以看出：
	
<br>
Simeji新版本在精度上较之前版本有明显改进
</h4>
	
		  
		  

	
	
	
	
</body>
</html>
