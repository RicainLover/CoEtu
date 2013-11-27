<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/html.php';
    require_once '../lib/sql.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vos Voyages</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='../js/inside.js' ></script>
	</head>
    <body>
        <div id="titre">
            <h1>Vos Voyages</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="cont"></div>
        <?php boxuser(getNom($_SESSION["user_id"]),array("test3"=>"test4")); ?>
        <?php nav(); ?>
    </body>
</html>