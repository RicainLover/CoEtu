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
	echo "<h2>" . getNom($_POST["id_etu"]) . "</h2>";
    printInfoContact($_POST["id_etu"]);
    print "<div class=\"option\">";
    print "<a href=\"#\" onclick='supprContact(\"";
    print($_POST["id_etu"]);
    print "\")'>oublier</a></div>";
}
?>