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
	<script type="text/javascript" src="../configuration/js/kindeditor-min.js"></script>
		  <script type="text/javascript" src="../configuration/js/jquery-1.7.2.min.js"></script>
		 <script type="text/javascript" src="../configuration/js/BAV/killAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	<script>
			
			
			var editor3;
			KindEditor.ready(function(K) {
				editor3 = K.create('textarea[name="content3"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml3]').click(function(e) {
					$("#test3").empty();
					$("#test3").html(editor3.html());
				});
				
				
			});
			
	</script>
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	<h2 class="title">查杀评测方法</h2>
	
	<h3 id="test3">
   <?php echo $killMethod; ?>
	</h3>
<form>
			<textarea name="content3" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml3" value="保存" onclick="sendHtml(3)" />
				
			</p>
		</form>
	
	
	
	

	
	
</body>
</html>