function sendHtml(num)
{
//summary 1 2 3 

  var summary;
  
  if(num==1)
	summary=editor1.html();
  else if(num==2)
	summary=editor2.html();
  else if(num==3)
	summary=editor3.html();
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "bavSummaryAjax.php",
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

function setDetectionRate()
{
	
	
	$.ajax( {
			type : "post",
			url : "bavSummaryAjax.php",
			data:{
			dr_version_bav:$("#dr_version_bav").val(),
			dr_cpu_bav:$("#dr_cpu_bav").val(),
			dr_memory_bav:$("#dr_memory_bav").val(),
			dr_scan_bav:$("#dr_scan_bav").val(),
			dr_clean_bav:$("#dr_clean_bav").val(),
			dr_c_time_bav:$("#dr_c_time_bav").val(),
			
			dr_version_nod:$("#dr_version_nod").val(),
			dr_cpu_nod:$("#dr_cpu_nod").val(),
			dr_memory_nod:$("#dr_memory_nod").val(),
			dr_scan_nod:$("#dr_scan_nod").val(),
			dr_clean_nod:$("#dr_clean_nod").val(),
			dr_c_time_nod:$("#dr_c_time_nod").val(),
			
			dr_version_kis:$("#dr_version_kis").val(),
			dr_cpu_kis:$("#dr_cpu_kis").val(),
			dr_memory_kis:$("#dr_memory_kis").val(),
			dr_scan_kis:$("#dr_scan_kis").val(),
			dr_clean_kis:$("#dr_clean_kis").val(),
			dr_c_time_kis:$("#dr_c_time_kis").val(),
			
			
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
	


}

function sendInterceptRate()
{
	$.ajax( {
			type : "post",
			url : "bavSummaryAjax.php",
			data:{
			ir_version_bav:$("#ir_version_bav").val(),
			ir_sample_bav:$("#ir_sample_bav").val(),
			ir_intercept_bav:$("#ir_intercept_bav").val(),
			
			ir_version_360:$("#ir_version_360").val(),
			ir_sample_360:$("#ir_sample_360").val(),
			ir_intercept_360:$("#ir_intercept_360").val(),
			
			
			type:5,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						window.location.reload();

				}
				});

}

function setKeyPoint()
{
	$.ajax( {
			type : "post",
			url : "bavSummaryAjax.php",
			data:{
			kp_country_bz:$("#kp_country_bz").val(),
			kp_mau_bz:$("#kp_mau_bz").val(),
			kp_organic_bz:$("#kp_organic_bz").val(),
			
			kp_country_id:$("#kp_country_id").val(),
			kp_mau_id:$("#kp_mau_id").val(),
			kp_organic_id:$("#kp_organic_id").val(),
			
				kp_country_tl:$("#kp_country_tl").val(),
			kp_mau_tl:$("#kp_mau_tl").val(),
			kp_organic_tl:$("#kp_organic_tl").val(),
			
				kp_country_sa:$("#kp_country_sa").val(),
			kp_mau_sa:$("#kp_mau_sa").val(),
			kp_organic_sa:$("#kp_organic_sa").val(),
			
				kp_country_uae:$("#kp_country_uae").val(),
			kp_mau_uae:$("#kp_mau_uae").val(),
			kp_organic_uae:$("#kp_organic_uae").val(),
			
			
			type:6,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");
						

				}
				});

}




