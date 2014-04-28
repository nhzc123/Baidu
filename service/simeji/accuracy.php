<?php
/**
* edit by charles.nhzc  
*    at 2013-05-24
*Email:charles.nhzc@gmail.com
**/	


//精度对比图

	$datamodel=Smj::getAccuracy();



	//获得最新时间
	$ac_time=$datamodel['google']['time'];
	
	//获得google对象数据
	
	$ac_google_version=$datamodel['google']['version'];
	$ac_google_top1=$datamodel['google']['top1'];
	$ac_google_top6=$datamodel['google']['top6'];
	$ac_google_top12=$datamodel['google']['top12'];
	
	//获得ATOK对象数据
	
	$ac_ATOK_version=$datamodel['ATOK']['version'];
	$ac_ATOK_top1=$datamodel['ATOK']['top1'];
	$ac_ATOK_top6=$datamodel['ATOK']['top6'];
	$ac_ATOK_top12=$datamodel['ATOK']['top12'];
	
	//获得最新simeji对象数据

	$count=0;
	
	$labels="[\"";
	$top1='[';
	$top6='[';
	$top12='[';
	
	foreach($datamodel['simeji'] as $dm)
	{
		$ac_simeji_version=$dm['version'];
		$ac_simeji_top1=$dm['top1'];
		$ac_simeji_top6=$dm['top6'];
		$ac_simeji_top12=$dm['top12'];
		
		if($count!=0)
		{
			$labels.="\","."\"";
			$top1.=",";
			$top6.=",";
			$top12.=",";
		}
		
		
			$labels.=$dm['version'];
			$top1.=$dm['top1'];
			$top6.=$dm['top6'];
			$top12.=$dm['top12'];
			$count++;
		
	}
	
			$labels.="\""."]";
			$top1.="]";
			$top6.="]";
			$top12.="]";
	
	
	
	
	
	
	

//-------------------------------------------------	




//获得summary上面的所有文案
$datamodel=Smj::getComment();
	
	foreach($datamodel as $dm)
	{
		
		
		switch ($dm['type'])
		{
			case 'accuracy0':
			
				$accuracy0=$dm['comment'];
				
				break;
				
			case 'accuracy1':
			
				$accuracy1=$dm['comment'];
				break;
				
			case 'accuracy2':
			
				$accuracy2=$dm['comment'];
				break;
				
			
			
					
		}
	
	}

?>