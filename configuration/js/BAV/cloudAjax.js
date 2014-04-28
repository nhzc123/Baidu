function sendHtml(num)
{
//cloud 1 2 3 

  var cloud;
  
  if(num==1)
	cloud=editor1.html();
  else if(num==2)
	cloud=editor2.html();
  else if(num==3)
	cloud=editor3.html();
else if(num==4)
	cloud=editor4.html();
	else if(num==5)
	cloud=editor5.html();
	
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "bavCloudAjax.php",
			data:{
			cloud:cloud,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function setClPerformance()
{


	
	

	

	$.ajax( {
			type : "post",
			url : "bavCloudAjax.php",
			data:{
			cl_version_ol:$("#cl_version_ol").val(),
			cl_cpu_ol:$("#cl_cpu_ol").val(),
			cl_memory_ol:$("#cl_memory_ol").val(),
			cl_response_ol:$("#cl_response_ol").val(),
			cl_capacity_ol:$("#cl_capacity_ol").val(),
			cl_detection_ol:$("#cl_detection_ol").val(),
			cl_overtime_ol:$("#cl_overtime_ol").val(),
			
			cl_version_new:$("#cl_version_new").val(),
			cl_cpu_new:$("#cl_cpu_new").val(),
			cl_memory_new:$("#cl_memory_new").val(),
			cl_response_new:$("#cl_response_new").val(),
			cl_capacity_new:$("#cl_capacity_new").val(),
			cl_detection_new:$("#cl_detection_new").val(),
			cl_overtime_new:$("#cl_overtime_new").val(),
			type:6,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});



}

function setClEffect()
{
	$.ajax( {
			type : "post",
			url : "bavCloudAjax.php",
			data:{
			clef_version_bavcl:$("#clef_version_bavcl").val(),
			clef_speed_bavcl:$("#clef_speed_bavcl").val(),
			clef_sample_bavcl:$("#clef_sample_bavcl").val(),
			clef_detection_bavcl:$("#clef_detection_bavcl").val(),
			clef_processed_bavcl:$("#clef_processed_bavcl").val(),
			
			clef_version_bavncl:$("#clef_version_bavncl").val(),
			clef_speed_bavncl:$("#clef_speed_bavncl").val(),
			clef_sample_bavncl:$("#clef_sample_bavncl").val(),
			clef_detection_bavncl:$("#clef_detection_bavncl").val(),
			clef_processed_bavncl:$("#clef_processed_bavncl").val(),
			
			clef_version_eng:$("#clef_version_eng").val(),
			clef_speed_eng:$("#clef_speed_eng").val(),
			clef_sample_eng:$("#clef_sample_eng").val(),
			clef_detection_eng:$("#clef_detection_eng").val(),
			clef_processed_eng:$("#clef_processed_eng").val(),
			
			clef_version_red:$("#clef_version_red").val(),
			clef_speed_red:$("#clef_speed_red").val(),
			clef_sample_red:$("#clef_sample_red").val(),
			clef_detection_red:$("#clef_detection_red").val(),
			clef_processed_red:$("#clef_processed_red").val(),
			
			clef_version_nod:$("#clef_version_nod").val(),
			clef_speed_nod:$("#clef_speed_nod").val(),
			clef_sample_nod:$("#clef_sample_nod").val(),
			clef_detection_nod:$("#clef_detection_nod").val(),
			clef_processed_nod:$("#clef_processed_nod").val(),
			
			type:7,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});


}