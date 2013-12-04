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

function verifConnexion($email, $mdp){
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

// renvoie les infos des personnes ayant comme nom $nom
function getId($nom){
	$connec = getPDO();
	$requete = "SELECT E.id_etu, E.prenom_etu, E.nom_etu, C.libelle, V.nom_ville
				FROM etudiant E
				JOIN campus C ON E.id_camp = C.id_camp
				JOIN ville V ON E.id_ville = V.id_ville
				WHERE E.nom_etu = '$nom'
				OR E.prenom_etu = '$nom';";

	$rep = $connec->query($requete);
	$id = array();
	while($tab = $rep->fetch(PDO::FETCH_OBJ)){
		$id[(int)$tab->id_etu] = (Array)$tab;
	}
	return $id;
}

// renvoie le prenom et nom de l'id en parametre
function getNom($id){
	$connec = getPDO();

	$requete = "SELECT E.prenom_etu, E.nom_etu
				FROM etudiant E
				WHERE E.id_etu = '$id';";

	$rep = $connec->query($requete);

	$tab = $rep->fetch();

	return ucfirst($tab[0]) . " " . ucfirst($tab[1]);
}

// Fonction permettant de récuperer l'ID correspondant a l'email
function getIDEtudiant($email){

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

// retourne l'ID du campus si le libelle fourni existe ou false si il n'existe pas
function idCampus($nomCampus){
	
	$connec = getPDO();
	
	$requete = "SELECT id_camp FROM campus WHERE libelle = '$nomCampus' ;";
	$tab = $connec->query($requete);
	
	if($res = $tab->fetch(PDO::FETCH_OBJ)){
		return $res->id_camp;
	}
	else{
		return false;
	}
}

// retourne l'ID de la ville si le nom de ville fourni existe ou false si il n'existe pas
function idVille($nomVille){
	
	$connec = getPDO();
	
	$requete = "SELECT id_ville FROM ville WHERE nom_ville = '$nomVille' ;";
	$tab = $connec->query($requete);
	
	if($res = $tab->fetch(PDO::FETCH_OBJ)){
		return $res->id_ville;
	}
	else{
		return false;
	}
}

function inscription($mdp, $nom, $prenom, $mois, $annee, $ville, $campus, $mail){
	
    $connec = getPDO();

    $motdepasse = hash("sha256", $mdp, null);
	
    $requeteselect = "SELECT e.id_etu
				FROM etudiant e
				WHERE e.mot_de_passe = '" . $motdepasse . "'
				AND e.nom_etu = '" . $nom . "'
				AND e.prenom_etu = '" . $prenom . "'
				AND e.mois_ne_etu = " . $mois . "
				AND e.annee_ne_etu = " . $annee . "
				AND e.id_ville = " . $ville . "
				AND e.id_camp = " . $campus . ";";

    $rep = $connec->query($requeteselect);

    $tab = $rep->fetch();

    if ($tab[0] == null) {

        $requete = "INSERT INTO etudiant
                VALUES (null,'" . $motdepasse . "','" . $nom . "','" . $prenom . "'," . $mois . "," . $annee . "," . $ville . "," . $campus . ",'0078E7');";

        $q = $connec->exec($requete);

        if ($q == 0) {
            return $q = -1; //erreur lors d'insert dans étudiant
        } else {
            $rep = $connec->query($requeteselect);
            $tab = $rep->fetch();

            $requete = "INSERT INTO coordonnee
                        VALUES (null,'email','" . $mail . "'," . $tab[0] . ")";
            $q = $connec->exec($requete);

            if ($q == 0) {
                return $q = -2; //erreur lors d'insert dans coordonee
            }
        }
    } else {
        $q = -3; //erreur étudiant déjà existant
    }

    return $q;
}

function getContactsSQL($id){
	$connec = getPDO();

	$requete1 = "SELECT e.id_etu, e.nom_etu, e.prenom_etu
				FROM etudiant e, carnet c
				WHERE c.id_etu = $id
				AND e.id_etu = c.id_etu_etudiant
                AND c.statut_car = 1;";

    $requete2 = "SELECT e.id_etu, e.nom_etu, e.prenom_etu
                FROM etudiant e, carnet c
                WHERE c.id_etu_etudiant = $id
                AND e.id_etu = c.id_etu
                AND c.statut_car = 1;";

	$tab = $connec->query($requete1);
	$rep = array();
	while($line = $tab->fetch()){
		$rep[] = $line;
	}
    $tab = $connec->query($requete2);
    while($line = $tab->fetch()){
        $rep[] = $line;
    }
    
	return $rep;
}

function infoetu($id){

    $connec = getPDO();
    $requete = "SELECT ca.libelle,v.id_ville,e.annee_ne_etu,e.mois_ne_etu,u.nom_univ
				FROM etudiant e,campus ca,ville v,universite u
				WHERE e.id_etu = '$id'
				AND e.id_camp = ca.id_camp
				AND e.id_ville = v.id_ville
				AND ca.id_univ = u.id_univ;";

    $tab = $connec->query($requete);
    $info = $tab->fetch();

	return $info;
}

function getCoordonee($id){
    $connec = getPDO();

    $requete = "SELECT co.libelle_coordonnee,co.information
				FROM coordonnee co
				WHERE co.id_etu = '$id'";

    $tab = $connec->query($requete);

    $tableau = Array();
    $tableau[] = $tab->rowCount();
    while( $info = $tab->fetch())
    {
        $tableau[] = $info[0];
        $tableau[] = $info[1];
    }

    return $tableau;

}

function supprContact($i){
    $connec = getPDO();

    $requete1 = "DELETE FROM carnet
                WHERE id_etu =".$_SESSION["user_id"]."
                AND id_etu_etudiant = ".$i.";";

    $requete2 = "DELETE FROM carnet
                WHERE id_etu_etudiant =".$_SESSION["user_id"]."
                AND id_etu = ".$i.";";

    $q = $connec->exec($requete1);
    
    if($q == 0)$q = $connec->exec($requete2);

    return $q;
}

function getCouleur($id){

    $connec = getPDO();

    $requete = "SELECT e.couleur
				FROM etudiant e
				WHERE e.id_etu = '$id'";
    $tab = $connec->query($requete);
	if($res = $tab->fetch(PDO::FETCH_OBJ)){
		$couleur=$res->couleur;
	}
	
    return $couleur;
}

function setCouleur($id,$couleur){

    $connec = getPDO();
    $requete = "UPDATE etudiant
                SET couleur = '$couleur'
                WHERE id_etu = '$id'";
    $q = $connec->exec($requete);
    return $q;
}

function verifContactSQL($id,$contact){
    $connec = getPDO();

    $requete1 = "SELECT c.id_etu_etudiant
				FROM carnet c
				WHERE c.id_etu = '$id'
				AND c.id_etu_etudiant = '$contact'
                AND c.statut_car = 1;";

    $requete2 = "SELECT c.id_etu_etudiant
                FROM carnet c
                WHERE c.id_etu = '$contact'
                AND c.id_etu_etudiant = '$id'
                AND c.statut_car = 1;";

    $bool1 = true;
    $bool2 = true;

    $tab1 = $connec->query($requete1);
	
    if ($rep = $tab1->fetch(PDO::FETCH_OBJ)==null) {
        $bool1 = false;
    }

    $tab2 = $connec->query($requete2);
    
    if ($rep = $tab2->fetch(PDO::FETCH_OBJ)==null) {
        $bool2 = false;
    }  

    return $bool1 || $bool2;
}

function getStatut($etu1, $etu2)
{
    $connec = getPDO();

    $requet = $connec->query("select statut_car from carnet
                    where id_etu=\"".$etu1."\"
                    and id_etu_etudiant=\"".$etu2."\";");

    $tab = $requet->fetch();

    $statut = 42;

    if(!$tab){
        $requet = $connec->query("select statut_car from carnet
                    where id_etu_etudiant=\"".$etu1."\"
                    and id_etu=\"".$etu2."\";");
        $tab2 = $requet->fetch();
        if(!$tab2){
            $statut = -1;
        }else{
            $statut = $tab2[0];
        }
    }else{
        $statut = $tab[0];
    }

    return $statut;
}

function nbnotif($id){
	$connec = getPDO();
    $requete = "SELECT count(*) 
    			FROM carnet C 
    			WHERE id_etu_etudiant=$id 
    			AND statut_car=0;";
    $q = $connec->query($requete);
    $q = $q->fetch();
    return $q[0];
}

function addInCarnet($etu1, $etu2)
{
    $connec = getPDO();
    $requete = "INSERT INTO `coetu`.`carnet` (
                            `statut_car` ,
                            `id_etu` ,
                            `id_etu_etudiant`
                        )
                        VALUES (
                            '0', '".$_SESSION["user_id"]."', '".$_POST["id_contact"]."'
                        )";
    $connec->query($requete);
}

function getinfoVille($id){
    $connec = getPDO();

    $requete1 = "SELECT v.nom_ville, v.lat_ville, v.lng_ville
				FROM ville v
				WHERE v.id_ville = '$id';";

    $tab = $connec->query($requete1);

    $info = $tab->fetch();

    return $info;
}

function getRequest($i)
{
    $connec = getPDO();

    $requete = "select id_etu
                from carnet
                where id_etu_etudiant = $i
                and statut_car = 0;";

    $tab = $connec->query($requete);

    $rep = array();

    while($reponse = $tab->fetch()){
        $rep[] = $reponse[0];
    }

    return $rep;
}

function denieRequest($etu1, $etu2)
{
    $connec = getPDO();

    $requete = "DELETE FROM `".BASE."`.`carnet` 
                WHERE `carnet`.`id_etu` = $etu1
                AND `carnet`.`id_etu_etudiant` = $etu2
                AND `carnet`.`statut_car` = '0';";

    $connec->query($requete);
}

function changeStatut($etu1, $etu2, $statut)
{
    $connec = getPDO();

    $requete = "UPDATE `".BASE."`.`carnet` SET `statut_car` = '$statut' 
                WHERE `carnet`.`id_etu` = $etu1 
                AND `carnet`.`id_etu_etudiant` = $etu2;";

    $rep = $connec->query($requete);
}