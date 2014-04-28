function sendHtml(num)
{
//intercept 1 2 3 

  var intercept;
  
  if(num==1)
	intercept=editor1.html();
  else if(num==2)
	intercept=editor2.html();
  else if(num==3)
	intercept=editor3.html();
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "bavInterceptAjax.php",
			data:{
			intercept:intercept,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function setIntercept()
{


	
	$.ajax( {
			type : "post",
			url : "bavInterceptAjax.php",
			data:{
			in_version_bav:$("#in_version_bav").val(),
			in_sample_bav:$("#in_sample_bav").val(),
			in_intercept_bav:$("#in_intercept_bav").val(),
			in_only360_bav:$("#in_only360_bav").val(),
			in_onlybav_bav:$("#in_onlybav_bav").val(),
			
			in_version_360:$("#in_version_360").val(),
			in_sample_360:$("#in_sample_360").val(),
			in_intercept_360:$("#in_intercept_360").val(),
			in_only360_360:$("#in_only360_360").val(),
			in_onlybav_360:$("#in_onlybav_360").val(),
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});




}
