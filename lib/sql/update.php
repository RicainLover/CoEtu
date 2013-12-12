<?php

function modifInfo($id_etu,$idville,$idcampus,$mois,$annee)
{
    $connec = getPDO();
    $requete = "UPDATE etudiant SET id_ville='$idville', id_camp='$idcampus',mois_ne_etu='$mois', annee_ne_etu='$annee' WHERE id_etu='$id_etu';";
    $q = $connec->exec($requete);
    if ($q == 0) {
        return $q = -1; //erreur lors de la modification de la ville dans étudiant
    } /*else {
            $requete = "UPDATE coordonnee SET libelle_coordonnee='$lib_coord', information='$information' WHERE id_etu='$id_etu';";
            $q = $connec->exec($requete);
            if ($q == 0) {
                return $q = -2; //erreur lors de la modification des coordonnees
            }
        */
    return $q;

}

function changeStatut($etu1, $etu2, $statut)
{
    $connec = getPDO();

    $requete = "UPDATE `".BASE."`.`carnet` SET `statut_car` = '$statut'
                WHERE `carnet`.`id_etu` = $etu1
                AND `carnet`.`id_etu_etudiant` = $etu2;";

    $rep = $connec->query($requete);
}

function setCouleur($id,$couleur){

    $connec = getPDO();
    $requete = "UPDATE etudiant
                SET couleur = '$couleur'
                WHERE id_etu = '$id'";
    $q = $connec->exec($requete);
    return $q;
}

function marckRead($de,$a){
    $connec = getPDO();
    $requete2 = "UPDATE etudiant ES, etudiant EG, message M
				SET M.msg_vu = TRUE
				WHERE ES.id_etu = M.etu_send
				AND EG.id_etu = M.etu_get
				AND ES.id_etu = $de
				AND EG.id_etu = $a
				AND M.msg_vu = FALSE;";
    $q = $connec->exec($requete2);
    return $q;
}