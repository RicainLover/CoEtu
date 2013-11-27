<?php

	session_start();
	if (isset($_SESSION["user_id"])) {
		unset($_SESSION["user_id"]);
		echo "user deconnected";
	}
	else {
		echo "no user connected";
	}

?>