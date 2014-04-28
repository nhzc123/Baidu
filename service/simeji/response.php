<?php
/**
* edit by charles.nhzc  
*    at 2013-05-31
*Email:charles.nhzc@gmail.com
**/	







//获得simeji上面的所有文案
$datamodel=Smj::getComment();
	
	foreach($datamodel as $dm)
	{
		
		
		if($dm['type']=='response1')
		{
			$response1=$dm['comment'];
			
		
		}
		else if($dm['type']=='response2')
		{
			$response2=$dm['comment'];
			
		
		}
		else if($dm['type']=='performanceMethod')
		{
			$performanceMethod=$dm['comment'];
			
		
		}
	
		
	
	}
	
$datamodel=Smj::getResponse();
$ATOK=$datamodel['atok'];
$simeji=$datamodel['simeji'];
$google=$datamodel['google'];





?>