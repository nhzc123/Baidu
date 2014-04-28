<?php
/**
* edit by charles.nhzc  
*    at 2013-05-29
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];








//获得用户评价
$us_simeji_point =$_POST['us_simeji_point'];
$us_google_point =$_POST['us_google_point'];
$us_ATOK_point =$_POST['us_ATOK_point'];
$us_simeji_num =$_POST['us_simeji_num'];
$us_google_num =$_POST['us_google_num'];
$us_ATOK_num =$_POST['us_ATOK_num'];

//1 2 3 4 5 是文案 6 是radar 7是关键产品指标  8是用户评分
 if($type==6)
{
	//获得雷达图数据
	$rd_simeji_package=$_POST['rd_simeji_package'];
	$rd_simeji_accuracy=$_POST['rd_simeji_accuracy'];
	$rd_simeji_response=$_POST['rd_simeji_response'];
	$rd_simeji_pss=$_POST['rd_simeji_pss'];
	$rd_simeji_cpu=$_POST['rd_simeji_cpu'];

	$rd_google_package=$_POST['rd_google_package'];
	$rd_google_accuracy=$_POST['rd_google_accuracy'];
	$rd_google_response=$_POST['rd_google_response'];
	$rd_google_pss=$_POST['rd_google_pss'];
	$rd_google_cpu=$_POST['rd_google_cpu'];

	$rd_ATOK_package=$_POST['rd_ATOK_package'];
	$rd_ATOK_accuracy=$_POST['rd_ATOK_accuracy'];
	$rd_ATOK_response=$_POST['rd_ATOK_response'];
	$rd_ATOK_pss=$_POST['rd_ATOK_pss'];
	$rd_ATOK_cpu=$_POST['rd_ATOK_cpu'];



	$test=Smj::setRadar($rd_simeji_package,$rd_simeji_accuracy,$rd_simeji_response,$rd_simeji_pss,$rd_simeji_cpu,$rd_google_package,$rd_google_accuracy,$rd_google_response,$rd_google_pss,$rd_google_cpu,$rd_ATOK_package,$rd_ATOK_accuracy,$rd_ATOK_response,$rd_ATOK_pss,$rd_ATOK_cpu);
}
else if($type==7)
{
	//获得关键产品指标
	$version=$_POST['version'];
	$mau=$_POST['mau'];
	$retention=$_POST['retention'];

	$test=Smj::setKeyPoint($version,$mau,$retention);


}
else if($type==8)
{
	
	//获得用户评价
	$us_simeji_point =$_POST['us_simeji_point'];
	$us_google_point =$_POST['us_google_point'];
	$us_ATOK_point =$_POST['us_ATOK_point'];
	$us_simeji_num =$_POST['us_simeji_num'];
	$us_google_num =$_POST['us_google_num'];
	$us_ATOK_num =$_POST['us_ATOK_num'];
	
	$test=Smj::setUserPoint($us_simeji_point,$us_google_point,$us_ATOK_point,$us_simeji_num,$us_google_num,$us_ATOK_num);

}
else
{
	//获得文案数据
	$summary=$_POST['summary'];
	
	$type='summary'.$type;

	 $test=Smj::setHtml($type,$summary);
}



?>