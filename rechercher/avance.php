<?php
require_once '../lib/bibli.php';
// pas utiliser !!
?>
<!DOCTYPE html>


<select name="choix">
	<option value="1">Voyages</option>
	<option value="2">Personnes</option>
	<option value="3">Villes</option>
	
</select>

<select name="jour" >
	<?php
	for ($i=1; $i<=31; $i++) {
		if(date('j')==$i){
			echo "<option value='" . $i . "' selected='selected'>" . $i . "</option>";
		}
		else{
			echo "<option value='" . $i . "'>" . $i . "</option>";
		}
	}
	?>
</select>
<select name="mois" >
	<?php
	$mois=date("m");
	for ($i=1; $i<=12; $i++) {
		if($mois==$i){
			echo "<option value='" . $i . "' selected='selected'>" . mois($i) . "</option>";
		}
		else{
			echo "<option value='" . $i . "'>" . mois($i) . "</option>";
		}
	}
	?>
</select>
<select name="annee" >
	<?php
	$annee=date("Y");
	for ($i=date("Y")+2; $i>=date("Y"); $i--) {
		if($annee==$i){
			echo "<option selected='selected'>" . $i . "</option>";
		}
		else{
			echo "<option>" . $i . "</option>";
		}
	}
	?>
</select>
