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

    $talk = -1;
    if (isset($_GET["talk"]) && verifPerso($_GET["talk"])==1 && verifContactSQL($_GET["talk"],$_SESSION['user_id'])) {
        $talk = $_GET["talk"];
        $all = getConversation($_SESSION['user_id'],$talk);
        marckRead($talk,$_SESSION['user_id']);
        $perso = getOpenConversations($_SESSION['user_id']);
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vos Messages</title>
        <?php head() ?>
        <script type="text/javascript">
            var current = <?php echo $talk; ?>;
            window.onload=function() {
                getConversation(current);
                openConversation(current);
                setInterval(function(){getNewMsg(current)},1000);
                setInterval(function(){getConversation(current)},5000);
                document.getElementById("buffer").focus();
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
                <div id='scrollpane'>
                    <br />
                    <br />
                    <br />
                    <br />
                    <span class="label">Selectionner une conversation pour l'afficher.</span>
                </div>
                <form onsubmit="sendMsg(current);return false;" >
                    <input placeholder="Votre message" id="buffer" type="text" autocomplete="off" />
                </form>
            </div>
            <div id="liste">
            </div>
        </div>
        <?php nav(); ?>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]) ?>
    </body>
</html>