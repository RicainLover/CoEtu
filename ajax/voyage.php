<?php

	require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../lib/sql.php';
    require_once '../login.inc';

    $voy = getInfoVoyage(1);

?>

<div id="map" style="background-color:rgb(223,220,215);text-align:center;color:white;">
	MAP
</div>
<div id="mapinfo">
	<span class="label">Départ :</span><br />
	<span class="info"><?php echo $voy['depart']; ?></span><br />
	<span class="label">Arrivé :</span><br />
	<span class="info"><?php echo $voy['arrive']; ?></span><br />
	<span class="label">Temps :</span><br />
	<span class="info">3h 15min</span><br />
	<span class="label">Aller :</span><br />
	<span class="info"><?php echo $voy['aller']; ?></span><br />
	<span class="label">Retour :</span><br />
	<span class="info"><?php echo $voy['retour']; ?></span><br />
	<span class="label">Conducteur :</span><br />
	<span class="info"><?php echo $voy['pre'] . " " . $voy['nom']; ?></span><br />
</div>	