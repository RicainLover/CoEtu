<?php

	$hash = "";

	if (isset($_GET["mdp"])) {
		$hash = hash("sha256",$_GET["mdp"],null);
	}
	else {
		$_GET["mdp"] = "";
	}

?>

<form>
	<label>MDP: </label>
	<input name="mdp" value="<?php echo $_GET["mdp"] ?>" />
	<input type="submit" value="valider" />
	<br />
	<br />
	<span><?php echo $hash; ?></span>
</form>