function sendHtml(num)
{

   highlight=editor6.html();
  
		
		
		
		$.ajax( {
			type : "post",
			url : "smjHighlightAjax.php",
			data:{
		highlight:highlight,
			type:6,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function sendHighlight()
{
   $.ajax( {
			type : "post",
			url : "smjHighlightAjax.php",
			data:{
			ATOK_version:$("#ATOK_version").val(),
		    ATOK_skin:$("#ATOK_skin").val(),
			ATOK_cell:$("#ATOK_cell").val(),
			ATOK_cloud:$("#ATOK_cloud").val(),
			ATOK_font:$("#ATOK_font").val(),		
			google_version:$("#google_version").val(),
			google_skin:$("#google_skin").val(),
			google_cell:$("#google_cell").val(),
			google_cloud:$("#google_cloud").val(),
			google_font:$("#google_font").val(),
			
			simeji_version:$("#simeji_version").val(),
			simeji_skin:$("#simeji_skin").val(),
			simeji_cell:$("#simeji_cell").val(),
			simeji_cloud:$("#simeji_cloud").val(),
			simeji_font:$("#simeji_font").val(),
			
			
			type:7,	
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
	



}