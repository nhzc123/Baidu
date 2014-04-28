function sendHtml(num)
{
//summary 1 2 3 4 5 

  var summary;
  
  if(num==1)
	summary=editor.html();
  else if(num==2)
	summary=editor1.html();
  else if(num==3)
	summary=editor2.html();
  else if(num==4)
	summary=editor3.html();
  else if(num==5)
	summary=editor4.html();
		
		
		
		$.ajax( {
			type : "post",
			url : "smjSummaryAjax.php",
			data:{
			summary:summary,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function sendRadar()
{

	
	$.ajax( {
			type : "post",
			url : "smjSummaryAjax.php",
			data:{
			rd_simeji_package:$("#rd_simeji_package").val(),
			rd_simeji_accuracy:$("#rd_simeji_accuracy").val(),
			rd_simeji_response:$("#rd_simeji_response").val(),
			rd_simeji_pss:$("#rd_simeji_pss").val(),
			rd_simeji_cpu:$("#rd_simeji_cpu").val(),
			rd_google_package:$("#rd_google_package").val(),
			rd_google_accuracy:$("#rd_google_accuracy").val(),
			rd_google_response:$("#rd_google_response").val(),
			rd_google_pss:$("#rd_google_pss").val(),
			rd_google_cpu:$("#rd_google_cpu").val(),
			rd_ATOK_package:$("#rd_ATOK_package").val(),
			rd_ATOK_accuracy:$("#rd_ATOK_accuracy").val(),
			rd_ATOK_response:$("#rd_ATOK_response").val(),
			rd_ATOK_pss:$("#rd_ATOK_pss").val(),
			rd_ATOK_cpu:$("#rd_ATOK_cpu").val(),
			type:6,
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();
				}
				});


}


function sendKeyPoint()
{
	$.ajax( {
			type : "post",
			url : "smjSummaryAjax.php",
			data:{
			version:$("#version").val(),
			mau:$("#mau").val(),
			retention:$("#retention").val(),
			type:7,
			},
			timeout : 30000,
			success : function(data) {

			
						alert("保存成功");
						
				}
				});


}

function sendUserPoint()
{
	

	$.ajax( {
			type : "post",
			url : "smjSummaryAjax.php",
			data:{
			us_simeji_point:$("#us_simeji_point").val(),
			us_google_point:$("#us_google_point").val(),
			us_ATOK_point:$("#us_ATOK_point").val(),
			us_simeji_num:$("#us_simeji_num").val(),
			us_google_num:$("#us_google_num").val(),
			us_ATOK_num:$("#us_ATOK_num").val(),	
			type:8,
			},
			timeout : 30000,
			success : function(data) {

			
						alert("保存成功");
						
				}
				});


}