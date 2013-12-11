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
		<title><?php echo getNom($_SESSION["user_id"]) ?> - Voyages</title>
		<?php head() ?>
	</head>
    <body>
        <div id="titre">
            <h1>Voyages</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="voyages">
            <input class="newvoy" onclick="getNewVoyageForm()" value="Nouveau" type="button" title="Créer un nouveau voyage." />
            <h4>Mes voyages</h4>
            <?php
                foreach (getAllVoyages($_SESSION["user_id"]) as $voy) { 
                    printVoyage($voy["id"],$voy["depart"],$voy["arrive"],$voy["aller"],$voy["retour"]);
                }
            ?>
            <h4>Mes contacts</h4>
            <?php
                foreach (getAllContactVoyages($_SESSION["user_id"]) as $voy) {
                    printVoyage($voy["id"],$voy["depart"],$voy["arrive"],$voy["aller"],$voy["retour"],$voy["pre"] . " " . $voy["nom"]);
                }
            ?>
        </div>
        <?php nav(); ?>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
    </body>
</html>