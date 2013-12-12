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
    elseif (selectVerificationContact($_POST["id"],$_SESSION["user_id"])) {
    	printInfoContact($_POST["id"]);
    }
    else {
    	printMinimalInfoContact($_POST["id"]);
        if(selectStatut($_POST["id"],$_SESSION["user_id"]) != 0){
    	   echo "<p id=\"textAdd\" class='msg'>Cette personne ne fait parti de vos contacte. Ajouter la pour voir ses informations.</p>";
    	   echo "<input id=\"buttonAdd\" type='button' value='Ajouter' onclick=\"faireDemandeAmis(".$_POST["id"].")\" />";
        }else{
            echo "<p class='msg'>Demande de contact en cours</p>";
        }
    }
    echo "</div>";

?>