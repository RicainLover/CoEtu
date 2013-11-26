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
		<a href='../voyage'>Mes voyages</a>
		<a href='../carnet'>Mes contacts</a>
		<a href='../rechercher'>Rechercher</a>
		<a href='#'>Requetes</a>
	</div>
	<?php
}

?>
