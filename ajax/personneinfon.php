<?php

    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../lib/html.php';

    echo "<div class='infoautreperso' >";
    printInfoContact($_POST["id"]);
    echo "<input type='button' value='Ajouter' />";
    echo "</div>"

?>