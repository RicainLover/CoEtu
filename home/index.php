<?php
	session_start();
	require_once '../lib/securiter.php';
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
		<script type='text/javascript' src='inside.js' ></script>
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
		<div id="perso">
			<h2>Jean Mercadier</h2>
			<span class="label">Univ:</span>
			<span class="carac">IUT-BM</span>
			<span class="label">Habite:</span>
			<span class="carac">Lille</span>
			<span class="label">Tél:</span>
			<span class="carac">06 06 40 92 84</span>
			<span class="label">Email:</span>
			<span class="carac">jeanmercadier@gmail.com</span>
			<span class="label">Skype:</span>
			<span class="carac">jean.mercadier</span>
			<span class="label">Facebook:</span>
			<span class="carac">http://facebook.com/jean.mercadier</span>
			<span class="label">Né:</span>
			<span class="carac">Juil. 1993</span>
			<div class="option">
				<a href="#">modifier infos</a>
				<a href="#">déconnexion</a>
			</div>
		</div>
		<div id="nav">
			<a href="../voyage">Mes voyages</a>
			<a href="../carnet">Mes contacts</a>
			<a href="../rechercher">Rechercher</a>
			<a href="#">Requetes</a>
		</div>
	</body>
</html>