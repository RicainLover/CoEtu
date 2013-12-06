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

    $all = getConversation(5,3);
    marckRead(3,5);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vos Messages</title>
        <?php head() ?>
        <script type="text/javascript">
            var current = <?php if ($_SESSION["user_id"]==5) {echo 3;}else{echo 5;}; ?>;

            window.onload=function() {
                document.getElementById('scrollpane').scrollTop = document.getElementById('scrollpane').scrollHeight;
                setInterval(function(){getNewMsg(current)},2000);
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
                    <?php
                        foreach ($all as $msg) {
                            ?>
                                <div class="msg" title="<?php echo $msg["time"]; ?>">
                                    <span class="perso"><?php 
                                        if ($msg["id_emeteur"]==$_SESSION["user_id"]) {
                                            echo "vous";
                                        }
                                        else {
                                            echo $msg["pre_emeteur"][0] . $msg["nom_emeteur"][0];
                                        }
                                    ?> ></span>
                                    <span class="dire"><?php echo $msg["msg"]; ?></span>
                                </div>
                            <?php
                        }
                    ?>
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