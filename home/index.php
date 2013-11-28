
<?php
	session_start();
	require '../login.inc';
	require_once '../lib/securiter.php';
	require_once '../lib/html.php';
	require_once '../lib/sql.php';
	if(!isLogged()){
		header("Location: ..");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Accueil</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/color.php' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='../js/inside.js' ></script>
	</head>
	<body>
		<div id="titre" >
			<h1>Accueil</h1>
			<span>Voyager n'a jamais été aussi simple</span>
		</div>
		<div id="home">
			<div class="menu">
				<a href="../voyage">Mes voyages</a>
				<a href="../carnet">Mes contacts</a>
				<a href="../rechercher">Rechercher</a>
			</div>
		</div>
		<?php nav(); ?>
		<?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
	</body>
</html>