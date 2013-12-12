<?php

    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

?>

<p id="err" style="color:red;"></p>

<form id="creationvoyage" method="post">
	<label for="v_dep">Ville de départ :</label>
	<br />
	<input id="v_dep" name="dep" />
	<br />
	<br />
	<label for="v_arr">ville d'arrivé :</label>
	<br />
	<input id="v_arr" name="arr" />
	<br />
	<br />
	<label for="d_dep">Date de départ :</label>
	<br />
	<input id="d_dep" name="dep" type="date"/>
	<br />
	<br />
	<label for="d_arr">Date d'arrivé :</label>
	<br />
	<input id="d_arr" name="arr" type="date" />
	<br />
	<br />
	<label for="rec">Récurence :</label>
	<br />
	<input id="rec" name="rec" type="number" min="1" />
	<br />
	<br />
	<input type="button" value="créer" onclick="ajoutVoyage()" />
</form>