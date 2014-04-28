// JavaScript Document

//产品线空间选择菜单
function showSelMenu()
{
   var listmenudiv=$("<div class='listmenu'></div>");
   listmenudiv.load("/ajax/namespacelist.ajax.php",function(){
	
   var leftx=($("body").width()-1000)/2;
   
   listmenudiv.css("left",leftx);
   
   listmenudiv.mouseleave(function(){
    listmenudiv.remove();
	});
   
   
    listmenudiv.appendTo($("body"));
	
   });
}


//用户中心菜单
function showIuserMenu()
{
   var listmenudiv=$("<div class='listmenu'></div>");
   listmenudiv.load("/ajax/iusermenu.ajax.php",function(){
	
   var leftx=($("body").width()-1000)/2+1000-50;
   
   listmenudiv.css("left",leftx);
   
   listmenudiv.mouseleave(function(){
    listmenudiv.remove();
	});
   
   
    listmenudiv.appendTo($("body"));
	
   });
}

/*显示页面*/
function ShowPage(pageurl,width,height)
{
	if($("#mask")!=null)
	{
		$("#mask").remove();
	}
	
    if($("#pagedlg")!=null)
	{
		$("#pagedlg").remove();
	}
	
	var floatcover=$('<div id="mask"></div>');
	var dlg=$('<div id="pagedlg"></div>');
	var remoteload=$('<div class="remoteloading"></div>');
	
	remoteload.css("margin-top",(height-40)/2);
	remoteload.css("width",width);
	
	dlg.load(pageurl,function(){
	
	$(".closebtn").css("margin-left",width-30);
	
	$(".closebtn").click(function(){
	floatcover.remove();
	dlg.remove();
	});
			
   });
	
	dlg.css("width",width);
	dlg.css("height",height);
	
	dlg.css("top",(window.innerHeight-height)/2);
	
	var dlg_left=($("body").width()-width)/2;
	
	if(dlg_left<0)
	{
	  dlg_left=0;
	}
	
	dlg.css("left",dlg_left);
	dlg.append(remoteload);
	
	floatcover.appendTo("body");
	dlg.appendTo("body");
}

function showLogin()
{
  ShowPage('/ajax/userreg.ajax.php?act=login',500,200);
}

function showReg()
{
  ShowPage('/ajax/userreg.ajax.php?act=reg',500,300);
}

function ShowSprintAdd()
{
	if(parseInt($('#sel_projectid').val())<1)
	{
		alert('请先选择所属的产品!');
		return;
	}
	
	ShowPage('/ajax/sprintadd.ajax.php?cid='+$('#sel_projectid').val(),500,200);
	
	return;
}

//重置添加表单
function reset_addform()
{
   $("#dataaddform").resetForm();
}

//提交sprint信息添加页面
function submit_sprintinfoform()
{
	
	if(!confirm('确定要更新数据吗,此操作不可恢复?'))
	{
		return;
	}
	
	var opt={error:function(){
	alert('数据提交错误，可能是远程服务器不可用,请联系系统管理员!');	
	},
	success:function(msg){
	if(msg=='success')
	{
		alert('系统已经对新数据进行更新!');
    }
	else
	{
	    alert(msg);
	}

	}
	};
	
	$("#sprintinfo").ajaxSubmit(opt);
	
}

//提交添加表单
function submit_addform()
{
	
  if(parseInt($('#sel_sprintid').val())<1)
	{
		alert('请选择所在的Sprint!');
		$('#sel_sprintid').focus();
		return;
	}
	
   var pattern = /[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}/;
   var flag = false;
   var i=0;
   
    for(i=0;i<1;++i)
   {
   if($('.txt_input').eq(i).val().length<2)
   {
	   alert('输入的内容不完整,请重新输入!');
	   $('.txt_input').eq(i).focus();
	   return;
   }
   }
   
   for(i=0;i<4;++i)
   {
	   if(!pattern.test($('.date_input').eq(i).val()))
	   {
	      alert('输入的日期格式不正确,请重新输入!');
		  $('.date_input').eq(i).focus();
		  return;
	   }
   }
   
   pattern = /^\d+(\.\d+){0,}$/;
   if(!pattern.test($('.txt_float').eq(0).val()))
	{
	      alert('请输入正确格式的数字!');
		  $('.txt_float').eq(0).focus();
		  return;
	}
	
	pattern = /^\d+$/;
	if(!pattern.test($('.txt_int').eq(0).val()))
	{
	      alert('请输入正确格式的数字!');
		  $('.txt_int').eq(0).focus();
		  return;
	}
	
   
	
	var opt={error:function(){
	alert('数据提交错误，可能是远程服务器不可用,请联系系统管理员!');	
	},
	success:function(msg){
	if(msg=='update')
	{
		alert('指定的测试任务数据已经存在,但系统已经对新数据进行更新!');
		reset_addform();
    }
	else if(msg=='add')
	{
		alert('恭喜数据录入成功,你可以到报表页面查看!');
		reset_addform();
    }
	else
	{
	    alert(msg);
	}

	}
	};
	
	$("#dataaddform").ajaxSubmit(opt);
}

