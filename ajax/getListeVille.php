<?php
	require_once "../lib/sql.php";
	require_once "../login.inc";
	
	$connec = getPDO();
	
	$code=$_GET['term'];
	$requete = "SELECT nom_ville FROM ville WHERE nom_ville like '".addslashes($code)."%' LIMIT 5;";
	$array=array();
	try{
		$select = $connec->query($requete);

		while($ligne = $select->fetch()){
		  array_push($array, $ligne['nom_ville']);
		}
	}
	catch(Exception $e){
		echo("erreur dans l'auto complétion");
	}
	
	echo json_encode($array);
?>