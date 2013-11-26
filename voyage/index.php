<?php
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: /");
    }
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
        <div id=titre>
            <h1>Freetu</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="cont"></div>
        <div id="perso"></div>
        <div id="nav">
            <a href="voyage.php">Mes voyages</a>
            <a href="carnet.php">Mes contacts</a>
            <a href="search.php">Rechercher</a>
            <a href="#">Requetes</a>
        </div>
    </body>
</html>