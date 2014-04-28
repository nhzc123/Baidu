<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



//1 2   是文案  3是评测方法  4是表格数据
 if($type==3)
{
	$intercept=$_POST['intercept'];
	
	$type='interceptMethod';

	 $test=BAV::setHtml($type,$intercept);
	
}
else if($type==4)
{
	
	$in_version_bav=$_POST['in_version_bav'];
	$in_sample_bav=$_POST['in_sample_bav'];
	$in_intercept_bav=$_POST['in_intercept_bav'];
	$in_only360_bav=$_POST['in_only360_bav'];
	$in_onlybav_bav=$_POST['in_onlybav_bav'];
	
	$in_version_360=$_POST['in_version_360'];
	$in_sample_360=$_POST['in_sample_360'];
	$in_intercept_360=$_POST['in_intercept_360'];
	$in_only360_360=$_POST['in_only360_360'];
	$in_onlybav_360=$_POST['in_onlybav_360'];
	
	$test=BAV::setIntercept($in_version_bav,$in_sample_bav,$in_intercept_bav,$in_only360_bav,$in_onlybav_bav,$in_version_360,$in_sample_360,$in_intercept_360,$in_only360_360,$in_onlybav_360);

}

else
{
	//获得文案数据
	$intercept=$_POST['intercept'];
	
	$type='intercept'.$type;

	 $test=BAV::setHtml($type,$intercept);
}



?>