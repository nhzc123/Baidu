<?php
/**
* edit by charles.nhzc  
*    at 2013-05-31
*Email:charles.nhzc@gmail.com
**/
require_once (dirname(__FILE__) . '/app.php');




		$point5=$_POST['point5'];
		$point4=$_POST['point4'];
		$point3=$_POST['point3'];
		$point2=$_POST['point2'];
		$point1=$_POST['point1'];

		
		
		$test=Smj::setFeedbackPoint($point5,$point4,$point3,$point2,$point1);
	
	
	




?>