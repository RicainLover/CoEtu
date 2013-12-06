<?php

	require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../login.inc';
    require_once '../lib/sql.php';
    require_once '../lib/bibli.php';

    foreach (getOpenConversations($_SESSION["user_id"]) as $conver) {
    	$slect = "";
    	if ($conver["id"]==$_POST["selected"]) {
    		$slect = "class='selected'";
    	}
        print("<a href='#' " . $slect . " id='c".$conver["id"]."' onclick='openConversation(".$conver["id"].")'>".contractNom($conver["nom"],$conver["pre"])."</a>\n");
    }
?>