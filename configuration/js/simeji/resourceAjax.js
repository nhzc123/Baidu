function sendHtml(num)
{


  var resource;
  
  if(num==0)
	resource=editor.html();
  else if(num==1)
	resource=editor1.html();
  else if(num==2)
	resource=editor2.html();
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "smjResourceAjax.php",
			data:{
			resource:resource,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function sendSimeji()
{
	if($("#re_simeji_version").val()==""||$("#re_simeji_cpu").val()==""||$("#re_simeji_pss").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjResourceAjax.php",
			data:{
			re_simeji_version:$("#re_simeji_version").val(),
			re_simeji_cpu:$("#re_simeji_cpu").val(),
			re_simeji_pss:$("#re_simeji_pss").val(),
			type:3,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();

				}
				});
}


function sendGoogle()
{
	if($("#re_google_version").val()==""||$("#re_google_cpu").val()==""||$("#re_google_pss").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjResourceAjax.php",
			data:{
			re_google_version:$("#re_google_version").val(),
			re_google_cpu:$("#re_google_cpu").val(),
			re_google_pss:$("#re_google_pss").val(),
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();

				}
				});
}

function sendATOK()
{
	if($("#re_ATOK_version").val()==""||$("#re_ATOK_cpu").val()==""||$("#re_ATOK_pss").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjResourceAjax.php",
			data:{
			re_ATOK_version:$("#re_ATOK_version").val(),
			re_ATOK_cpu:$("#re_ATOK_cpu").val(),
			re_ATOK_pss:$("#re_ATOK_pss").val(),
			
			type:5,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();

				}
				});
}