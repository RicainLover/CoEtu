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

$id = -1;
if (isset($_POST["id"]) && selectVerifPerso($_POST["id"])==1 && (selectVerificationContact($_POST["id"],$_SESSION['user_id']) || $_POST["id"]==3)) {
	$id = $_POST["id"];
	$all = selectConversation($_SESSION['user_id'],$id);
	updateMsgRead($id,$_SESSION['user_id']);
	$perso = selectOpenConversations($_SESSION['user_id']);

	echo "<h2>" . selectNomPerso($id) . "</h2><div id='scrollpane'>";
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
			?> <span class="char">></span></span>
			<span class="dire"><?php echo $msg["msg"]; ?></span>
		</div>
		<?php
	}
	echo "</div>";
}


?>

<form onsubmit="sendMsg(current);return false;" >
	<input placeholder="Votre message" id="buffer" type="text" autocomplete="off" />
</form>