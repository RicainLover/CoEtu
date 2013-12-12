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
        <title><?php echo selectNomPerso($_SESSION["user_id"]) ?> - Recherche</title>
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
        </div>
        <?php boxuser(selectNomPerso($_SESSION["user_id"]),$_SESSION["user_id"]); ?>
        <?php nav(); ?>
    </body>
</html>