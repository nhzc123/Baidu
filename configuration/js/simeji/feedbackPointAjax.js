function sendUserPoint()
{

	if($("#point5").val()==""||$("#point4").val()==""||$("#point3").val()==""||$("#point2").val()==""||$("#point1").val()=="")
	{
		alert("请填写完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjFeedbackPointAjax.php",
			data:{
			point5:$("#point5").val(),
			point4:$("#point4").val(),
			point3:$("#point3").val(),
			point2:$("#point2").val(),
			point1:$("#point1").val(),
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();

				}
				});
}

