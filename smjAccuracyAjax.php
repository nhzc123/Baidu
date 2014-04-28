<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//0 1 2  是文案  3是增加新版本的simeji 4修改google  5修改ATOK  6 accuracyMethod的文案
 
	if($type==3)
	{
		//获得新的simeji数据
		$ac_simeji_version =$_POST['ac_simeji_version'];
		$ac_simeji_top1 =$_POST['ac_simeji_top1'];
		$ac_simeji_top6 =$_POST['ac_simeji_top6'];
		$ac_simeji_top12 =$_POST['ac_simeji_top12'];
		
		$test=Smj::setSimeji($ac_simeji_version,$ac_simeji_top1,$ac_simeji_top6,$ac_simeji_top12);
		
	
	}
	else if($type==4)
	{
		//修改google数据
		$ac_google_version =$_POST['ac_google_version'];
		$ac_google_top1 =$_POST['ac_google_top1'];
		$ac_google_top6 =$_POST['ac_google_top6'];
		$ac_google_top12 =$_POST['ac_google_top12'];
		
		$test=Smj::setGoogle($ac_google_version,$ac_google_top1,$ac_google_top6,$ac_google_top12);
	
	
	}
	else if($type==5)
	{
		//修改ATOK数据
		$ac_ATOK_version =$_POST['ac_ATOK_version'];
		$ac_ATOK_top1 =$_POST['ac_ATOK_top1'];
		$ac_ATOK_top6 =$_POST['ac_ATOK_top6'];
		$ac_ATOK_top12 =$_POST['ac_ATOK_top12'];
		
		$test=Smj::setATOK($ac_ATOK_version,$ac_ATOK_top1,$ac_ATOK_top6,$ac_ATOK_top12);
	
	}
	else if($type==6)
	{
		$accuracyMethod=$_POST['accuracy'];
		
		$test=Smj::setHtml('accuracyMethod',$accuracyMethod);
	}
	
	else
	{
		//获得文案数据
		$accuracy=$_POST['accuracy'];
	
		$type='accuracy'.$type;

		$test=Smj::setHtml($type,$accuracy);
	
	
	}
	
	
	




?>