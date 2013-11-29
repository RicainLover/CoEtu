<?php
    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }
    require_once "../login.inc";
    require_once '../lib/sql.php';
    require_once '../lib/html.php';
    $contact = getContactsSQL($_SESSION["user_id"]);
    foreach($contact as $key => $value)
    {
        print("<a href=\"#\" id=\"c".$value[0]."\" onclick=\"getInfoContact(".$value[0].")\">".contractNom($value[1], $value[2])."</a>\n");
    }