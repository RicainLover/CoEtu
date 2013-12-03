<?php

    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../lib/html.php';
    require_once '../lib/sql.php';

    echo "<div class='infoautreperso' >";
    if ($_POST["id"]==$_SESSION["user_id"]) {
    	echo "C'est vous.";
    }
    elseif (verifContactSQL($_POST["id"],$_SESSION["user_id"])) {
    	printInfoContact($_POST["id"]);
    }
    else {
    	printMinimalInfoContact($_POST["id"]);
    	echo "<p class='msg'>Cette personne ne fait parti de vos contacte. Ajouter la pour voir ses informations.</p>";
    	echo "<input type='button' value='Ajouter' />";
    }
    echo "</div>";

?>