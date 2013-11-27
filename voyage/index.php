<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/html.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='../js/inside.js' ></script>
	</head>
    <body>
        <div id="titre">
            <h1>Freetu</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="voyages">
            <h4>Mes voyages</h4>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')" >
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
            </div>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
            </div>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
            </div>
            <h4>Mes contacts</h4>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
                <br />
                <span class="conduc">Machin Bidule</span>
            </div>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
                <br />
                <span class="conduc">Machin Bidule</span>
            </div>
            <div class="voyage" onclick="pop('Lille ⟷ Belfort')">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
                <br />
                <span class="conduc">Machin Bidule</span>
            </div>
        </div>
        <div id="perso"></div>
        <?php nav(); ?>
    </body>
</html>