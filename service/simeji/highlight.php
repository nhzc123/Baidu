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
		
		
		if($dm['type']=='highlight')
		{
			$highlight=$dm['comment'];
			break;
		
		}
		
	
	}
	
//获得highlight表格数据

$datamodel=Smj::getHighlight();

	foreach($datamodel as $dm)
	{
		
		
		if($dm['type']=='1')
		{
			
			
			$simeji_version=$dm['version'];
			$simeji_skin=$dm['skin'];
			$simeji_cell=$dm['cell'];
			$simeji_cloud=$dm['cloud'];
			$simeji_font=$dm['font'];
			
		
		}
		else if($dm['type']=='2')
		{
			$ATOK_version=$dm['version'];
			$ATOK_skin=$dm['skin'];
			$ATOK_cell=$dm['cell'];
			$ATOK_cloud=$dm['cloud'];
			$ATOK_font=$dm['font'];
			
		
		
		}
		else
		{
			$google_version=$dm['version'];
			$google_skin=$dm['skin'];
			$google_cell=$dm['cell'];
			$google_cloud=$dm['cloud'];
			$google_font=$dm['font'];
		}
		
	
	}



?>