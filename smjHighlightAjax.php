<?php
/**
* edit by charles.nhzc  
*    at 2013-05-31
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');

$type=$_POST['type'];



		if($type==6)
		{
			$highlight=$_POST['highlight'];
			
			$test=Smj::setHtml('highlight',$highlight);
		}
		else
		{
			$ATOK_version=$_POST['ATOK_version'];
			$ATOK_skin=$_POST['ATOK_skin'];
			$ATOK_cell=$_POST['ATOK_cell'];
			$ATOK_cloud=$_POST['ATOK_cloud'];
			$ATOK_font=$_POST['ATOK_font'];
			
			$google_version=$_POST['google_version'];
			$google_skin=$_POST['google_skin'];
			$google_cell=$_POST['google_cell'];
			$google_cloud=$_POST['google_cloud'];
			$google_font=$_POST['google_font'];
			
			$simeji_version=$_POST['simeji_version'];
			$simeji_skin=$_POST['simeji_skin'];
			$simeji_cell=$_POST['simeji_cell'];
			$simeji_cloud=$_POST['simeji_cloud'];
			$simeji_font=$_POST['simeji_font'];
			
			
			
			$test=Smj::setHighlight($ATOK_version,$ATOK_skin,$ATOK_cell,$ATOK_cloud,$ATOK_font,$google_version,$google_skin,$google_cell,$google_cloud,$google_font,$simeji_version,$simeji_skin,$simeji_cell,$simeji_cloud,$simeji_font);
		
		
		}
	
	




?>