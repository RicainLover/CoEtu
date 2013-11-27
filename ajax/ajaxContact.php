<?php
require_once '../lib/securiter.php';
session_start();
if(!isLogged()){
    header("Location: ..");
}
require_once "../login.inc";
require_once '../lib/sql.php';
require_once '../lib/html.php';

if(isset($_POST["id_etu"]))
{
    printInfoContact($_POST["id_etu"]);
}
?>