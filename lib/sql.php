<?php



//fonction pour récuperer proprement une instance de PDO
function getPDO()
{
	try {
		$option = array (
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		$connec = new PDO("mysql:host=" . SERVER . ";dbname=" . BASE, LOGIN, PASSWORD, $option);
	} catch(Exception $e) {
		die($e->getMessage());
	}

	return $connec;
}

function verifConnexion($email, $mdp)
{   
	$connec = getPDO();
	
	// On considere le mot de passe comme juste
	$rep = true; 
	
	// On recupere l'etudiant correspondant a l'identifiant fourni
	$requete = "SELECT E.mot_de_passe
				FROM etudiant E, coordonnee C
				WHERE E.id_etu = C.id_etu
				AND C.libelle_coordonnee = \"email\"
				AND C.information = \"$email\";";

	try{
		$select = $connec->query($requete);
	}catch(Exception $e) {
		die($e->getMessage());
	}

	$tab = $select->fetch();

	// Si on trouve l'etudiant
	if (isset($tab['mot_de_passe'])) {
		// On verifie si le hash du mdp fourni et le meme que celui stocker
		if (hash("sha256", $mdp, null) != $tab['mot_de_passe']) {
			$rep = false;
		}
	// Si on ne trouve pas l'etudiant
	}else{
		$rep = false;
	}
	
	return $rep;
}

function getIDEtudiant($email)
{
	$connec = getPDO();

	$requete = "SELECT E.id_etu
				FROM etudiant E, coordonnee C
				WHERE E.id_etu = C.id_etu
				AND C.libelle_coordonnee = \"email\"
				AND C.information = \"$email\";";
				
	$rep = $connec->query($requete);

	$tab = $rep->fetch();

	return $tab[0];
}

	
function create_liste_etu($id_etu){
	$connec = getPDO();

	$requete = "SELECT e.*
				FROM etudiant e
				WHERE e.id_etu = \"$id_etu\"";
	$select = $connec->query($requete);
	$tableau = array();

	while($donnee = $select->fetch())
	{
		$tableau[] = $donnee;
	}
	return $tableau;
}

function infoetu($id){
	$info = array();

	return $info;
}



?>
