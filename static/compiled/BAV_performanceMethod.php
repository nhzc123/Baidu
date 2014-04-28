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
		 <script type="text/javascript" src="../configuration/js/BAV/performanceAjax.js"></script>
	<link rel="stylesheet" href="../configuration/css/default.css" />
	<script>
			
			
			var editor7;
			KindEditor.ready(function(K) {
				editor7= K.create('textarea[name="content7"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist']
				});
				
				K('input[name=getHtml7]').click(function(e) {
					$("#test7").empty();
					$("#test7").html(editor7.html());
				});
				
				
			});
			
	</script>
	
	
</head>
<body>
	<!--面包屑-->
	
	
	<!--大标题-->
	<h2 class="title">性能评测方法</h2>
	<h3 id="test7">
   <?php echo $performanceMethod; ?>
	</h3>
<form>
			<textarea name="content7" style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
			<p>
				<input type="button" name="getHtml7" value="保存" onclick="sendHtml(7)" />
				
			</p>
		</form>
	
	
	

	
	
</body>
</html>