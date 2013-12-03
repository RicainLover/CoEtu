<?php

    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

?>

coucou