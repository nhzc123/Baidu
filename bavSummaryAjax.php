<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//1 2 3  是文案  4检出率  5是拦截率  6关键产品指标
 if($type==4)
{
	$dr_version_bav=$_POST['dr_version_bav'];
	$dr_cpu_bav=$_POST['dr_cpu_bav'];
	$dr_memory_bav=$_POST['dr_memory_bav'];
	$dr_scan_bav=$_POST['dr_scan_bav'];
	$dr_clean_bav=$_POST['dr_clean_bav'];
	$dr_c_time_bav=$_POST['dr_c_time_bav'];
	
	$dr_version_nod=$_POST['dr_version_nod'];
	$dr_cpu_nod=$_POST['dr_cpu_nod'];
	$dr_memory_nod=$_POST['dr_memory_nod'];
	$dr_scan_nod=$_POST['dr_scan_nod'];
	$dr_clean_nod=$_POST['dr_clean_nod'];
	$dr_c_time_nod=$_POST['dr_c_time_nod'];
	
	$dr_version_kis=$_POST['dr_version_kis'];
	$dr_cpu_kis=$_POST['dr_cpu_kis'];
	$dr_memory_kis=$_POST['dr_memory_kis'];
	$dr_scan_kis=$_POST['dr_scan_kis'];
	$dr_clean_kis=$_POST['dr_clean_kis'];
	$dr_c_time_kis=$_POST['dr_c_time_kis'];
	
	$test=BAV::setDetectionRate($dr_version_bav,$dr_cpu_bav,$dr_memory_bav,$dr_scan_bav,$dr_clean_bav,$dr_c_time_bav,$dr_version_nod,$dr_cpu_nod,$dr_memory_nod,$dr_scan_nod,$dr_clean_nod,$dr_c_time_nod,$dr_version_kis,$dr_cpu_kis,$dr_memory_kis,$dr_scan_kis,$dr_clean_kis,$dr_c_time_kis);
	
}
else if($type==5)
{
	$ir_version_bav =$_POST['ir_version_bav'];
	$ir_sample_bav =$_POST['ir_sample_bav'];
	$ir_intercept_bav =$_POST['ir_intercept_bav'];
	
	$ir_version_360 =$_POST['ir_version_360'];
	$ir_sample_360 =$_POST['ir_sample_360'];
	$ir_intercept_360 =$_POST['ir_intercept_360'];
	
	$test=BAV::setInterceptRate($ir_version_bav,$ir_sample_bav,$ir_intercept_bav,$ir_version_360 ,$ir_sample_360,$ir_intercept_360);


}
else if($type==6)
{
	$kp_country_bz = $_POST['kp_country_bz'];
	$kp_mau_bz = $_POST['kp_mau_bz'];
	$kp_organic_bz = $_POST['kp_organic_bz'];
	
	$kp_country_id = $_POST['kp_country_id'];
	$kp_mau_id = $_POST['kp_mau_id'];
	$kp_organic_id = $_POST['kp_organic_id'];
	
	$kp_country_tl = $_POST['kp_country_tl'];
	$kp_mau_tl = $_POST['kp_mau_tl'];
	$kp_organic_tl = $_POST['kp_organic_tl'];
	
	$kp_country_sa = $_POST['kp_country_sa'];
	$kp_mau_sa = $_POST['kp_mau_sa'];
	$kp_organic_sa = $_POST['kp_organic_sa'];
	
	$kp_country_uae = $_POST['kp_country_uae'];
	$kp_mau_uae = $_POST['kp_mau_uae'];
	$kp_organic_uae = $_POST['kp_organic_uae'];
	
	$test=BAV::setKeyPoint($kp_country_bz,$kp_mau_bz,$kp_organic_bz,$kp_country_id,$kp_mau_id,$kp_organic_id,$kp_country_tl,$kp_mau_tl,$kp_organic_tl,$kp_country_sa,$kp_mau_sa,$kp_organic_sa,$kp_country_uae,$kp_mau_uae,$kp_organic_uae);
	

}
else
{
	//获得文案数据
	$summary=$_POST['summary'];
	
	$type='summary'.$type;

	 $test=BAV::setHtml($type,$summary);
}



?>