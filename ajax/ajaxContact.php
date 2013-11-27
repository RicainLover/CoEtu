<?php
require_once '../lib/securiter.php';
session_start();
if(!isLogged()){
    header("Location: ..");
}
require_once "../login.inc";
require_once '../lib/sql.php';
if(isset($_POST["id_etu"]))
{
	$info = infoetu($_POST["id_etu"]);
	print("<span class='label'>Nom:</span><span class='carac'>".$info[0][0]."</span>");
	print("<span class='label'>Prénom:</span><span class='carac'>".$info[0][1]."</span>");
	print("<span class='label'>Ville:</span><span class='carac'>".$info[0][2]."</span>");
	print("<span class='label'>Université:</span><span class='carac'>".$info[0][3]."</span>");
	for($i=4 ; $i < sizeof($info[0])/2 ; $i+=2){
		print("<span class='label'>".$info[0][$i].":</span><span class='carac'>".$info[0][$i+1]."</span>");
	}
}
?>