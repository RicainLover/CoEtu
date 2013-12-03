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
	$str = str_replace('\\','\\\\',$str);
	$str = str_replace('\'', '\\\'', $str);
	return $str;
}
?>