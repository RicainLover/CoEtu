<?php
    session_start();
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../lib/html.php';
    require_once '../login.inc';
    require_once '../lib/sql.php';
    require_once '../lib/bibli.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vos Messages</title>
        <?php head() ?>
        <script type="text/javascript">
            window.onload=function() {
                //getContacts();
            }
        </script>
	</head>
    <body>
        <div id="titre">
            <h1>Vos Messages</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="messagerie">
            <div id="conversation">
                <h2>Machin bidule</h2>
                <div id="scrollpane">
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">vous ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <div class="msg" title="date">
                        <span class="perso">JM ></span>
                        <span class="dire">Bonjour je suis un message de test :)</span>
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
                <form>
                    <input placeholder="Votre message" id="buffer" type="text" />
                </form>
            </div>
            <div id="liste">

            </div>
        </div>
        <?php nav(); ?>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]) ?>
    </body>
</html>