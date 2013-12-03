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
    $perso = array();

    if (isset($_GET["r"])) {
        $result = @split(" ", $_GET["r"]);
        $id = array();
        foreach ($result as $value) {
            $id[] = getId($value); 
        }
        foreach ($id as $value) {
            foreach ($value as $info) {
                if (isset($perso[$info["id_etu"]])) {
                    $perso[$info["id_etu"]]["nb"]++;
                }
                else {
                    $info["nb"] = 1;
                    $perso[$info["id_etu"]] = $info;
                }
            }
        }
        uasort($perso,'order');
    }

    function order($a,$b){
        return $a["nb"]<$b["nb"];
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
            </div>-->
            <?php
                foreach ($perso as $value) {
                    ?>
                        <div class="personne" onclick="peronneInfo(<?php echo $value['id_etu']; ?>,'<?php echo  $value['prenom_etu'] . " " . $value['nom_etu']; ?>')">
                            <img src="../img/buddy.png" />
                            <h5><?php echo  $value["prenom_etu"] . " " . $value["nom_etu"]; ?></h5>
                            <span class="univ"><?php echo $value["libelle"]; ?></span>
                            <br />
                            <span class="ville"><?php echo $value["nom_ville"]; ?></span>
                        </div> 
                    <?php
                }
            ?>
        </div>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
        <?php nav(); ?>
    </body>
</html>