<?php
require_once '../lib/securiter.php';
session_start();
if(!isLogged()){
    header("Location: ..");
}
require_once "../login.inc";
require_once '../lib/sql.php';

updateStatutRequete($_POST["id_contact"], $_SESSION["user_id"], 1);
?>