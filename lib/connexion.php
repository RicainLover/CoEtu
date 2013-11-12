<?php

function verifID($pseudo,  $mdp)
{   
    include '/login.inc';
    try {
        $connec = new PDO("mysql:host=$SERVEUR", "dbname=$BASE", $LOGIN, $PASSWORD);
    } catch(Exception $e) {
        die($e->getMessage());
    }
    
    $rep = true; 
    
    $select = $connec->query("SELECT * FROM ETUDIANT WHERE pseudo=$pseudo;");
    if ($select) {
        if (hash("sha256", $mdp, null) != $select->mdp) {
            $rep = false;
        }
    }else{
        $rep = false;
    }
    
    return $rep;
}

?>