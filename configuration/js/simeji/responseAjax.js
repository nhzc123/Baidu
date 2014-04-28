function sendHtml(num)
{

	if(num==6)
	{
	response=editor6.html();
	type=1;
	}
	else if(num==7)
	{
	response=editor7.html();
	type=2;
	}
	else if(num==8)
	{
	response=editor8.html();
	type=3;
	}
	
		
		
		$.ajax( {
			type : "post",
			url : "smjResponseAjax.php",
			data:{
			response:response,
			type:type,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function sendResponse()
{


	$.ajax( {
			type : "post",
			url : "smjResponseAjax.php",
			data:{
			simeji:$("#simeji").val(),
			ATOK:$("#ATOK").val(),
			google:$("#google").val(),
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});

}

