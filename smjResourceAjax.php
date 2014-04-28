<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//0 1 2  是文案  3是增加新版本的simeji 4修改google  5修改ATOK  
 
	if($type==3)
	{
		//获得新的simeji数据
		$re_simeji_version =$_POST['re_simeji_version'];
		$re_simeji_cpu =$_POST['re_simeji_cpu'];
		$re_simeji_pss =$_POST['re_simeji_pss'];
		
		
		$test=Smj::setReSimeji($re_simeji_version,$re_simeji_cpu,$re_simeji_pss);
		
	
	}
	else if($type==4)
	{
		//修改google数据
		$re_google_version =$_POST['re_google_version'];
		$re_google_cpu =$_POST['re_google_cpu'];
		$re_google_pss =$_POST['re_google_pss'];
		
		
		$test=Smj::setReGoogle($re_google_version,$re_google_cpu,$re_google_pss);
	
	
	}
	else if($type==5)
	{
		//修改ATOK数据
		$re_ATOK_version =$_POST['re_ATOK_version'];
		$re_ATOK_cpu =$_POST['re_ATOK_cpu'];
		$re_ATOK_pss =$_POST['re_ATOK_pss'];
		
		
		$test=Smj::setReATOK($re_ATOK_version,$re_ATOK_cpu,$re_ATOK_pss);
	}
	
	else
	{
		//获得文案数据
		$resource=$_POST['resource'];
	
		$type='resource'.$type;

		$test=Smj::setHtml($type,$resource);
	
	
	}
	
	
	




?>