<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/html.php';
    require_once '../lib/sql.php';

    if(isset($_POST['couleur'])){
        setCouleur($_SESSION['user_id'],$_POST['couleur']);
    }
	if(isset($_POST['sauvegarder'])){
		if(idVille($_POST['ville'])!=false && idCampus($_POST['lieu'])!=false){
			modifInfo($_SESSION['user_id'],idVille($_POST['ville']),idCampus($_POST['lieu']),$_POST['mois'],$_POST['annee']);
			}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Votre Profil</title>
		<?php head() ?>
        <script type="text/javascript" src="../js/jscolor/jscolor.js"></script>
	</head>
    <body>
        <div id="titre">
            <h1>Votre Profil</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="param">
            <?php formModInfo($_SESSION["user_id"]); ?>
            <br />
        </div>
        <?php nav(); ?>
        <form id="colorpick" method="post">
            <?php echo "<input name='couleur' id='couleur' class='color' value='".getCouleur($_SESSION['user_id'])."'>"; ?><br /><input type="submit" id="subCol" value="Changer" />
        </form>
    </body>
</html>