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
		<?php head() ?>
	</head>
    <body>
        <div id="titre">
            <h1>Vos Voyages</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="voyages">
            <input class="newvoy" onclick="getNewVoyageForm()" value="Nouveau" type="button" title="Créer un nouveau voyage." />
            <h4>Mes voyages</h4>
            <?php
                foreach (getAllVoyages($_SESSION["user_id"]) as $voy) { ?>
                    <div class="voyage" onclick="afficheItineraire()" >
                        <img src="../img/car.png" />
                        <h5><?php echo $voy["depart"] ?> ⟷ <?php echo $voy["arrive"] ?></h5>
                        <span class="date"><?php echo $voy["aller"] ?> / <?php echo $voy["retour"] ?></span>
                    </div>
                <?php }
            ?>
            <h4>Mes contacts</h4>
            <?php
                foreach (getAllContactVoyages($_SESSION["user_id"]) as $voy) { ?>
<<<<<<< HEAD
                    <div class="voyage" onclick="afficheItineraire()" >
=======
                    <div class="voyage" onclick="voyage(<?php echo $voy["id"] . ",'" . $voy["depart"] . " ⟷ " . $voy["arrive"] . "'";?>)"  >
>>>>>>> d629fb34b408bfa1b1532f970a92c156c4bf41dd
                        <img src="../img/car.png" />
                        <h5><?php echo $voy["depart"] ?> ⟷ <?php echo $voy["arrive"] ?></h5>
                        <span class="date"><?php echo $voy["aller"] ?> / <?php echo $voy["retour"] ?></span>
                        <br />
                        <span class="conduc"><?php echo $voy["pre"] . " " . $voy["nom"] ?></span>
                    </div>
                <?php }
            ?>
        </div>
        <?php nav(); ?>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
    </body>
</html>