<?php
require_once(dirname(__FILE__). '/include/appliction.php');

/* magic_quota_gpc */
$_GET = magic_gpc($_GET);
$_POST = magic_gpc($_POST);
$_COOKIE = magic_gpc($_COOKIE);



/* 时区 */
if(function_exists('date_default_timezone_set')) { 
	date_default_timezone_set('PRC'); 
}

/* not allow access app.php */
if($_SERVER['SCRIPT_FILENAME']==__FILE__){
	redirect('/');
}
/* end */

?>
