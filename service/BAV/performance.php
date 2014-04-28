<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/	


//获得performance页面的所有comment
	
	$datamodel=BAV::getComment("performance1");
	$performance1=$datamodel['comment'];
	
	$datamodel=BAV::getComment("performance2");
	$performance2=$datamodel['comment'];
	
	$datamodel=BAV::getComment("performance3");
	$performance3=$datamodel['comment'];
	
	$datamodel=BAV::getComment("performance4");
	$performance4=$datamodel['comment'];
	
	$datamodel=BAV::getComment("performance5");
	$performance5=$datamodel['comment'];
	
	$datamodel=BAV::getComment("performance6");
	$performance6=$datamodel['comment'];
	
	$pe_time=$datamodel['time'];
	
	
	
//-----------------------------------------------------------

//获得performance第三个表格的数据

	$datamodel=BAV::getP3();
	
	foreach($datamodel as $dm)
	{
		switch ($dm['type'])
		{
			case 1:
			$p3_version_1=$dm['version'];
			$p3_boot_1=$dm['boot'];
			$p3_copy_1=$dm['copy'];
			$p3_process_1=$dm['process'];
			$p3_browser_1=$dm['browser'];
			break;
			
			case 2:
			$p3_version_2=$dm['version'];
			$p3_boot_2=$dm['boot'];
			$p3_copy_2=$dm['copy'];
			$p3_process_2=$dm['process'];
			$p3_browser_2=$dm['browser'];
			break;
			
			case 3:
			$p3_version_3=$dm['version'];
			$p3_boot_3=$dm['boot'];
			$p3_copy_3=$dm['copy'];
			$p3_process_3=$dm['process'];
			$p3_browser_3=$dm['browser'];
			break;
			
			
		
		}
	
	
	}
//-----------------------------------------------------------
	
	
//获得performance第一个表格的数据

	
	
$datamodel=BAV::getP1(1);
	
	$pf_1="";
	
	$count=0;
	
	foreach($datamodel as $bav)
{	
	$pf_1.="<tr>"."<td>".$bav['version']."</td>"
			."<td>".$bav['cpu']."</td>"
			."<td>".$bav['memory']."</td>"
			."<td>".$bav['read']."</td>"
			."<td>".$bav['write']."</td>"
			."</tr>";
		
	switch ($count)
	{	
		case 0:
		$pf_version_1_1=$bav['version'];
		$pf_cpu_1_1=$bav['cpu'];
		$pf_memory_1_1=$bav['memory'];
		break;
		case 1:
		$pf_version_1_2=$bav['version'];
		$pf_cpu_1_2=$bav['cpu'];
		$pf_memory_1_2=$bav['memory'];
		break;
		case 2:
		$pf_version_1_3=$bav['version'];
		$pf_cpu_1_3=$bav['cpu'];
		$pf_memory_1_3=$bav['memory'];
		break;
		case 3:
		$pf_version_1_4=$bav['version'];
		$pf_cpu_1_4=$bav['cpu'];
		$pf_memory_1_4=$bav['memory'];
		break;
		
				
	
	}
	
	$count++;
	
	

}	

$datamodel=BAV::getP1(2);
	
	
	
	foreach($datamodel as $nod)
{	
	$pf_version_2 =$nod['version'];
	$pf_cpu_2 =$nod['cpu'];
	$pf_memory_2 =$nod['memory'];
	$pf_read_2 =$nod['read'];
	$pf_write_2 =$nod['write'];
	
	

}	

$datamodel=BAV::getP1(3);
	
	
	foreach($datamodel as $kis)
{	
	$pf_version_3 =$kis['version'];
	$pf_cpu_3 =$kis['cpu'];
	$pf_memory_3 =$kis['memory'];
	$pf_read_3 =$kis['read'];
	$pf_write_3 =$kis['write'];

}	

	
$labels1="[ \"".$pf_version_1_1." \", \"".$pf_version_1_2." \", \"".$pf_version_1_3." \", \"".$pf_version_1_4." \", \"".$pf_version_2."\" , \"".$pf_version_3." \"] ";
	
	

	
//-----------------------------------------------------------





//获得performance第二个表格的数据

	
	
$datamodel=BAV::getP2(1);
	
	$p2_1="";
	
	$count=0;
	
	foreach($datamodel as $bav)
{	
	$p2_1.="<tr>"."<td>".$bav['version']."</td>"
			."<td>".$bav['white']."</td>"
			."<td>".$bav['black']."</td>"
			."<td>".$bav['scan']."</td>"
			."<td>".$bav['clean']."</td>"
			."</tr>";
		
	switch ($count)
	{	
		case 0:
		$p2_version_1_1=$bav['version'];
		$p2_white_1_1=$bav['white'];
		$p2_black_1_1=$bav['black'];
		$p2_scan_1_1=$bav['scan'];
		$p2_clean_1_1=$bav['clean'];
		break;
		case 1:
		$p2_version_1_2=$bav['version'];
		$p2_white_1_2=$bav['white'];
		$p2_black_1_2=$bav['black'];
		$p2_scan_1_2=$bav['scan'];
		$p2_clean_1_2=$bav['clean'];
		break;
		case 2:
		$p2_version_1_3=$bav['version'];
		$p2_white_1_3=$bav['white'];
		$p2_black_1_3=$bav['black'];
		$p2_scan_1_3=$bav['scan'];
		$p2_clean_1_3=$bav['clean'];
		break;
		case 3:
		$p2_version_1_4=$bav['version'];
		$p2_white_1_4=$bav['white'];
		$p2_black_1_4=$bav['black'];
		$p2_scan_1_4=$bav['scan'];
		$p2_clean_1_4=$bav['clean'];
		break;
		
				
	
	}
	
	$count++;
	
	

}	

