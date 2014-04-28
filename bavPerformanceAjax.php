<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//1 2 3 4 5 6  是文案  7是评测方法 8第三个表格数据  9 10 11 是第一个表格数据  12 13 14是第二个表格 15子引擎数据
 if($type==7)
{
	$performance=$_POST['performance'];
	
	$type='performanceMethod';

	 $test=BAV::setHtml($type,$performance);
	
}

else if($type==8)
{
	$p3_version_1 =$_POST['p3_version_1'];
	$p3_boot_1 =$_POST['p3_boot_1'];
	$p3_copy_1 =$_POST['p3_copy_1'];
	$p3_process_1 =$_POST['p3_process_1'];
	$p3_browser_1 =$_POST['p3_browser_1'];
	
	$p3_version_2 =$_POST['p3_version_2'];
	$p3_boot_2 =$_POST['p3_boot_2'];
	$p3_copy_2 =$_POST['p3_copy_2'];
	$p3_process_2 =$_POST['p3_process_2'];
	$p3_browser_2 =$_POST['p3_browser_2'];
	
	$p3_version_3 =$_POST['p3_version_3'];
	$p3_boot_3 =$_POST['p3_boot_3'];
	$p3_copy_3 =$_POST['p3_copy_3'];
	$p3_process_3 =$_POST['p3_process_3'];
	$p3_browser_3 =$_POST['p3_browser_3'];
	
	
	$test=BAV::setP3($p3_version_1,$p3_boot_1,$p3_copy_1,$p3_process_1 ,$p3_browser_1,
	$p3_version_2,$p3_boot_2,$p3_copy_2,$p3_process_2 ,$p3_browser_2,
	$p3_version_3,$p3_boot_3,$p3_copy_3,$p3_process_3 ,$p3_browser_3
	);
	
	

}
else if($type==9)
{
	$pf_version_1=$_POST['pf_version_1'];
	$pf_cpu_1=$_POST['pf_cpu_1'];
	$pf_memory_1=$_POST['pf_memory_1'];
	$pf_read_1=$_POST['pf_read_1'];
	$pf_write_1=$_POST['pf_write_1'];
	
	$test=BAV::setP1(1,$pf_version_1,$pf_cpu_1,$pf_memory_1,$pf_read_1,$pf_write_1);


}

else if($type==10)
{
	$pf_version_2=$_POST['pf_version_2'];
	$pf_cpu_2=$_POST['pf_cpu_2'];
	$pf_memory_2=$_POST['pf_memory_2'];
	$pf_read_2=$_POST['pf_read_2'];
	$pf_write_2=$_POST['pf_write_2'];
	
	$test=BAV::setP1(2,$pf_version_2,$pf_cpu_2,$pf_memory_2,$pf_read_2,$pf_write_2);

}

else if($type==11)
{
	$pf_version_3=$_POST['pf_version_3'];
	$pf_cpu_3=$_POST['pf_cpu_3'];
	$pf_memory_3=$_POST['pf_memory_3'];
	$pf_read_3=$_POST['pf_read_3'];
	$pf_write_3=$_POST['pf_write_3'];
	
	$test=BAV::setP1(3,$pf_version_3,$pf_cpu_3,$pf_memory_3,$pf_read_3,$pf_write_3);

}
else if($type==12)
{
	$p2_version_1=$_POST['p2_version_1'];
	$p2_white_1=$_POST['p2_white_1'];
	$p2_black_1=$_POST['p2_black_1'];
	$p2_scan_1=$_POST['p2_scan_1'];
	$p2_clean_1=$_POST['p2_clean_1'];
	
	$test=BAV::setP2(1,$p2_version_1,$p2_white_1,$p2_black_1,$p2_scan_1,$p2_clean_1);

}
else if($type==13)
{
	$p2_version_2=$_POST['p2_version_2'];
	$p2_white_2=$_POST['p2_white_2'];
	$p2_black_2=$_POST['p2_black_2'];
	$p2_scan_2=$_POST['p2_scan_2'];
	$p2_clean_2=$_POST['p2_clean_2'];
	
	$test=BAV::setP2(2,$p2_version_2,$p2_white_2,$p2_black_2,$p2_scan_2,$p2_clean_2);
}
else if($type==14)
{
	$p2_version_3=$_POST['p2_version_3'];
	$p2_white_3=$_POST['p2_white_3'];
	$p2_black_3=$_POST['p2_black_3'];
	$p2_scan_3=$_POST['p2_scan_3'];
	$p2_clean_3=$_POST['p2_clean_3'];
	
	$test=BAV::setP2(3,$p2_version_3,$p2_white_3,$p2_black_3,$p2_scan_3,$p2_clean_3);
}
else if($type==15)
{
	$p4_version=$_POST['p4_version'];
	$p4_cpu_1=$_POST['p4_cpu_1'];
	$p4_cpu_2=$_POST['p4_cpu_2'];
	$p4_cpu_3=$_POST['p4_cpu_3'];
	$p4_cpu_4=$_POST['p4_cpu_4'];
	$p4_cpu_5=$_POST['p4_cpu_5'];
	$p4_cpu_6=$_POST['p4_cpu_6'];
	$p4_cpu_7=$_POST['p4_cpu_7'];
	$p4_pss_1=$_POST['p4_pss_1'];
	$p4_pss_2=$_POST['p4_pss_2'];
	$p4_pss_3=$_POST['p4_pss_3'];
	$p4_pss_4=$_POST['p4_pss_4'];
	$p4_pss_5=$_POST['p4_pss_5'];
	$p4_pss_6=$_POST['p4_pss_6'];
	$p4_pss_7=$_POST['p4_pss_7'];
	
	$test=BAV::setEngine($p4_version,$p4_cpu_1,$p4_cpu_2,$p4_cpu_3,$p4_cpu_4,$p4_cpu_5,$p4_cpu_6,$p4_cpu_7,$p4_pss_1,$p4_pss_2,$p4_pss_3,$p4_pss_4,$p4_pss_5,$p4_pss_6,$p4_pss_7);

}
else
{
	//获得文案数据
	$performance=$_POST['performance'];
	
	$type='performance'.$type;

	 $test=BAV::setHtml($type,$performance);
}



?>