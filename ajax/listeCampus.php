<?php
	require_once "../lib/sql.php";
	require_once "../login.inc";
	
	$connec = getPDO();
	
	$code=$_GET['term'];
	$requete = "SELECT c.id_camp, v.nom_ville FROM campus c, ville v 
				WHERE c.id_ville=v.id_ville
				AND v.nom_ville like '".addslashes($code)."%' LIMIT 5;";
	$array=array();
	try{
		$select = $connec->query($requete);
		
		
		while($ligne = $select->fetch()){
		  array_push($array, $ligne['id_camp']." ".$ligne['nom_ville']);
		}
	}
	catch(Exception $e){
		echo("erreur dans l'auto complétion");
	}
	
	echo json_encode($array);
?>