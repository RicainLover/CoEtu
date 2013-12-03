<?php

	session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/html.php';
    require_once '../lib/sql.php';

    $result = array();
    $perso = array();

    function order($a,$b){
        return $a["nb"]<$b["nb"];
    }

    if (isset($_POST["r"])) {
        $result = @split(" ", $_POST["r"]);
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

    if (!isset($_POST["r"]) || $_POST["r"]=="") {
    	echo "<p class='msg'>Entrer une ville, un nom, une destination... et on verra ce que l'on vous trouve.</p>";
    }
    elseif (count($perso)<=0) {
    	echo "<p class='msg'>Aucun resultat ne correspond à votre recherche.</p>";
    }
    else {
    	echo "<br />";
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
    }


?>