<?php

require_once 'sql/insert.php';
require_once 'sql/select.php';
require_once 'sql/update.php';
require_once 'sql/delete.php';

//fonction pour récuperer proprement une instance de PDO
function getPDO()
{
	try {
		$option = array (
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		$connec = new PDO("mysql:host=" . SERVER . ";dbname=" . BASE, LOGIN, PASSWORD, $option);
	} catch(Exception $e) {
		die($e->getMessage());
	}

	return $connec;
}

?>