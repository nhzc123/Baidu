<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/	


//获得intercept页面的所有comment
	
	$datamodel=BAV::getComment("intercept1");
	$intercept1=$datamodel['comment'];
	
	$datamodel=BAV::getComment("intercept2");
	$intercept2=$datamodel['comment'];
	
	
	$in_time=$datamodel['time'];
	
	
//-----------------------------------------------------------


//获得intercept表格数据


	$datamodel=BAV::getIntercept();
	
	foreach($datamodel as $dm)
	{
	
		if($dm['type']==1)
		{
			$in_version_bav =$dm['version'];
			$in_sample_bav =$dm['sample'];
			$in_intercept_bav =$dm['intercept'];
			$in_only360_bav =$dm['only360'];
			$in_onlybav_bav =$dm['onlybav'];
			$in_rate_bav =round(($in_intercept_bav/$in_sample_bav)*100,2);
		
		}
		
		else
		{
			$in_version_360 =$dm['version'];
			$in_sample_360 =$dm['sample'];
			$in_intercept_360 =$dm['intercept'];
			$in_only360_360 =$dm['only360'];
			$in_onlybav_360 =$dm['onlybav'];
			$in_rate_360 =round(($in_intercept_360/$in_sample_360)*100,2);
		
		
		}
		
		$in_time=$dm['time'];
	
	
	}

?>