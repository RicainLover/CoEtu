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
							print("<th>date representation</th>");		
							print("<th>edition</th>");
							print("<th>suppression</th>");
						print("</tr>");
					print("</thead>");
							foreach($liste as $element1 => $valeur){
								print("<br/>");
								if(is_array($valeur)){
									print("<tr>");
									$i = 2;
									foreach($valeur as $element2 => $valeur2){
											if($i%2 == 0){	
												print("<td>".$valeur2."</td>");
											}
											$i = $i +1;
										}
									print("<td><a href=\"test_formulaire_table1.php?op=1&amp;id=".$valeur[0]."\"><img src=\"edit.png\" alt\"modif\" /> </a>");
									print("<td><a href=\"test_vue_table1.php?op=2&amp;id=".$valeur[0]."\"><img src=\"delete.png\" alt\"suppr\" /> </a>");
								}						
							}							
	}

?>
