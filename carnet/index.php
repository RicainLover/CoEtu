<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../lib/html.php';
    require_once '../login.inc';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/inside.css' />
		<script type='text/javascript' src='inside.js' ></script>
	</head>
    <body>
        <div id=titre>
            <?php
            require_once '../lib/sql.php';
            print_r(getContact($_SESSION["user_id"]));
            ?>
            <h1>Freetu</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="carnet">
            <div>
                <h2>Jean Mercadier</h2>
                <span class="label">Univ:</span>
                <span class="carac">IUT-BM</span>
                <span class="label">Habite:</span>
                <span class="carac">Lille</span>
                <span class="label">Tél:</span>
                <span class="carac">06 06 40 92 84</span>
                <span class="label">Email:</span>
                <a class="carac">jeanmercadier@gmail.com</a>
                <span class="label">Skype:</span>
                <span class="carac">jean.mercadier</span>
                <span class="label">Facebook:</span>
                <a class="carac">http://facebook.com/jean.mercadier</a>
                <span class="label">Né:</span>
                <span class="carac">Juil. 1993</span>
                <div class="option">
                    <a href="#">oublier</a>
                </div>
            </div>
            <div>
                <a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a>
                <a href="#" class="selected">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a>
                <a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a><a href="#">Jean M.</a>
                <a href="#">Thérèse D.</a>
                <a href="#">Kevin V.</a>
            </div>
        </div>
        <div id="perso">
            <h2>Jean Mercadier</h2>
            <span class="label">Univ:</span>
            <span class="carac">IUT-BM</span>
            <span class="label">Habite:</span>
            <span class="carac">Lille</span>
            <span class="label">Tél:</span>
            <span class="carac">06 06 40 92 84</span>
            <span class="label">Email:</span>
            <span class="carac">jeanmercadier@gmail.com</span>
            <span class="label">Skype:</span>
            <span class="carac">jean.mercadier</span>
            <span class="label">Facebook:</span>
            <span class="carac">http://facebook.com/jean.mercadier</span>
            <span class="label">Né:</span>
            <span class="carac">Juil. 1993</span>
            <div class="option">
                <a href="#">modifier infos</a>
                <a href="#">déconnexion</a>
            </div>
        </div>
        <?php nav(); ?>
    </body>
</html>