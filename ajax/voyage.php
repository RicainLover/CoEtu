<?php

	require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

?>

<div id="map" style="background-color:red;">
	MAP
</div>
<div id="mapinfo">
	<span class="label">Départ</span><br />
	<span class="info">Lille</span><br /><br />
	<span class="label">Départ</span><br />
	<span class="info">Lille</span><br /><br />
</div>	