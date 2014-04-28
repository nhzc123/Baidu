function sendHtml(num)
{
//performance 1 2 3 

  var performance;
  
  if(num==1)
	performance=editor1.html();
  else if(num==2)
	performance=editor2.html();
  else if(num==3)
	performance=editor3.html();
else if(num==4)
	performance=editor4.html();
	else if(num==5)
	performance=editor5.html();
	else if(num==6)
	performance=editor6.html();
	else if(num==7)
	performance=editor7.html();
  
  
		
		
		
		$.ajax( {
			type : "post",
			url : "bavPerformanceAjax.php",
			data:{
			performance:performance,
			type:num,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}


function setP3()
{

	$.ajax( {
			type : "post",
			url : "bavPerformanceAjax.php",
			data:{
			p3_version_1:$("#p3_version_1").val(),
			p3_boot_1:$("#p3_boot_1").val(),
			p3_copy_1:$("#p3_copy_1").val(),
			p3_process_1:$("#p3_process_1").val(),
			p3_browser_1:$("#p3_browser_1").val(),
			
			p3_version_2:$("#p3_version_2").val(),
			p3_boot_2:$("#p3_boot_2").val(),
			p3_copy_2:$("#p3_copy_2").val(),
			p3_process_2:$("#p3_process_2").val(),
			p3_browser_2:$("#p3_browser_2").val(),
			
			p3_version_3:$("#p3_version_3").val(),
			p3_boot_3:$("#p3_boot_3").val(),
			p3_copy_3:$("#p3_copy_3").val(),
			p3_process_3:$("#p3_process_3").val(),
			p3_browser_3:$("#p3_browser_3").val(),
			type:8,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});

}

function setP1(num)
{
	//1为bav  2为nod  3为kis
	
	if(num==1)
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						pf_version_1:$("#pf_version_1").val(),
						pf_cpu_1:$("#pf_cpu_1").val(),
						pf_memory_1:$("#pf_memory_1").val(),
						pf_read_1:$("#pf_read_1").val(),
						pf_write_1:$("#pf_write_1").val(),
						type:9,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
				}
	else if(num==2)
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						pf_version_2:$("#pf_version_2").val(),
						pf_cpu_2:$("#pf_cpu_2").val(),
						pf_memory_2:$("#pf_memory_2").val(),
						pf_read_2:$("#pf_read_2").val(),
						pf_write_2:$("#pf_write_2").val(),
						type:10,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
	
	
	}
	
	else
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						pf_version_3:$("#pf_version_3").val(),
						pf_cpu_3:$("#pf_cpu_3").val(),
						pf_memory_3:$("#pf_memory_3").val(),
						pf_read_3:$("#pf_read_3").val(),
						pf_write_3:$("#pf_write_3").val(),
						type:11,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
	
	
	}


}


function setP2(num)
{
	//1为bav  2为nod  3为kis
	
	if(num==1)
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						p2_version_1:$("#p2_version_1").val(),
						p2_white_1:$("#p2_white_1").val(),
						p2_black_1:$("#p2_black_1").val(),
						p2_scan_1:$("#p2_scan_1").val(),
						p2_clean_1:$("#p2_clean_1").val(),
						type:12,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
				}
	else if(num==2)
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						p2_version_2:$("#p2_version_2").val(),
						p2_white_2:$("#p2_white_2").val(),
						p2_black_2:$("#p2_black_2").val(),
						p2_scan_2:$("#p2_scan_2").val(),
						p2_clean_2:$("#p2_clean_2").val(),
						type:13,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
	
	
	}
	
	else
	{
				$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						p2_version_3:$("#p2_version_3").val(),
						p2_white_3:$("#p2_white_3").val(),
						p2_black_3:$("#p2_black_3").val(),
						p2_scan_3:$("#p2_scan_3").val(),
						p2_clean_3:$("#p2_clean_3").val(),
						type:14,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});
	
	
	}


}

function setP4()
{
	if($("#p4_version").val()==""||$("#p4_cpu_1").val()==""||$("#p4_cpu_2").val()==""||$("#p4_cpu_3").val()==""||$("#p4_cpu_4").val()==""||$("#p4_cpu_5").val()==""||$("#p4_cpu_6").val()==""||$("#p4_cpu_7").val()==""||$("#p4_pss_1").val()==""||$("#p4_pss_2").val()==""||$("#p4_pss_3").val()==""||$("#p4_pss_4").val()==""||$("#p4_pss_5").val()==""||$("#p4_pss_6").val()==""||$("#p4_pss_7").val()=="")
	{
		alert("请填写完整");
		return;
	}
	
	$.ajax( {
						type : "post",
						url : "bavPerformanceAjax.php",
						data:{
						p4_version:$("#p4_version").val(),
						p4_cpu_1:$("#p4_cpu_1").val(),
						p4_cpu_2:$("#p4_cpu_2").val(),
						p4_cpu_3:$("#p4_cpu_3").val(),
						p4_cpu_4:$("#p4_cpu_4").val(),
						p4_cpu_5:$("#p4_cpu_5").val(),
						p4_cpu_6:$("#p4_cpu_6").val(),
						p4_cpu_7:$("#p4_cpu_7").val(),
						p4_pss_1:$("#p4_pss_1").val(),
						p4_pss_2:$("#p4_pss_2").val(),
						p4_pss_3:$("#p4_pss_3").val(),
						p4_pss_4:$("#p4_pss_4").val(),
						p4_pss_5:$("#p4_pss_5").val(),
						p4_pss_6:$("#p4_pss_6").val(),
						p4_pss_7:$("#p4_pss_7").val(),
						type:15,
						
						},
						timeout : 30000,
						success : function(data) {

									alert("保存成功");
									window.location.reload();

							}
							});


}
