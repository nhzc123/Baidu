<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//1 2 3 4  是文案  5是评测方法 6是云性能
 if($type==5)
{
	$cloud=$_POST['cloud'];
	
	$type='cloudMethod';

	 $test=BAV::setHtml($type,$cloud);
	
}
else if($type==6)
{
	$cl_version_ol=$_POST['cl_version_ol'];
	$cl_cpu_ol=$_POST['cl_cpu_ol'];
	$cl_memory_ol=$_POST['cl_memory_ol'];
	$cl_response_ol=$_POST['cl_response_ol'];
	$cl_capacity_ol=$_POST['cl_capacity_ol'];
	$cl_detection_ol=$_POST['cl_detection_ol'];
	$cl_overtime_ol=$_POST['cl_overtime_ol'];
	
	$cl_version_new=$_POST['cl_version_new'];
	$cl_cpu_new=$_POST['cl_cpu_new'];
	$cl_memory_new=$_POST['cl_memory_new'];
	$cl_response_new=$_POST['cl_response_new'];
	$cl_capacity_new=$_POST['cl_capacity_new'];
	$cl_detection_new=$_POST['cl_detection_new'];
	$cl_overtime_new=$_POST['cl_overtime_new'];
	
	$test=BAV::setClPerformance($cl_version_ol,$cl_cpu_ol,$cl_memory_ol,$cl_response_ol,$cl_capacity_ol,$cl_detection_ol,$cl_overtime_ol,$cl_version_new,$cl_cpu_new,$cl_memory_new,$cl_response_new,$cl_capacity_new,$cl_detection_new,$cl_overtime_new);

}

else if($type==7)
{
	$clef_version_bavcl =$_POST['clef_version_bavcl'];
	$clef_speed_bavcl =$_POST['clef_speed_bavcl'];
	$clef_sample_bavcl =$_POST['clef_sample_bavcl'];
	$clef_detection_bavcl =$_POST['clef_detection_bavcl'];
	$clef_processed_bavcl =$_POST['clef_processed_bavcl'];
	
	$clef_version_bavncl =$_POST['clef_version_bavncl'];
	$clef_speed_bavncl =$_POST['clef_speed_bavncl'];
	$clef_sample_bavncl =$_POST['clef_sample_bavncl'];
	$clef_detection_bavncl =$_POST['clef_detection_bavncl'];
	$clef_processed_bavncl =$_POST['clef_processed_bavncl'];
	
	$clef_version_eng =$_POST['clef_version_eng'];
	$clef_speed_eng =$_POST['clef_speed_eng'];
	$clef_sample_eng =$_POST['clef_sample_eng'];
	$clef_detection_eng =$_POST['clef_detection_eng'];
	$clef_processed_eng =$_POST['clef_processed_eng'];
	
	$clef_version_red =$_POST['clef_version_red'];
	$clef_speed_red =$_POST['clef_speed_red'];
	$clef_sample_red =$_POST['clef_sample_red'];
	$clef_detection_red =$_POST['clef_detection_red'];
	$clef_processed_red =$_POST['clef_processed_red'];
	
	$clef_version_nod=$_POST['clef_version_nod'];
	$clef_speed_nod=$_POST['clef_speed_nod'];
	$clef_sample_nod=$_POST['clef_sample_nod'];
	$clef_detection_nod=$_POST['clef_detection_nod'];
	$clef_processed_nod=$_POST['clef_processed_nod'];
	
	$test=BAV::setClEffect($clef_version_bavcl,$clef_speed_bavcl,$clef_sample_bavcl,$clef_detection_bavcl,$clef_processed_bavcl,$clef_version_bavncl,$clef_speed_bavncl,$clef_sample_bavncl,$clef_detection_bavncl,$clef_processed_bavncl,$clef_version_eng,$clef_speed_eng,$clef_sample_eng,$clef_detection_eng,$clef_processed_eng,$clef_version_red,$clef_speed_red,$clef_sample_red,$clef_detection_red,$clef_processed_red,$clef_version_nod,$clef_speed_nod,$clef_sample_nod,$clef_detection_nod,$clef_processed_nod);
	


}

else
{
	//获得文案数据
	$cloud=$_POST['cloud'];
	
	$type='cloud'.$type;

	 $test=BAV::setHtml($type,$cloud);
}



?>