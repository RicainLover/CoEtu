<?php

function boxuser($nom, $id){
	echo "<div id='perso'><h2>". $nom . "</h2>";
    printInfoContact($id);
	echo "<div class='option'><a href='../profil/index.php' title='Parametres' ><img src='../img/param.png' alt='Parametres' /></a><a href='../deco.php' title='Déconnection'><img src='../img/out.png' alt='Déconnection' /></a></div></div>\n";
}

function printInfoContact($id){
    $infos = infoetu($id);
    $coordonnee = getCoordonee($id);
    echo "<span class='label'>Univ:</span>";
    echo "<span class='carac'>".$infos[0]."</span>";
    echo "<span class='label'>Habite:</span>";
    echo "<span class='carac'>".$infos[1]."</span>";

    for($i=1;$i<$coordonnee[0]*2;$i=$i+2){
        echo "<span class='label'>".$coordonnee[$i]."</span>";
        echo "<span class='carac'>".$coordonnee[$i+1]."</span>";
    }

    echo "<span class='label'>Né:</span>";
    echo "<span class='carac'>".$infos[2].".".$infos[3]."</span>";
}

function nav(){
	?>
	<div id='nav'>
		<a href='../home' title="Home">
			<img src="../img/home.png" alt="Home" />
		</a>
		<a href='../voyage' title="Voyages">
			<img src="../img/car.png" alt="Voyage" />
		</a>
		<a href='../carnet' title="Carnet d'adresse">
			<img src="../img/buddy.png" alt="Carnet" />
		</a>
		<form action="../rechercher">
			<input type="text" placeholder="Rechercher" name="r" id="echercher" />
		</form>
		<a href='#' onclick="notification()" title="Notifications" ations" >
			<img src="../img/bell.gif" alt="Notifications" />
		</a>
	</div>
	<div id="notif" style="display:none;" >
		<div>
			<h3>
				Notifications
				<a href="#" onclick="notification()"><img src="../img/close.png" style="height:17px;"/></a>
			</h3>
		</div>
	</div>
	<?php
}

?>
