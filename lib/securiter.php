<?php
function isLogged() {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = secureinput($value);
	}
	foreach ($_GET as $key => $value) {
		$_GET[$key] = secureinput($value);
	}
    return isset($_SESSION["user_id"]);
}

function secureinput($str){
	$str = str_replace('\\','&#92;',$str);
	$str = str_replace('\'', '&apos;', $str);
	$str = str_replace('\"', '&quot;', $str);
	$str = str_replace('<', '&lt;', $str);
	$str = str_replace('>', '&#62;', $str);
	return $str;
}
?>