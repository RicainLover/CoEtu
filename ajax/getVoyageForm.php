<?php

    require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

?>

<form id="creationvoyage">
	<label for="dep">Départ :</label>
	<br />
	<input id="dep" name="dep" />
	<br />
	<br />
	<label for="arr">Arrivé :</label>
	<br />
	<input id="arr" name="arr" />
	<br />
	<br />
	<label for="pla">Places :</label>
	<br />
	<input id="pla" name="pla" />
	<br />
	<br />
	<label for="rec">Récurence :</label>
	<br />
	<input id="rec" name="rec" />
</form>