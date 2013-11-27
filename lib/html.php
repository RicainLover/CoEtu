<?php


function boxuser($id){
	echo "<div id='perso'>";
	printInfoContact(infoetu($id));
	echo "<div class='option'><a href='#' title='Parametres' ><img src='../img/param.png' alt='Parametres' /></a><a href='../deco.php' title='Déconnection'><img src='../img/out.png' alt='Déconnection' /></a></div></div>\n";
}

function printInfoContact($info)
{
	print("<span class='label'>Nom:</span><span class='carac'>".$info[0][0]."</span>");
	print("<span class='label'>Prénom:</span><span class='carac'>".$info[0][1]."</span>");
	print("<span class='label'>Ville:</span><span class='carac'>".$info[0][2]."</span>");
	print("<span class='label'>Université:</span><span class='carac'>".$info[0][3]."</span>");
	for($i=4 ; $i < sizeof($info[0])/2 ; $i+=2){
		print("<span class='label'>".$info[0][$i].":</span><span class='carac'>".$info[0][$i+1]."</span>");
	}
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
		<a href='#' onclick="notification()" title="Notifications" />
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
