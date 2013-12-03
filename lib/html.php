<?php

require_once 'bibli.php';

function head(){
	echo file_get_contents("../cont/head.html");
}

function boxuser($nom, $id){
	echo "<div id='perso'><h2>". $nom . "</h2>";
    printInfoContact($id);
	echo "<div class='option'><a href='../profil/index.php' title='Parametres'><img src='../img/param.png' alt='Parametres' /></a><a href='../deco.php' title='Déconnexion'><img src='../img/out.png' alt='Déconnexion' /></a></div></div>\n";
}

function printInfoContact($id){
    $infos = infoetu($id);
    $coordonnee = getCoordonee($id);
    echo "<span class='label'>Université:</span>";
    echo "<span class='carac'>".$infos[4]."</span>";
    echo "<span class='label'>Lieu d'études:</span>";
    echo "<span class='carac'>".$infos[0]."</span>";
    echo "<span class='label'>Habite:</span>";
    echo "<span class='carac'>".$infos[1]."</span>";

    for($i=1;$i<$coordonnee[0]*2;$i+=2){
        echo "<span class='label'>".ucfirst($coordonnee[$i])."</span>";
        echo "<span class='carac'>".$coordonnee[$i+1]."</span>";
    }

    echo "<span class='label'>Né:</span>";
    echo "<span class='carac'>".mois($infos[3])." ".$infos[2]."</span>";
}

function formModInfo($id){
	$infos = infoetu($id);
    $coordonnee = getCoordonee($id);
    echo "<form method='post' class='modinfo' >";
    echo "<label for='univ'>Université: </label>";
    echo "<input id='univ' name='univ' value='" . $infos[4] . "' /><br /><br />";
    echo "<label for='lieu'>Lieu d'études: </label>";
    echo "<input id='lieu' name='lieu' value='".$infos[0]."'><br /><br />";
    echo "<label for='ville'>Habite: </label>";
    echo "<input id='ville' name='ville' value='".$infos[1]."' /><br /><br />";
    for($i=1;$i<$coordonnee[0]*2;$i+=2){
        echo "<label for='i" . $i . "'>".ucfirst($coordonnee[$i]).": </label>";
        echo "<input id='i" . $i . "' name='".$coordonnee[$i]."' value='".$coordonnee[$i+1]."'/><br /><br />";
    }
    echo "<label for='ne'>Né: </label>";
    echo "<select class='mois'>";
    for ($i=1; $i<=12;$i++) { 
    	echo "<option ";
    	if ($i==$infos[3]) {
    		echo "selected='selected' ";
    	}
    	echo " value='".$i."'>".mois($i)."</option>";
    }
    echo "</select>";
    echo "<select name='annee' >";
    for ($i=date("Y");$i>=date("Y")-100;$i--) {
    	if($infos[2]==$i){
    		echo "<option selected='selected'>" . $i . "</option>";
    	}
    	else{
    		echo "<option>" . $i . "</option>";
    	}
    }
	echo "</select><span id='push'></span>";
	echo "<br /><br /><input type='submit' value='Sauvegarder' /><input type='reset' value='Annuler' />";
	echo "</form>\n"; 
}

function nav(){
	?>
	<div id='nav'>
		<a href='../home' title="Home">
			<img src="../img/home.png" alt="Home" />
		</a><a href='../voyage' title="Voyages">
			<img src="../img/car.png" alt="Voyage" />
		</a><a href='../carnet' title="Carnet d'adresse" onclick="getContacts()">
			<img src="../img/buddy.png" alt="Carnet" />
		</a>
		<form action="../rechercher">
			<input type="text" placeholder="Rechercher" name="r" value="<?php if(isset($_GET['r'])){ echo $_GET['r']; } ?>" id="echercher" />
		</form>
		<a href='#' onclick="getNotification()" title="Notifications" />
			<img src="../img/bell.png" alt="Notifications" />
		</a>
	</div>
    <div id='pop' style='display:none;' ><div><h3><span id='pop_titre'></span><a href='#' onclick='pop_close()'><img src='../img/close.png' style='height:17px;'/></a></h3><div id='pop_cont'></div></div></div>
	<img src="../img/loading.gif" alt="Loading" id="loading" style="display:none;" />
	<?php
}

?>
