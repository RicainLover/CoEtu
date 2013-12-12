<?php
	require_once "../lib/sql.php";
	require_once "../login.inc";
	
	$connec = getPDO();
	
	$code=$_GET['term'];
	$requete = "SELECT c.libelle FROM campus c
				JOIN ville v ON c.id_ville=v.id_ville
				WHERE v.nom_ville like '%".addslashes($code)."%' 
				OR c.libelle like '%".addslashes($code)."%' LIMIT 5;";
	$array=array();
	try{
		$select = $connec->query($requete);
		
		
		while($ligne = $select->fetch()){
		  array_push($array, $ligne['libelle']);
		}
	}
	catch(Exception $e){
		echo("erreur dans l'auto complétion");
	}
	
	echo json_encode($array);
?>