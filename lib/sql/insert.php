<?php

function addInCarnet($etu1, $etu2)
{
    $connec = getPDO();
    $requete = "INSERT INTO `coetu`.`carnet` (
                            `statut_car` ,
                            `id_etu` ,
                            `id_etu_etudiant`
                        )
                        VALUES (
                            '0', '".$etu1."', '".$etu2."'
                        )";
    $connec->query($requete);
}

function addMsg($de,$a,$msg) {
    $connec = getPDO();
    $requete2 = "INSERT INTO message (msg,etu_send,etu_get)
				VALUES ('$msg',$de,$a);";
    $q = $connec->exec($requete2);
    return $q;
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

function ajoutVoyage($v_dep, $v_arr, $d_dep, $d_arr, $rec)
{
	$connec = getPDO();
	
	$query = "INSERT INTO `coetu`.`voyage` (`id_voy`, `date_aller`, `date_retour`, `ville_depart`, `ville_arrive`, `statut`, `id_etu`, `recursivite`) VALUES (NULL, '".$d_dep."', '".$d_arr."', '".$v_dep."', '".$v_arr."', NULL, '".$_SESSION['user_id']."', '".$rec."');";
	
	$connec->exec($query);
}