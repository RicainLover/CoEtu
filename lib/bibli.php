<?php

function mois($index){
	$index = intval($index);
	if ($index>12 || $index<=0) {
		return $index;
	}
	$mois = array("Janv.","Févr.","Mars","Avr.","Mai","Juin","Juil.","Août","Sept.","Oct.","Nov.","Déc.");
	return $mois[$index-1];
}

function jour($index){
	$index = intval($index);
	if ($index>7 || $index<=0) {
		return $index;
	}
	$jour = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche");
	return $jour[$index-1];
}

?>