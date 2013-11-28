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

function contractNom($nom, $prenom)
{
    return $prenom." ".strtoupper($nom[0]).".";
}

function hex2rgb($hex){
    $tab = array();
    if(strlen($hex)==3){
       $substr = str_split($hex,1);
       for($i =0;$i<3;$i++){
           $substr[$i]=$substr[$i].$substr[$i];
       }
    }
    else if (strlen($hex)==6){
       $substr = str_split($hex,2);
    }

    foreach($substr as $decomp){
        $tab[] = hexdec($decomp);
    }
    return $tab;
}

function email_valid($temp_email) {
######## Three functions to HELP ########
        function valid_dot_pos($email) {
            $str_len = strlen($email);
            for($i=0; $i<$str_len; $i++) {
                $current_element = $email[$i];
                if($current_element == "." && ($email[$i+1] == ".")) {
                    return false;
                    break;
                }
                else {

                }
            }
            return true;
        }
        function valid_local_part($local_part) {
            if(preg_match("/[^a-zA-Z0-9-_@.!#$%&'*\/+=?^`{\|}~]/", $local_part)) {
                return false;
            }
            else {
                return true;
            }
        }
        function valid_domain_part($domain_part) {
            if(preg_match("/[^a-zA-Z0-9@#\[\].]/", $domain_part)) {
                return false;
            }
            elseif(preg_match("/[@]/", $domain_part) && preg_match("/[#]/", $domain_part)) {
                return false;
            }
            elseif(preg_match("/[\[]/", $domain_part) || preg_match("/[\]]/", $domain_part)) {
                $dot_pos = strrpos($domain_part, ".");
                if(($dot_pos < strrpos($domain_part, "]")) || (strrpos($domain_part, "]") < strrpos($domain_part, "["))) {
                    return true;
                }
                elseif(preg_match("/[^0-9.]/", $domain_part)) {
                    return false;
                }
                else {
                    return false;
                }
            }
            else {
                return true;
            }
        }
        // trim() the entered E-Mail
        $str_trimmed = trim($temp_email);
        // find the @ position
        $at_pos = strrpos($str_trimmed, "@");
        // find the . position
        $dot_pos = strrpos($str_trimmed, ".");
        // this will cut the local part and return it in $local_part
        $local_part = substr($str_trimmed, 0, $at_pos);
        // this will cut the domain part and return it in $domain_part
        $domain_part = substr($str_trimmed, $at_pos);
        if(!isset($str_trimmed) || is_null($str_trimmed) || empty($str_trimmed) || $str_trimmed == "") {
            return false;
        }
        elseif(!valid_local_part($local_part)) {
            return false;
        }
        elseif(!valid_domain_part($domain_part)) {
            return false;
        }
        elseif($at_pos > $dot_pos) {
            return false;
        }
        elseif(!valid_local_part($local_part)) {
            return false;
        }
        elseif(($str_trimmed[$at_pos + 1]) == ".") {
            return false;
        }
        elseif(!preg_match("/[(@)]/", $str_trimmed) || !preg_match("/[(.)]/", $str_trimmed)) {
            return false;
        }
        else {
            return true;
        }
}
?>