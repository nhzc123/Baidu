<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/	


//获得kill页面的所有comment
	
	$datamodel=BAV::getComment("kill1");
	$kill1=$datamodel['comment'];
	
	$datamodel=BAV::getComment("kill2");
	$kill2=$datamodel['comment'];
	
	
	$ki_time=$datamodel['time'];
	
	
//-----------------------------------------------------------


//获得Kill页面的表格数据

	$datamodel=BAV::getKill();
	
	foreach($datamodel as $dm)
	{
		switch ($dm['type'])
		{	
			case 1:
			$ki_version_1=$dm['version'];
			$ki_kafan_1=$dm['kafan'];
			$ki_infect_1=$dm['infect'];
			$ki_doc_1=$dm['doc'];
			$ki_scr_1=$dm['scr'];
			$ki_pe_1=$dm['pe'];
			
			
			break;
			
			case 2:
			$ki_version_2=$dm['version'];
			$ki_kafan_2=$dm['kafan'];
			$ki_infect_2=$dm['infect'];
			$ki_doc_2=$dm['doc'];
			$ki_scr_2=$dm['scr'];
			$ki_pe_2=$dm['pe'];
			
			$ki_2="[ ".$ki_kafan_2." , ".$ki_infect_2." , ".$ki_doc_2." , ".$ki_scr_2." , ".$ki_pe_2." ] ";
			break;
			
			case 3:
			$ki_version_3=$dm['version'];
			$ki_kafan_3=$dm['kafan'];
			$ki_infect_3=$dm['infect'];
			$ki_doc_3=$dm['doc'];
			$ki_scr_3=$dm['scr'];
			$ki_pe_3=$dm['pe'];
			
			$ki_3="[ ".$ki_kafan_3." , ".$ki_infect_3." , ".$ki_doc_3." , ".$ki_scr_3." , ".$ki_pe_3." ] ";
			break;
			
			case 4:
			$ki_version_4=$dm['version'];
			$ki_kafan_4=$dm['kafan'];
			$ki_infect_4=$dm['infect'];
			$ki_doc_4=$dm['doc'];
			$ki_scr_4=$dm['scr'];
			$ki_pe_4=$dm['pe'];
			
			$ki_4="[ ".$ki_kafan_4." , ".$ki_infect_4." , ".$ki_doc_4." , ".$ki_scr_4." , ".$ki_pe_4." ] ";
			break;
			
			case 5:
			$ki_version_5=$dm['version'];
			$ki_kafan_5=$dm['kafan'];
			$ki_infect_5=$dm['infect'];
			$ki_doc_5=$dm['doc'];
			$ki_scr_5=$dm['scr'];
			$ki_pe_5=$dm['pe'];
			
			$ki_5="[ ".$ki_kafan_5." , ".$ki_infect_5." , ".$ki_doc_5." , ".$ki_scr_5." , ".$ki_pe_5." ] ";
			break;
			
			case 6:
			$ki_version_6=$dm['version'];
			$ki_kafan_6=$dm['kafan'];
			$ki_infect_6=$dm['infect'];
			$ki_doc_6=$dm['doc'];
			$ki_scr_6=$dm['scr'];
			$ki_pe_6=$dm['pe'];
			
			$ki_6="[ ".$ki_kafan_6." , ".$ki_infect_6." , ".$ki_doc_6." , ".$ki_scr_6." , ".$ki_pe_6." ] ";
			break;
			
			
		
		
		}
	
	
	}
?>