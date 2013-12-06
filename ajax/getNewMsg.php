<?php

	require_once '../lib/securiter.php';
    session_start();
    if(!isLogged()){
        header("Location: ..");
    }

    require_once '../login.inc';
    require_once '../lib/sql.php';

    if (verifContactSQL($_POST["id"],$_SESSION["user_id"])) {
    	foreach (getNewMsg($_POST["id"],$_SESSION["user_id"]) as $msg) {
    		?>
    		<div class="msg" title="<?php echo $msg["time"]; ?>">
    			<span class="perso"><?php echo $msg["pre_emeteur"][0] . $msg["nom_emeteur"][0]; ?> ></span>
    			<span class="dire"><?php echo $msg["msg"]; ?></span>
    		</div>
    		<?php
    	}
    }

?>