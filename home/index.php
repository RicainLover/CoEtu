
<?php
	session_start();
	require '../login.inc';
	require_once '../lib/securiter.php';
	require_once '../lib/html.php';
	if(!isLogged()){
		header("Location: ..");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='../js/inside.js' ></script>
	</head>
	<body>
		<div id="titre" >
			<h1>Freetu</h1>
			<span>Voyager n'a jamais été aussi simple</span>
		</div>
		<div id="home">
			<div class="menu">
				<a href="../voyage">Mes voyages</a>
				<a href="../carnet">Mes contacts</a>
				<a href="../rechercher">Rechercher</a>
			</div>
		</div>
		<?php boxuser("test1","test2",array("test3"=>"test4")); ?>
		<?php nav(); ?>
	</body>
</html>