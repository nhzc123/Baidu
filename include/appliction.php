<?php

/*
 * chenhongwei@baidu.com
 * */

error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

define('SYS_TIMESTART', microtime(true));
define('SYS_REQUEST', isset ($_SERVER['REQUEST_URI']));

define('DIR_ROOT', str_replace('\\', '/', dirname(__FILE__))); //当前文件路径
define('DIR_LIBARAY', DIR_ROOT . '/lib'); //库文件
define('DIR_FUNCTION', DIR_ROOT . '/func'); //函数目录
define('DIR_CLASSES', DIR_ROOT . '/classes'); //类目录
define('DIR_CONFIGURE', DIR_ROOT . '/configure'); //配置文件目录

define('WWW_ROOT', rtrim(dirname(DIR_ROOT), '/')); //网站根目录

define('STATIC_ROOT', WWW_ROOT . '/static'); //静态目录
define('DIR_COMPILED', WWW_ROOT . '/static/compiled'); //编译文件目录
define('DIR_TEMPLATE', WWW_ROOT . '/static/template'); //模版目录

define('SYS_MAGICGPC', get_magic_quotes_gpc()); //当前系统的魔术变量设置方式

/* encoding */
mb_internal_encoding('UTF-8');
/* end */

/* ob_handler */
if (SYS_REQUEST) {
	ob_get_clean();
	ob_start();
}
/* end ob */

/* 自动加载对象 */
function __autoload($class_name) {
	$file_name = trim(str_replace('_', '/', $class_name), '/') . '.class.php';
	$file_path = DIR_LIBARAY . '/' . $file_name;
	if (file_exists($file_path)) {
		return require_once ($file_path);
	}
	$file_path = DIR_CLASSES . '/' . $file_name;
	if (file_exists($file_path)) {
		return require_once ($file_path);
	}
	return false;
}

/*导入函数*/
function LoadFunction($funcpre) {
	$file_path = DIR_FUNCTION . '/' . $funcpre . '.php';
	if (file_exists($file_path)) {
		require_once ($file_path);
	}
}

//导入函数
LoadFunction('template');
LoadFunction('common');

$INI = configure_load(); //加载配置
Session :: Init(); //初始化会话

?>
