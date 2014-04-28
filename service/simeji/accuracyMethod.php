<?php
/**
* edit by charles.nhzc  
*    at 2013-05-30
*Email:charles.nhzc@gmail.com
**/	







//获得simeji上面的所有文案
$datamodel=Smj::getComment();
	
	foreach($datamodel as $dm)
	{
		
		
		if($dm['type']=='accuracyMethod')
		{
			$accuracyMethod=$dm['comment'];
			break;
		
		}
		
	
	}

?>