<?php
    session_start();
    require_once '../lib/html.php';
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='inside.js' ></script>
	</head>
    <body>
        <div id="titre">
            <h1>Freetu</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="carnet"></div>
        <div id="perso"></div>
        <?php nav(); ?>
    </body>
</html>