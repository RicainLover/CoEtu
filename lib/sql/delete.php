<?php

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

function denieRequest($etu1, $etu2)
{
    $connec = getPDO();

    $requete = "DELETE FROM `".BASE."`.`carnet`
                WHERE `carnet`.`id_etu` = $etu1
                AND `carnet`.`id_etu_etudiant` = $etu2
                AND `carnet`.`statut_car` = '0';";

    $connec->query($requete);
}