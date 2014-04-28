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
	
	
	
</head>
<body>
	<!--面包屑-->
	
	
	
	
	<table><tr><td><h2 class="title">评价等级</h2></td><td>（最新更新时间：2013-05-14 更新周期：每天）</td></tr></table>
	
	
	
	<h3 style="font-size:21px;">
    国家：TH
    </h3>
	
	<table class="table">
		<thead>
			<th>Question type
</th>
			<th>Quantity
</th>
		</thead>
		<tbody>
			<tr>
				<td>Important
</td>
				<td>5</td>
			</tr>
			<tr>
				<td>General
</td>
				<td>4</td>
			</tr>
			<tr>
				<td>Suggestion
</td>
				<td>3</td>
			</tr>
			<tr>
				<td>Negative
</td>
				<td>4</td>
			</tr>
			<tr>
				<td>Positive
</td>
				<td>6</td>
			</tr>
			<tr>
				<td>Non-sense
</td>
				<td>11</td>
			</tr>
		</tbody>
	</table>
	
	
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
	
	

<br>

<br>
	
	
	
	<h3 style="font-size:21px;">
    国家：BR
    </h3>
	
	<table class="table">
		<thead>
			<th>Question type
</th>
			<th>Quantity
</th>
		</thead>
		<tbody>
			<tr>
				<td>Facebook
</td>
				<td>28</td>
			</tr>
			<tr>
				<td>Video/Sound
</td>
				<td>1</td>
			</tr>
			<tr>
				<td>Too Slow
</td>
				<td>60</td>
			</tr>
			<tr>
				<td>Homepage
</td>
				<td>7</td>
			</tr>
			<tr>
				<td>Theme
</td>
				<td>4</td>
			</tr>
			<tr>
				<td>I like it
</td>
				<td>42</td>
			</tr>
			<tr>
				<td>Bug
</td>
				<td>3</td>
			</tr>
			<tr>
				<td>Email
</td>
				<td>9</td>
			</tr>
			<tr>
				<td>Favorites
</td>
				<td>2</td>
			</tr>
			<tr>
				<td>Adds
</td>
				<td>7</td>
			</tr>
			<tr>
				<td>Toolbar
</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Bundle
</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Crash
</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Suggestion
</td>
				<td>2</td>
			</tr>
		</tbody>
	</table>
	
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
	
	

<br>

<br>
	
	
<script>
$(function(){
				var data = [
				        	{name : 'Important',value : 5,color:'#9d4a4a'},
				        	{name : 'General',value : 4,color:'#5d7f97'},
				        	{name : 'Suggestion',value : 3,color:'#97b3bc'},
				        	{name : 'Negative',value : 4,color:'#a5aaaa'},
				        	{name : 'Positive',value : 6,color:'#778088'},
				        	{name : 'Non-sense',value : 11,color:'#6f83a5'}
			        	];
	        	
				new iChart.Pie2D({
					render : 'canvasDiv',
					data: data,
					title : 'TH',
					legend : {
						enable : true
					},
					showpercent:true,
					decimalsnum:2,
					width : 800,
					height : 400,
					radius:140
				}).draw();
			});
			
$(function(){
				var data = [
				        	{name : 'Facebook',value : 28,color:'#9d4a4a'},
							{name : 'Toolbar',value : 0,color:'#f173ac'},
				        	{name : 'Video/Sound',value : 1,color:'#5d7f97'},
				        	{name : 'Too Slow',value : 60,color:'#97b3bc'},
				        	{name : 'Homepage',value : 7,color:'#a5aaaa'},
				        	{name : 'Theme',value : 4,color:'#778088'},
				        	{name : 'I like it',value : 42,color:'#6f83a5'},
							{name : 'Bundle',value : 0,color:'#d1c7b7'},
							{name : 'Bug',value : 3,color:'#8f4b2e'},
							{name : 'Email',value : 9,color:'#f26522'},
							{name : 'Favorites',value : 2,color:'#dea32c'},
							{name : 'Adds',value : 7,color:'#411445'},
							
							
							{name : 'Crash',value : 0,color:'#33a3dc'},
							{name : 'Suggestion',value : 2,color:'#fcf16e'}
			        	];
	        	
				new iChart.Pie2D({
					render : 'canvasDiv2',
					data: data,
					title : 'BR',
					legend : {
						enable : true
					},
					showpercent:true,
					decimalsnum:2,
					width : 800,
					height : 400,
					radius:140
				}).draw();
			});

</script>
	
</body>
</html>