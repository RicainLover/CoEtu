<?php

	require_once("../login.inc");

	try {
		$option = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$db = new PDO("mysql:host=" . SERVER . ";dbname=" . BASE, LOGIN, PASSWORD, $option);
		$sql = file_get_contents('../projetbdd.sql');
		$qr = $db->exec($sql);
	} catch(Exception $e) {
		die($e->getMessage());
	}
	echo "Import OK";

?>