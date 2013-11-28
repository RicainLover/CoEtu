<?php
    session_start();
    require_once '../lib/html.php';
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/sql.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<?php head() ?>
	</head>
    <body>
        <div id="titre">
            <h1>Recherche</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="recherche">
            
        </div>
        <div id="perso"></div>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
        <?php nav(); ?>
    </body>
</html>