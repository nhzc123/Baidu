<?php
/**
* edit by charles.nhzc  
*    at 2013-05-28
*Email:charles.nhzc@gmail.com
**/	

	$datamodel=Smj::getResource();

	//获得最新时间
	$re_time=$datamodel['google']['time'];
	
	//获得google对象数据
	
	$re_google_version="\"".$datamodel['google']['version']."\"";
	$re_google_cpu=$datamodel['google']['cpu'];
	$re_google_pss=$datamodel['google']['pss'];
	
	
	//获得ATOK对象数据
	
	$re_ATOK_version="\"".$datamodel['ATOK']['version']."\"";
	$re_ATOK_cpu=$datamodel['ATOK']['cpu'];
	$re_ATOK_pss=$datamodel['ATOK']['pss'];
	
	
	//获得最新simeji对象数据

	$count=0;
	
	$labels="[\"";
	$cpu='[';
	$pss='[';
	
	
	foreach($datamodel['simeji'] as $dm)
	{
		$re_simeji_version="\"".$dm['version']."\"";
		$re_simeji_cpu=$dm['cpu'];
		$re_simeji_pss=$dm['pss'];
		
		
		if($count!=0)
		{
			$labels.="\","."\"";
			$cpu.=",";
			$pss.=",";
			
		}
		
		
			$labels.=$dm['version'];
			$cpu.=$dm['cpu'];
			$pss.=$dm['pss'];
			
			$count++;
		
	}
	
			$labels.="\""."]";
			$cpu.="]";
			$pss.="]";
			
	
	
	//获得simeji上面的所有文案
$datamodel=Smj::getComment();
	
	foreach($datamodel as $dm)
	{
		
		
		if($dm['type']=='resource0')
		{
			$resource0=$dm['comment'];
			
		
		}
		else  if($dm['type']=='resource1')
		{
			$resource1=$dm['comment'];
			
		
		}
		else if($dm['type']=='resource2')
		{
			$resource2=$dm['comment'];
			
		
		}
		
	
	}

	
	

?>