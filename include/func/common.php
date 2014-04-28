<?php


//导入函数
LoadFunction('configure');

function template($tFile) {
	global $INI;

	if ($INI['skin']['template']) {

		$checkfile = $INI['skin']['template'] . '/' . $tFile;

		if (file_exists(DIR_TEMPLATE . '/' . $checkfile . '.html')) {
			return __template($checkfile);
		}
	}

	return __template($tFile);
}


function render($tFile, $vs=array()) {
    ob_start();
    foreach($GLOBALS AS $_k=>$_v) {
        ${$_k} = $_v;
    }
	foreach($vs AS $_k=>$_v) {
		${$_k} = $_v;
	}
	include template($tFile);
    return ob_get_clean();
}

function error_handler($errno, $errstr, $errfile, $errline) {
	switch ($errno) {
		case E_PARSE :
		case E_ERROR :
			echo "<b>Fatal ERROR</b> [$errno] $errstr<br />\n";
			echo "Fatal error on line $errline in file $errfile";
			echo "PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			exit (1);
			break;
		default :
			break;
	}
	return true;
}
/* for obscureid */
function obscure_rep($u) {
	//if(!option_yes('encodeid')) return $u;
	if (preg_match('#/manage/#', $_SERVER['REQUEST_URI']))
		return $u;
	return preg_replace_callback('#(\?|&)id=(\d+)(\b)#i', obscure_cb, $u);
}
function obscure_did() {
	$gid = strval($_GET['id']);
	if ($gid && preg_match('/^ZT/', $gid)) {
		$id = base64_decode(substr($gid, 2)) >> 2;
		if ($id)
			$_GET['id'] = $id;
	}
}
function obscure_cb($m) {
	$eid = obscure_eid($m[2]);
	return "{$m[1]}id={$eid}{$m[3]}";
}
function obscure_eid($id) {
	if ($id > 100000000)
		return $id;
	return 'ZT' . base64_encode($id << 2);
}
obscure_did();
/* end */

/* for post trim */
function trimarray($o) {
	if (!is_array($o))
		return trim($o);
	foreach ($o AS $k => $v) {
		$o[$k] = trimarray($v);
	}
	return $o;
}
$_POST = trimarray($_POST);
/* end */

function redirect($url = null, $notice = null, $error = null) {
	$url = $url ? obscure_rep($url) : $_SERVER['HTTP_REFERER'];
	$url = $url ? $url : '/';
	if ($notice)
		Session :: Set('notice', $notice);
	if ($error)
		Session :: Set('error', $error);
	header("Location: {$url}");
	exit;
}

//对提交过来的数据进行魔术化处理
function magic_gpc($string) {
	if (SYS_MAGICGPC) {
		if (is_array($string)) {
			foreach ($string as $key => $val) {
				$string[$key] = magic_gpc($val);
			}
		} else {
			$string = stripslashes($string);
		}
	}
	return $string;
}

function ReadZip($zippath, $zipfilename) {
	$contents = null;
	$zip = zip_open($zippath);
	if ($zip) {
		$zip_entry = null;

		while ($zip_entry = zip_read($zip)) {
			if (zip_entry_name($zip_entry) == $zipfilename) {
				break;
			}
			$zip_entry = null;
		}

		if ($zip_entry) {
			
			if (zip_entry_open($zip, $zip_entry)) {
				 
				$temp = zip_entry_read($zip_entry,zip_entry_filesize($zip_entry));	
				if($temp){
					$contents= $temp;
				}	
				zip_entry_close($zip_entry);

			}
		}

		zip_close($zip);
	}

	return $contents;
}

?>
