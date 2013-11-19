<?php

function verifID($email,  $mdp)
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
    $requete = "SELECT E.mot_de_passe
                FROM ETUDIANTE E, coordonnee C
                WHERE E.id_etu = C.id_etu
                AND C.libelle_coordonnee = \"email\"
                AND C.information = $email;";
    print($requete);
    $select = $connec->query($requete);
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

	
   function create_liste_etu($id_etu){
            require '../login.inc';
            try {
                $connec = new PDO("mysql:host=$SERVEUR", "dbname=$BASE", $LOGIN, $PASSWORD);
    	    } catch(Exception $e) {
        	die($e->getMessage());
    	    }
   	    $requete = "SELECT ETuDIANT
   		            FROM ETUDIANT e
   		            WHERE e.id_etu = \"$id_etu\""
   	    $select = $connec->query($requete);
   	    $tableau = array();
   	
   	    while($donnee = $select->fetch())
   	    {
   	        $tableau[] = $donnee 
   	    }
   	    return $tableau;
   }



?>