//sprint添加
function PostSprintAdd()
{
   
   if($('#sprint').val().length<1)
   {
	   alert('内容不能为空!');
	   return;
   }
   
   var pattern = /sprint[0-9]+/;
   var flag = pattern.test($('#sprint').val());
   if(!flag)
   {
	   alert('填写的内容格式不符合要求!');
	   return;
   }
   
   var opt={error:function(){
	alert('数据提交错误，可能是远程服务器不可用,请联系系统管理员!');	
	},
	success:function(msg){
	alert(msg);
	$('#sel_sprintid').load("/ajax/sprintlist.ajax.php?npid="+$('#sel_projectid').val());
	$(".closebtn").click();
	}
	};
	
	$("#sprintadd_form").ajaxSubmit(opt);
}

//提交登陆
function PostLogin()
{
	var username=$("#reg_email").val();
	var pass=$("#reg_pass").val();
	
	var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-]\.)*baidu(\.[a-zA-Z0-9_-])+/;
	var flag = pattern.test(username);
	
	if(!flag)
	{
		$("#reg_msgshow").html("登录邮箱格式错误!");
		return;
	}
	
	if(pass.length<6||pass.length>16)
	{
		$("#reg_msgshow").html("密码长度6-16!");
		return;
	}
	
		$.ajax({
    type: "POST",
    url: "/UserAction.php",
	cache: false,
	global:false,
    data: "email="+username+"&pass="+pass+"&act=loginuser",
	beforeSend:function(xmlrequest)
	{
		$("#reg_msgshow").html("数据提交中.....");
	},
    success: function(msg,textStatus)
	{
	 if(msg=="success")
	 {
		 var timeouts=1000;
		 $("#reg_msgshow").html("<font color='green'>登陆成功，即将返回......</font>");
		 setTimeout(function(){
		 window.location.href="/index.php";
		},timeouts);
	 }
	 else
	 {
       $("#reg_msgshow").html(msg);
	 }
    },
	error:function(msg,textStatus)
	{
	   $("#reg_msgshow").html("数据请求错误,请联系管理员！");
	},
	async:true,
	dataType:"html"
   });
}

//提交注册
function PostReg()
{
	var username=$("#reg_email").val();
	var pass=$("#reg_pass").val();
	var pass1=$("#reg_pass1").val();
	var realname=$("#reg_real").val();
	
	var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-]\.)*baidu(\.[a-zA-Z0-9_-])+/;
	var flag = pattern.test(username);
	
	if(!flag)
	{
		$("#reg_msgshow").html("登录邮箱格式错误!");
		return;
	}
	
	if(pass!=pass1)
	{
		$("#reg_msgshow").html("两次密码输入不一致!");
		return;
	}
	
	if(pass.length<6||pass.length>16)
	{
		$("#reg_msgshow").html("密码长度6-16!");
		return;
	}
	
	if(realname.length<2)
	{
		$("#reg_msgshow").html("姓名长度必须大于2!");
		return;
	}
	
	$.ajax({
    type: "POST",
    url: "/UserAction.php",
	cache: false,
	global:false,
    data: "email="+username+"&pass="+pass+"&realname="+realname+"&act=reguser",
	beforeSend:function(xmlrequest)
	{
		$("#reg_msgshow").html("数据提交中.....");
	},
    success: function(msg,textStatus)
	{
	 if(msg=="success")
	 {
		 $("#reg_msgshow").html("<font color='green'>用户账号注册成功,稍后请验证注册邮件，验证通过后可以直接登陆系统了!</font>");
		 
		 $("#reg_email").val('');
	     $("#reg_pass").val('');
	     $("#reg_pass1").val('');
	     $("#reg_real").val('');
		 
	 }
	 else
	 {
       $("#reg_msgshow").html(msg);
	 }
    },
	error:function(msg,textStatus)
	{
	   $("#reg_msgshow").html("数据请求错误,请联系管理员！");
	},
	async:true,
	dataType:"html"
   });

}


$(document).ready(function(){

$(".menu li a").mouseenter(function(){
$(this).attr("class","menubg_cur");
});

$(".menu li a").mouseleave(function(){
$(this).attr("class","menubg");
});

$("#link_namespace").click(function(){
showSelMenu();
});

var leftx=($("body").width()-1000)/2+1000;
$(".i_user").css("left",leftx);

$(".i_user").mouseenter(function(){
$(".i_user").css("background-position","left -19px");
});

$(".i_user").mouseleave(function(){
$(".i_user").css("background-position","left 0px");
});

$(".i_user").click(function(){
showIuserMenu();
});

});