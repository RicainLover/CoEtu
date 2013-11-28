<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../login.inc';
    require_once '../lib/sql.php';
    require_once '../lib/bibli.php';
	header('Content-type: text/css');

    $r = hex2rgb(getCouleur($_SESSION["user_id"]))[0];
    $g = hex2rgb(getCouleur($_SESSION["user_id"]))[1];
    $b = hex2rgb(getCouleur($_SESSION["user_id"]))[2];

	function color(){
		global $r,$g,$b;
		return "rgb(" . $r . "," . $g . "," . $b . ")";
	}

	function darck(){
		global $r,$g,$b;
		$r -= 30;
		$g -= 30;
		$b -= 30;
		if ($r<0) { $r = 0; }
		if ($g<0) { $g = 0; }
		if ($b<0) { $b = 0; }
		return "rgb(" . $r . "," . $g . "," . $b . ")";
	}

?>

a:active {
    color: <?php echo color() ?>; 
}

div#nav {
    background-color: <?php echo color() ?>;
    box-shadow: 2px 0px 7px <?php echo color() ?>;
}

div#nav:hover {
    box-shadow: 2px 0px 10px <?php echo color() ?>;
}

div#nav a:hover {
    background-color: <?php echo darck() ?>;
}

div#notif h3 {
    background-color: <?php echo color() ?>;
}

div#perso {
    background-color: <?php echo color() ?>;
    box-shadow: 2px 0px 7px <?php echo color() ?>;
}