<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/	


//获得cloud页面的所有comment
	
	$datamodel=BAV::getComment("cloud1");
	$cloud1=$datamodel['comment'];
	
	$datamodel=BAV::getComment("cloud2");
	$cloud2=$datamodel['comment'];
	
	$datamodel=BAV::getComment("cloud3");
	$cloud3=$datamodel['comment'];
	
	$datamodel=BAV::getComment("cloud4");
	$cloud4=$datamodel['comment'];
	

	
	
//-----------------------------------------------------------


//获得云性能所有数据


	$datamodel=BAV::getClPerformance();
	
	foreach($datamodel as $dm)
	{
		if($dm['type']==1)
		{
			$cl_version_ol=$dm['version'];
			$cl_cpu_ol=$dm['cpu'];
			$cl_memory_ol=$dm['memory'];
			$cl_response_ol=$dm['response'];
			$cl_capacity_ol=$dm['capacity'];
			$cl_detection_ol=$dm['detection'];
			$cl_overtime_ol=$dm['overtime'];
		
		
		}
		else
		{
			$cl_version_new=$dm['version'];
			$cl_cpu_new=$dm['cpu'];
			$cl_memory_new=$dm['memory'];
			$cl_response_new=$dm['response'];
			$cl_capacity_new=$dm['capacity'];
			$cl_detection_new=$dm['detection'];
			$cl_overtime_new=$dm['overtime'];
		
		
		}
		$cl_time=$dm['time'];
	
	}
//-----------------------------------------------------------


//获得云效果所有数据


	$datamodel=BAV::getClEffect();
	
	foreach($datamodel as $dm)
	{
		if($dm['type']==1)
		{
			$clef_version_bavcl =$dm['version'];
			$clef_speed_bavcl =$dm['speed'];
			$clef_sample_bavcl =$dm['sample'];
			$clef_detection_bavcl =$dm['detection'];
			$clef_processed_bavcl =$dm['processed'];
			$clef_rate_bavcl =round(($clef_detection_bavcl/$clef_sample_bavcl)*100,2);
			
		
		
		}
		else if($dm['type']==2)
		{
			$clef_version_bavncl =$dm['version'];
			$clef_speed_bavncl =$dm['speed'];
			$clef_sample_bavncl =$dm['sample'];
			$clef_detection_bavncl =$dm['detection'];
			$clef_processed_bavncl =$dm['processed'];
			$clef_rate_bavncl =round(($clef_detection_bavncl/$clef_sample_bavncl)*100,2);
		
		
		}
		else if($dm['type']==3)
		{
			$clef_version_eng =$dm['version'];
			$clef_speed_eng =$dm['speed'];
			$clef_sample_eng =$dm['sample'];
			$clef_detection_eng =$dm['detection'];
			$clef_processed_eng =$dm['processed'];
			$clef_rate_eng =round(($clef_detection_eng/$clef_sample_eng)*100,2);
		
		
		}
		else if($dm['type']==4)
		{
			$clef_version_red =$dm['version'];
			$clef_speed_red =$dm['speed'];
			$clef_sample_red =$dm['sample'];
			$clef_detection_red =$dm['detection'];
			$clef_processed_red =$dm['processed'];
			$clef_rate_red =round(($clef_detection_red/$clef_sample_red )*100,2);
		
		
		}
		else if($dm['type']==5)
		{
			$clef_version_nod =$dm['version'];
			$clef_speed_nod =$dm['speed'];
			$clef_sample_nod =$dm['sample'];
			$clef_detection_nod =$dm['detection'];
			$clef_processed_nod =$dm['processed'];
			$clef_rate_nod=round(($clef_detection_nod/$clef_sample_nod )*100,2);
		
		
		}
		
		$clef_time=$dm['time'];
	
	}
//-----------------------------------------------------------












?>