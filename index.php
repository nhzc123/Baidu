<?php
/**
* edit by charles.nhzc  
*    at 2013-05-20
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$name=$_GET["name"];
$childPage=$_GET["childPage"];

if($name!="")
{
	if($childPage=="")
	{
		include template($name.'/index');
	}
	else
	{
		//分发数据请求到不同的php内进行处理 获得数据
		include  'service/'.$name.'/'.$childPage.'.php';
		
		//跳转到不同的页面中
		include template($name.'/'.$childPage);
	}

}
else
{
	include template('mainPage');
}

?>