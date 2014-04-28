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
		<style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style> 
	<script>
			var editor8;
			KindEditor.ready(function(K) {
				editor8 = K.create('textarea[name="content8"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml8]').click(function(e) {
					
					$("#test8").empty();
					$("#test8").html(editor8.html());
					
				
					
					
					
				});
				
				
			});
			
			
			
	</script>
	
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	<h2 class="title">性能评测方法</h2>
	
	
	
	
	
<h3 id="test8" style="position:relative;left:20px;"> 
	<?php echo $performanceMethod; ?>
	
	
	</h3>
	
	<form>
			<textarea name="content8" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml8" value="保存" onclick="sendHtml(8)"/>
				
			</p>
		</form>
<br>
<br>	
<br>		

	
</body>
</html>