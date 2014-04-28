<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/	


//获得summary页面的所有comment
	
	$datamodel=BAV::getComment("summary1");
	$summary1=$datamodel['comment'];
	
	$datamodel=BAV::getComment("summary2");
	$summary2=$datamodel['comment'];
	
	$datamodel=BAV::getComment("summary3");
	$summary3=$datamodel['comment'];
	
	$sm_time=$datamodel['time'];
	
	
//-----------------------------------------------------------


//获得检出率表格数据

	$datamodel=BAV::getDetectionRate();
	
	
	
	foreach($datamodel as $dm)
	{
		$dr_time=$dm['time'];
		
		if($dm['type']==1)
		{
			$dr_version_bav = $dm['version'];
			$dr_cpu_bav = $dm['cpu'];
			$dr_memory_bav = $dm['memory'];
			$dr_scan_bav =$dm['scan'];
			$dr_clean_bav =$dm['clean'];
			$dr_c_time_bav =$dm['c_time'];
			
			$dr_bav="[ ".$dr_cpu_bav.", ".$dr_memory_bav.", ".$dr_scan_bav.", ".$dr_clean_bav.", ".$dr_c_time_bav." ]";
		
		}
		
		else if($dm['type']==2)
		
		{
			$dr_version_nod = $dm['version'];
			$dr_cpu_nod = $dm['cpu'];
			$dr_memory_nod = $dm['memory'];
			$dr_scan_nod =$dm['scan'];
			$dr_clean_nod =$dm['clean'];
			$dr_c_time_nod =$dm['c_time'];
			
			$dr_nod="[ ".$dr_cpu_nod.", ".$dr_memory_nod.", ".$dr_scan_nod.", ".$dr_clean_nod.", ".$dr_c_time_nod." ]";
		
		
		}
		
		else 
		{
			$dr_version_kis = $dm['version'];
			$dr_cpu_kis = $dm['cpu'];
			$dr_memory_kis = $dm['memory'];
			$dr_scan_kis =$dm['scan'];
			$dr_clean_kis =$dm['clean'];
			$dr_c_time_kis =$dm['c_time'];
			
				$dr_kis="[ ".$dr_cpu_kis.", ".$dr_memory_kis.", ".$dr_scan_kis.", ".$dr_clean_kis.", ".$dr_c_time_kis." ]";
		
		}
	
	}




//------------------------------------------------------------




//获得拦截率表格数据

	$datamodel=BAV::getInterceptRate();
	
	foreach($datamodel as $dm)
	{
		$ir_time=$dm['time'];
		
		if($dm['type']==1)
		{
			$ir_version_bav=$dm['version'];
			$ir_sample_bav=$dm['sample'];
			$ir_intercept_bav=$dm['intercept'];
			$ir_rate_bav=round(($ir_intercept_bav/$ir_sample_bav)*100,2);
		
		}
		
		else if($dm['type']==2)
		
		{
			$ir_version_360=$dm['version'];
			$ir_sample_360=$dm['sample'];
			$ir_intercept_360=$dm['intercept'];
			$ir_rate_360=round(($ir_intercept_bav/$ir_sample_bav)*100,2);
		
		
		}
		
	
	
	}




//------------------------------------------------------------



//获得关键产品数据表格数据

	$datamodel=BAV::getKeyPoint();
	
	foreach($datamodel as $dm)
	{
		$kp_time=$dm['time'];
		
		if($dm['type']==1)
		{
			$kp_country_bz=$dm['country'];
			$kp_mau_bz=$dm['mau'];
			$kp_organic_bz=$dm['organic'];
		}
		
		else if($dm['type']==2)
		
		{
			$kp_country_id=$dm['country'];
			$kp_mau_id=$dm['mau'];
			$kp_organic_id=$dm['organic'];
		
		
		}
		else if($dm['type']==3)
		
		{
			$kp_country_tl=$dm['country'];
			$kp_mau_tl=$dm['mau'];
			$kp_organic_tl=$dm['organic'];
		
		
		}
		else if($dm['type']==4)
		
		{
			$kp_country_sa=$dm['country'];
			$kp_mau_sa=$dm['mau'];
			$kp_organic_sa=$dm['organic'];
		
		
		}
		else 
		
		{
			$kp_country_uae=$dm['country'];
			$kp_mau_uae=$dm['mau'];
			$kp_organic_uae=$dm['organic'];
		
		
		}
		
	
	
	}




//------------------------------------------------------------





?>