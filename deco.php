<?php

	session_start();
	if (isset($_SESSION["user_id"])) {
		unset($_SESSION["user_id"]);
        header("Location: ./");
	}
	else {
		echo "no user connected";
	}

?>