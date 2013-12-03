<?php

    session_start();
    require_once '../lib/html.php';
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/sql.php';

    $result = array();

    if (isset($_GET["r"])) {
        $result = split(" ", $_GET["r"]);
        $id = array();
        foreach ($result as $value) {
            $id[] = getIdPre($value); 
        }
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<?php head() ?>
	</head>
    <body>
        <div id="titre">
            <h1>Recherche</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="recherche">
            <br />
            <!-- <div class="voyage" onclick="pop_show()">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
                <br />
                <span class="conduc">Machin Bidule</span>
            </div>
            <div class="personne" onclick="pop_show()">
                <img src="../img/buddy.png" />
                <h5>Jean Mercadier</h5>
                <span class="univ">IUT-BM</span>
                <br />
                <span class="ville">Marseille</span>
            </div> -->
            <?php print_r($id); ?>
        </div>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
        <?php nav(); ?>
    </body>
</html>