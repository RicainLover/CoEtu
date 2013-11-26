<?php


function boxuser($pre,$nom,$infos){
	echo "<div id='perso'><h2>". ucfirst($pre) . " " . ucfirst($nom) . "</h2>";
	foreach ($infos as $key => $value) {
		echo "<span class='label'>" . $key . ":</span>";
		echo "<span class='carac'>" . $value . "</span>";
	}
	echo "<div class='option'><a href='#'>modifier infos</a><a href='#'>déconnexion</a></div></div>\n";
}

function nav(){
	?>
	<div id='nav'>
		<a href='../voyage'>Voyages</a>
		<a href='../carnet'>Contacts</a>
		<form action="../rechercher">
			<input type="text" placeholder="Rechercher" name="r" id="echercher" />
		</form>
		<a href='#' onclick="notification()" />
			<img src="../img/bell.png" alt="Notifications" />
		</a>
	</div>
	<div id="notif" style="display:none;" >
		<div>
			<h3>
				Notifications
				<a href="#" onclick="notification()">fermer</a>
			</h3>
		</div>
	</div>
	<?php
}

?>
