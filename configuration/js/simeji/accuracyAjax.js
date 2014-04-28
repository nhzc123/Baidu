function sendHtml(num)
{
//accuracy 0 1 2 

  var accuracy;
  
  if(num==0)
	accuracy=editor.html();
  else if(num==1)
	accuracy=editor1.html();
  else if(num==2)
	accuracy=editor2.html();
  else if(num==6)
    accuracy=editor6.html();
  
		
		
		
		$.ajax( {
			type : "post",
			url : "smjAccuracyAjax.php",
			data:{
			accuracy:accuracy,
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
	if($("#ac_simeji_version").val()==""||$("#ac_simeji_top1").val()==""||$("#ac_simeji_top6").val()==""||$("#ac_simeji_top12").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjAccuracyAjax.php",
			data:{
			ac_simeji_version:$("#ac_simeji_version").val(),
			ac_simeji_top1:$("#ac_simeji_top1").val(),
			ac_simeji_top6:$("#ac_simeji_top6").val(),
			ac_simeji_top12:$("#ac_simeji_top12").val(),
			type:3,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}


function sendGoogle()
{
	if($("#ac_google_version").val()==""||$("#ac_google_top1").val()==""||$("#ac_google_top6").val()==""||$("#ac_google_top12").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjAccuracyAjax.php",
			data:{
			ac_google_version:$("#ac_google_version").val(),
			ac_google_top1:$("#ac_google_top1").val(),
			ac_google_top6:$("#ac_google_top6").val(),
			ac_google_top12:$("#ac_google_top12").val(),
			type:4,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}

function sendATOK()
{
	if($("#ac_ATOK_version").val()==""||$("#ac_ATOK_top1").val()==""||$("#ac_ATOK_top6").val()==""||$("#ac_ATOK_top12").val()=="")
	{
		alert("请补充完整");
		return ;
	}
		
		
		$.ajax( {
			type : "post",
			url : "smjAccuracyAjax.php",
			data:{
			ac_ATOK_version:$("#ac_ATOK_version").val(),
			ac_ATOK_top1:$("#ac_ATOK_top1").val(),
			ac_ATOK_top6:$("#ac_ATOK_top6").val(),
			ac_ATOK_top12:$("#ac_ATOK_top12").val(),
			type:5,
			
			},
			timeout : 30000,
			success : function(data) {

						alert("保存成功");

				}
				});
}