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

         $result = explode(" ", $_POST["r"]);

        $id_C = array();
        $id_V = array();
        foreach ($result as $value) {
            if (empty($value)) {
                continue;
            }
            $id_C[] = getId($value); 
            $id_V[] = getVoyages($value); 
        }
        foreach ($id_C as $value) {
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
        foreach ($id_V as $value) {
            foreach ($value as $info) {
                if (isset($perso[$info["id_voy"]])) {
                    $perso[$info["id_voy"]]["nb"]++;
                }
                else {
                    $info["nb"] = 1;
                    $perso[$info["id_voy"]] = $info;
                }
            }
        }

        uasort($perso,'order');
    }
	


        
	
	
	

    if (!isset($_POST["r"]) || $_POST["r"]=="") {
    	echo "<p class='msg'>Entrez une ville, un nom, une destination... et on verra ce que l'on vous trouve.</p>";
    }
    elseif (count($perso)<=0) {
    	echo "<p class='msg'>Aucun resultat ne correspond à \"" . $_POST["r"] . "\", désolé.</p>";
    }
    else {
    	echo "<br />";
    	foreach ($perso as $value) {
			if(isset($value['id_etu'])){
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
			else if(isset($value['id_voy'])){
				?>
				<div class="voyage" onclick="voyage(<?php echo $value['id_voy']; ?>,'<?php echo  $value['nom_villeD'] . "⟷" . $value['nom_villeA']; ?>')">
					<img src="../img/car.png" />
					<h5><?php echo  $value['nom_villeD'] . "⟷" . $value['nom_villeA']; ?></h5>
					<span class="date"><?php echo $value["date_aller"]." / ".$value['date_retour']; ?></span>
					<br />
					<span class="conduc"><?php echo $value["prenom_etu"]." ".$value["nom_etu"]; ?></span>
				</div> 
				<?php
			}
    	}
    }


?>