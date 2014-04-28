function sendHtml(num)
{
//kill 1 2 3 

  var kill;
  
  if(num==1)
	kill=editor1.html();
  else if(num==2)
	kill=editor2.html();
  else if(num==3)
	kill=editor3.html();
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "bavKillAjax.php",
			data:{
			kill:kill,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function setKill()
{
	$.ajax( {
			type : "post",
			url : "bavKillAjax.php",
			data:{
			ki_version_1:$("#ki_version_1").val(),
			ki_kafan_1:$("#ki_kafan_1").val(),
			ki_infect_1:$("#ki_infect_1").val(),
			ki_doc_1:$("#ki_doc_1").val(),
			ki_scr_1:$("#ki_scr_1").val(),
			ki_pe_1:$("#ki_pe_1").val(),
			
			ki_version_2:$("#ki_version_2").val(),
			ki_kafan_2:$("#ki_kafan_2").val(),
			ki_infect_2:$("#ki_infect_2").val(),
			ki_doc_2:$("#ki_doc_2").val(),
			ki_scr_2:$("#ki_scr_2").val(),
			ki_pe_2:$("#ki_pe_2").val(),
			
			ki_version_3:$("#ki_version_3").val(),
			ki_kafan_3:$("#ki_kafan_3").val(),
			ki_infect_3:$("#ki_infect_3").val(),
			ki_doc_3:$("#ki_doc_3").val(),
			ki_scr_3:$("#ki_scr_3").val(),
			ki_pe_3:$("#ki_pe_3").val(),
			
			ki_version_4:$("#ki_version_4").val(),
			ki_kafan_4:$("#ki_kafan_4").val(),
			ki_infect_4:$("#ki_infect_4").val(),
			ki_doc_4:$("#ki_doc_4").val(),
			ki_scr_4:$("#ki_scr_4").val(),
			ki_pe_4:$("#ki_pe_4").val(),
			
			ki_version_5:$("#ki_version_5").val(),
			ki_kafan_5:$("#ki_kafan_5").val(),
			ki_infect_5:$("#ki_infect_5").val(),
			ki_doc_5:$("#ki_doc_5").val(),
			ki_scr_5:$("#ki_scr_5").val(),
			ki_pe_5:$("#ki_pe_5").val(),
			
			ki_version_6:$("#ki_version_6").val(),
			ki_kafan_6:$("#ki_kafan_6").val(),
			ki_infect_6:$("#ki_infect_6").val(),
			ki_doc_6:$("#ki_doc_6").val(),
			ki_scr_6:$("#ki_scr_6").val(),
			ki_pe_6:$("#ki_pe_6").val(),
			
			
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});

}
