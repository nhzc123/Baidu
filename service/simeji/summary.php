<?php
/**
* edit by charles.nhzc  
*    at 2013-05-24
*Email:charles.nhzc@gmail.com
**/	


//获得产品关键指标
	$datamodel=Smj::getKeyPoint();
	
	$version=$datamodel['version'];
	
	$mau=$datamodel['mau'];
	
	$retention=$datamodel['retention'];
	
	$kp_time=$datamodel['time'];
	
	
//-------------------------------------------------




//获得用户评分总览
	$datamodel=Smj::getUserPoint();
	
	foreach($datamodel as $dm)
	{
		$us_time=$dm['time'];
		
		switch ($dm['version'])
		{
			case 'simeji':
			
				$us_simeji_num = $dm['num'];
				$us_simeji_point = $dm['point'];
				break;
				
			case 'google':
			
				$us_google_num = $dm['num'];
				$us_google_point = $dm['point'];
				break;
				
			case 'ATOK':
			
				$us_ATOK_num = $dm['num'];
				$us_ATOK_point = $dm['point'];
				break;
			
					
		}
	
	}

	

//-------------------------------------------------	




//获得雷达图
	$datamodel=Smj::getRadar();
	
	foreach($datamodel as $dm)
	{
		
		
		switch ($dm['version'])
		{
			case 'simeji':
			
				$rd_time=$dm['time'];
				$rd_simeji_accuracy=$dm['accuracy'];
				$rd_simeji_response=$dm['response'];
				$rd_simeji_cpu=$dm['cpu'];
				$rd_simeji_pss=$dm['pss'];
				$rd_simeji_package=$dm['package'];
				
				break;
				
			case 'google':
			
				$rd_google_accuracy=$dm['accuracy'];
				$rd_google_response=$dm['response'];
				$rd_google_cpu=$dm['cpu'];
				$rd_google_pss=$dm['pss'];
				$rd_google_package=$dm['package'];
				
				break;
				
			case 'ATOK':
			
				$rd_ATOK_accuracy=$dm['accuracy'];
				$rd_ATOK_response=$dm['response'];
				$rd_ATOK_cpu=$dm['cpu'];
				$rd_ATOK_pss=$dm['pss'];
				$rd_ATOK_package=$dm['package'];
				
				break;
			
					
		}
	
	}

	

//-------------------------------------------------	




//获得summary上面的所有文案
$datamodel=Smj::getComment();
	
	foreach($datamodel as $dm)
	{
		
		
		switch ($dm['type'])
		{
			case 'summary1':
			
				$summary1=$dm['comment'];
				
				break;
				
			case 'summary2':
			
				$summary2=$dm['comment'];
				break;
				
			case 'summary3':
			
				$summary3=$dm['comment'];
				break;
				
			case 'summary4':
			
				$summary4=$dm['comment'];
				break;
				
			case 'summary5':
			
				$summary5=$dm['comment'];
				break;
			
					
		}
	
	}

















//-------------------------------------------------


?>