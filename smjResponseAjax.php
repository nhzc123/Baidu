<?php
/**
* edit by charles.nhzc  
*    at 2013-05-31
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];




		$response=$_POST['response'];
		
		if($type==1||$type==2)
		{
			$type="response".$type;
			$test=Smj::setHtml($type,$response);
		}
		else if($type==3)
		{
			$type="performanceMethod";
			$test=Smj::setHtml($type,$response);
		}
		
		if($type==4)
		{
			$simeji=$_POST['simeji'];
			$ATOK=$_POST['ATOK'];
			$google=$_POST['google'];
			
			$test=Smj::setResponse($simeji,$ATOK,$google);
		
		}
	
	
	




?>