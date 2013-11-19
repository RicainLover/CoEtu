<?php

function verifID($pseudo,  $mdp)
{   
    require '../login.inc';
    try {
        $connec = new PDO("mysql:host=$SERVEUR", "dbname=$BASE", $LOGIN, $PASSWORD);
    } catch(Exception $e) {
        die($e->getMessage());
    }
    
    // On considere le mot de passe comme juste
    $rep = true; 
    
    // On recupere l'etudiant correspondant a l'identifiant fourni
    $select = $connec->query("SELECT * FROM ETUDIANT WHERE pseudo=$pseudo;");
    // Si on trouve l'etudiant
    if ($select) {
        // On verifie si le hash du mdp fourni et le meme que celui stocker
        if (hash("sha256", $mdp, null) != $select->mdp) {
            $rep = false;
        }
    // Si on ne trouve pas l'etudiant
    }else{
        $rep = false;
    }
    
    return $rep;
}

?>