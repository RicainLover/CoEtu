<?php

	require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../login.inc';
    require_once '../lib/sql.php';

    if (!isset($_POST["id"]) || !isset($_POST["msg"])) {
    	exit();
    }

    if (verifContactSQL($_POST["id"],$_SESSION["user_id"]) ) {
    	addMsg($_SESSION["user_id"],$_POST["id"],$_POST["msg"]);
    }

?>