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

// renvoir le prenom et nom de l'id en parametre
function getNom($id){
	$connec = getPDO();

	$requete = "SELECT E.prenom_etu, E.nom_etu
				FROM etudiant E
				WHERE E.id_etu = \"$id\";";

	$rep = $connec->query($requete);

	$tab = $rep->fetch();

	return ucfirst($tab[0]) . " " . ucfirst($tab[1]);
}

// Fonction permettant de récuperer l'ID correspondant a l'email
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


function inscription($mdp, $nom, $prenom, $mois, $annee, $ville, $campus, $mail)
{

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
                VALUES (null,'" . $motdepasse . "','" . $nom . "','" . $prenom . "'," . $mois . "," . $annee . "," . $ville . "," . $campus . ");";

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

function getContact($id)
{
	$connec = getPDO();

	$requete = "SELECT e.id_etu, e.nom_etu, e.prenom_etu
				FROM etudiant e, carnet c
				WHERE c.id_etu = $id
				AND e.id_etu = c.id_etu_etudiant;";

	$tab = $connec->query($requete);
	$rep = array();
	while($line = $tab->fetch()){
		$rep[] = $line;
	}
	return $rep;
}

function infoetu($id)
{
	$connec = getPDO();

	$requete = "SELECT e.nom_etu, e.prenom_etu, v.nom_ville, u.nom_univ, c.libelle_coordonnee, c.information
				FROM etudiant e, universite u, ville v, campus ca, coordonnee c
				WHERE c.id_etu = $id
				AND e.id_etu = c.id_etu
				AND e.id_ville = v.id_ville
				AND e.id_camp = ca.id_camp
				AND ca.id_univ = u.id_univ;";

	$tab = $connec->query($requete);
	$info = array();
	
	while($donnee = $tab->fetch())
	{
		$info[] = $donnee;
	}
	
	return $info;
}

function supprContact($i){
    $connec = getPDO();

    $requete = "DELETE FROM carnet
                WHERE id_etu =".$_SESSION["user_id"].";
                AND id_etu_etudiant = ".$i.";";

    $q = $connec->exec($requete);

    return q;
}
?>