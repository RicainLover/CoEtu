<?php

  function affichage_Box_User($tab){
	
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
						foreach($liste as $element1 => $valeur){
							print("<tr>");
							print("<td>".$valeur2."</td>");
						}
								
									
	}

?>
