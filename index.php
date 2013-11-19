<?php

	date_default_timezone_set("Europe/Paris");
	session_start();

	$err = "";
	require_once 'lib/sql.php';
	if(isset($_POST["em"]) && isset($_POST["mp"])){
		if(!verifConnexion($_POST["em"], $_POST["mp"])){
			$err = "erreur login";
		}
        else{
			$_SESSION["user_id"] = getIDEtudiant($_POST["em"]);
			header("Location: home/index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='css/connec.css' />
		<script type='text/javascript' src='connec.js' ></script>
	</head>
	<body>
		<div class="connec">
			<form name="connec" method="post">
				<table>
					<tr>
						<td>
							<input value="Email" class="em" id="em" name="em" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<input value="Mot de passe" class="mp" name="mp" id="mp" type="password" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Connexion" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="titre">
			<h1>Freetu</h1>
			<span>Voyager n'a jamais été aussi simple</span>
		</div>
		<div class="err">
			<?php echo $err; ?>
		</div>
		<form name="insc" >
			<div class="bigbox">
				<div class="desc">
					<h2>Créer un compte</h2>
					<p> Rejoignez notre réseau de co-voiturage en quelques secondes, c'est simple, rapide et efficace</p>
					<input type="submit" value="GO" />
				</div>
				<table>
					<tr>
						<td>
							<label for="pre">Prénom: </label>
							<input name="pre" id="pre" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="nom">Nom: </label>
							<input name="nom" id="nom" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">Email: </label>
							<input name="email" id="email" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="ine">Date de naissance: </label>
							<select name="mois" >
								<?php
								for ($i=1; $i<=12; $i++) { 
									echo "<option value='" . $i . "'>" . $i . "</option>";
								}
								?>
							</select>
							<select name="annee" >
								<?php
								for ($i=date("Y"); $i>=date("Y")-100; $i--) { 
									echo "<option>" . $i . "</option>";
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
 						<td>
							<label for="camp">Campus: </label>
							<input name="camp" id="camp" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="vil">Ville: </label>
							<input name="vil" id="vil" type="text" />
						</td>
					</tr>

					<tr>
						<td>
							<label for="pass">Mot de passe: </label>
							<input name="pass" id="pass" type="password" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="pass2">Confirmer: </label>
							<input name="pass2" id="pass2" type="password" />
						</td>
					</tr>
				</table>
			</div>
		</from>
	</body>
</html>