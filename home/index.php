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
		<title><?php echo selectNomPerso($_SESSION["user_id"]) ?></title>
		<?php head() ?>
	</head>
	<body>
		<div id="titre" >
			<h1>Accueil</h1>
			<span><a href="http://www.horizon-news.info/article.php?lirearticle=306">Voyager n'a jamais été aussi simple</a></span>
		</div>
		<div id="home">
			<div class="menu">
				<a href="../voyage">Voyages</a>
				<a href="../carnet">Contacts</a>
				<a href="../messages">Messagerie</a>
				<a href="../rechercher">Rechercher</a>
			</div>
			<?php phraseNotif(selectNbRequete($_SESSION["user_id"]),selectNbMsgNonLu($_SESSION["user_id"])); ?>
		</div>
		<?php nav(); ?>
		<?php boxuser(selectNomPerso($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
	</body>
</html>
