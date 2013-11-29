<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../lib/html.php';
    require_once '../login.inc';
    require_once '../lib/sql.php';
    require_once '../lib/bibli.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vos Contacts</title>
        <?php head() ?>
	</head>
    <body onload="getContacts()">
        <div id="titre">
            <h1>Vos Contacts</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="carnet">
            <div id="contact">
                <br />
                <br />
                <br />
                <br />
                <span class="label">Selectionner un contact pour l'afficher.</span>
            </div>
            <div id="liste">

            </div>
        </div>
        <?php nav(); ?>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]) ?>
    </body>
</html>