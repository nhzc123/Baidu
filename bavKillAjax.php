<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//1 2   是文案  3是评测方法 4是kill表格数据
 if($type==3)
{
	$kill=$_POST['kill'];
	
	$type='killMethod';

	 $test=BAV::setHtml($type,$kill);
	
}
else if($type==4)
{
	$ki_version_1=$_POST['ki_version_1'];
	$ki_kafan_1=$_POST['ki_kafan_1'];
	$ki_infect_1=$_POST['ki_infect_1'];
	$ki_doc_1=$_POST['ki_doc_1'];
	$ki_scr_1=$_POST['ki_scr_1'];
	$ki_pe_1=$_POST['ki_pe_1'];
	
	$ki_version_2=$_POST['ki_version_2'];
	$ki_kafan_2=$_POST['ki_kafan_2'];
	$ki_infect_2=$_POST['ki_infect_2'];
	$ki_doc_2=$_POST['ki_doc_2'];
	$ki_scr_2=$_POST['ki_scr_2'];
	$ki_pe_2=$_POST['ki_pe_2'];
	
	$ki_version_3=$_POST['ki_version_3'];
	$ki_kafan_3=$_POST['ki_kafan_3'];
	$ki_infect_3=$_POST['ki_infect_3'];
	$ki_doc_3=$_POST['ki_doc_3'];
	$ki_scr_3=$_POST['ki_scr_3'];
	$ki_pe_3=$_POST['ki_pe_3'];
	
	$ki_version_4=$_POST['ki_version_4'];
	$ki_kafan_4=$_POST['ki_kafan_4'];
	$ki_infect_4=$_POST['ki_infect_4'];
	$ki_doc_4=$_POST['ki_doc_4'];
	$ki_scr_4=$_POST['ki_scr_4'];
	$ki_pe_4=$_POST['ki_pe_4'];
	
	$ki_version_5=$_POST['ki_version_5'];
	$ki_kafan_5=$_POST['ki_kafan_5'];
	$ki_infect_5=$_POST['ki_infect_5'];
	$ki_doc_5=$_POST['ki_doc_5'];
	$ki_scr_5=$_POST['ki_scr_5'];
	$ki_pe_5=$_POST['ki_pe_5'];
	
	$ki_version_6=$_POST['ki_version_6'];
	$ki_kafan_6=$_POST['ki_kafan_6'];
	$ki_infect_6=$_POST['ki_infect_6'];
	$ki_doc_6=$_POST['ki_doc_6'];
	$ki_scr_6=$_POST['ki_scr_6'];
	$ki_pe_6=$_POST['ki_pe_6'];
	
	


	

	$test=BAV::setKill($ki_version_1,$ki_kafan_1,$ki_infect_1,$ki_doc_1,$ki_scr_1,$ki_pe_1,
	$ki_version_2,$ki_kafan_2,$ki_infect_2,$ki_doc_2,$ki_scr_2,$ki_pe_2,
	$ki_version_3,$ki_kafan_3,$ki_infect_3,$ki_doc_3,$ki_scr_3,$ki_pe_3,
	$ki_version_4,$ki_kafan_4,$ki_infect_4,$ki_doc_4,$ki_scr_4,$ki_pe_4,
	$ki_version_5,$ki_kafan_5,$ki_infect_5,$ki_doc_5,$ki_scr_5,$ki_pe_5,
	$ki_version_6,$ki_kafan_6,$ki_infect_6,$ki_doc_6,$ki_scr_6,$ki_pe_6
	);
}

else
{
	//获得文案数据
	$kill=$_POST['kill'];
	
	$type='kill'.$type;

	 $test=BAV::setHtml($type,$kill);
}



?>