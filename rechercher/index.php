<?php

    session_start();
    require_once '../lib/html.php';
    require_once '../lib/securiter.php';
    if(!isLogged()){
        header("Location: ..");
    }
    require_once '../login.inc';
    require_once '../lib/sql.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Recherche</title>
        <?php head() ?>
        <script type="text/javascript">
            window.onload=function() {
                var txt = document.getElementById("rh").value;
                document.getElementById("rh").focus();
                document.getElementById("rh").value =  txt;
                recherche();
            }
        </script>
    </head>
    <body>
        <div id="titre">
            <h1>Recherche</h1>
            <span>Voyager n'a jamais été aussi simple</span>
        </div>
        <div id="recherche">
            <br />
            <!-- <div class="voyage" onclick="pop_show()">
                <img src="../img/car.png" />
                <h5>Lille ⟷ Belfort</h5>
                <span class="date">11 juil. 1993</span>
                <br />
                <span class="conduc">Machin Bidule</span>
            </div>-->
        </div>
        <?php boxuser(getNom($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
        <?php nav(); ?>
    </body>
</html>