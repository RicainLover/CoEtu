<?php

require_once("sql.php");

function affichage_Box_User($liste){
	print("<table class=\"tableau-utilisateur\">");
	print("<caption class=\"tableau-utilisateur\">Utilisateur</caption>");
	print("<thead>");
	print("<tr>");
	print("<th>Nom</th>");
	print("<th>Prenom</th>");
	print("<th>id de la zone</th>");
	print("<th>prix de la place</th>");
	print("<th>date naissance</th>");		
	print("<th>ville</th>");
	print("<th>campus</th>");
	print("</tr>");
	print("</thead>");
	foreach($liste as $valeur){
		print("<tr>");
		print("<td>".$valeur."</td>");
		print("<tr/>");
	}
}

function boxuser($pre,$nom,$infos){
	echo "<div id='perso'><h2>". ucfirst($pre) . " " . ucfirst($nom) . "</h2>";
	foreach ($infos as $key => $value) {
		echo "<span class='label'>" . $key . ":</span>";
		echo "<span class='carac'>" . $value . "</span>";
	}
	echo "<div class='option'><a href='#'>modifier infos</a><a href='#'>déconnexion</a></div></div>\n";
}

?>
