<?php


    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }
    require_once "../login.inc";
    require_once '../lib/sql.php';

    $listRequete = getRequest($_SESSION["user_id"]);

    echo "<table id=\"notif\" >";
    foreach ($listRequete as $key => $value) {
    	echo "<tr id=\"r$value\">";
		echo "<td>";
		echo "<h6>Demande de contat</h6>";
		echo getNom($value)." veut etre votre amis";
		echo "</td>";
		echo "<td>";
		echo "<input type=\"button\" value=\"accepter\" onclick=\"acceptRequest($value)\" />";
		echo "<input type=\"button\" value=\"refuser\" onclick=\"deleteRequest($value)\" />";
		echo "</td>";
		echo "</tr>";
    }    
    echo "</table>";

?>