$datamodel=BAV::getP2(2);
	
	
	
	foreach($datamodel as $nod)
{	
	$p2_version_2 =$nod['version'];
	$p2_white_2 =$nod['white'];
	$p2_black_2 =$nod['black'];
	$p2_scan_2 =$nod['scan'];
	$p2_clean_2 =$nod['clean'];
	
	

}	

$datamodel=BAV::getP2(3);
	
	
	foreach($datamodel as $kis)
{	
	$p2_version_3 =$kis['version'];
	$p2_white_3 =$kis['white'];
	$p2_black_3 =$kis['black'];
	$p2_scan_3 =$kis['scan'];
	$p2_clean_3 =$kis['clean'];

}	

	
$labels2="[ \"".$p2_version_1_1." \", \"".$p2_version_1_2." \", \"".$p2_version_1_3." \", \"".$p2_version_1_4." \", \"".$p2_version_2."\" , \"".$p2_version_3." \"] ";
	
	

	
//-----------------------------------------------------------


//获得performance子引擎的数据

	
	
	$datamodel=BAV::getEngine(1);
	
	$cpu_bavas="[ ";
	$count=0;
	$pss_bavas="[ ";
	$labels3="[ \"";
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavas.=$dm['cpu'];
			$pss_bavas.=$dm['pss'];
			$labels3.=$dm['version'];
		}
		else
		{
			$cpu_bavas.=" , ".$dm['cpu'];
			$pss_bavas.=" , ".$dm['pss'];
			$labels3.="\" , \"".$dm['version'];
		}
		$count++;
	
	}
	$cpu_bavas.=" ] ";
	
	$pss_bavas.=" ] ";
	$labels3.=" \" ]";
	
	
	
	$datamodel=BAV::getEngine(2);
	
	$cpu_bavsk="[ ";
	$count=0;
	$pss_bavsk="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavsk.=$dm['cpu'];
			$pss_bavsk.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavsk.=" , ".$dm['cpu'];
			$pss_bavsk.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavsk.=" ] ";
	
	$pss_bavsk.=" ] ";
	
	
	
	
	$datamodel=BAV::getEngine(3);
	
	$cpu_bavds="[ ";
	$count=0;
	$pss_bavds="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavds.=$dm['cpu'];
			$pss_bavds.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavds.=" , ".$dm['cpu'];
			$pss_bavds.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavds.=" ] ";
	
	$pss_bavds.=" ] ";
	
	
	
	
	
	
	
	$datamodel=BAV::getEngine(4);
	
	$cpu_bavss="[ ";
	$count=0;
	$pss_bavss="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavss.=$dm['cpu'];
			$pss_bavss.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavss.=" , ".$dm['cpu'];
			$pss_bavss.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavss.=" ] ";
	
	$pss_bavss.=" ] ";
	

	
	
	
	
	$datamodel=BAV::getEngine(5);
	
	$cpu_bavcs="[ ";
	$count=0;
	$pss_bavcs="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavcs.=$dm['cpu'];
			$pss_bavcs.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavcs.=" , ".$dm['cpu'];
			$pss_bavcs.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavcs.=" ] ";
	
	$pss_bavcs.=" ] ";
	
	
	
	
	
	$datamodel=BAV::getEngine(6);
	
	$cpu_bavvt="[ ";
	$count=0;
	$pss_bavvt="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavvt.=$dm['cpu'];
			$pss_bavvt.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavvt.=" , ".$dm['cpu'];
			$pss_bavvt.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavvt.=" ] ";
	
	$pss_bavvt.=" ] ";
	
	
	
	
	
	$datamodel=BAV::getEngine(7);
	
	$cpu_bavbh="[ ";
	$count=0;
	$pss_bavbh="[ ";
	
	
	foreach($datamodel as $dm)
	{
		if($count==0)
		{
			$cpu_bavbh.=$dm['cpu'];
			$pss_bavbh.=$dm['pss'];
		
		}
		else
		{
			$cpu_bavbh.=" , ".$dm['cpu'];
			$pss_bavbh.=" , ".$dm['pss'];
		
		}
		$count++;
	
	}
	$cpu_bavbh.=" ] ";
	
	$pss_bavbh.=" ] ";
	
//-----------------------------------------------------------



?>