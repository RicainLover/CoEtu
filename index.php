<?php

	date_default_timezone_set("Europe/Paris");
	session_start();

	$err = "";

	require 'login.inc';
	require_once 'lib/sql.php';
	require_once 'lib/bibli.php';

	if(isset($_POST["em"]) && isset($_POST["mp"])){
		if(!verifConnexion($_POST["em"], $_POST["mp"])){
			$err = "erreur login";
		}
        else{
			$_SESSION["user_id"] = getIDEtudiant($_POST["em"]);
			header("Location: home/");
		}
	}
	
	if(isset($_POST['inscription'])){
		if(!isset($_POST['pre']) or $_POST['pre']==""){
			$err=$err."Veuillez fournir le prénom.<br/>";
		}
		if(!isset($_POST['nom']) or $_POST['nom']==""){
			$err=$err."Veuillez fournir le nom.<br/>";
		}
		if(!isset($_POST['email']) or $_POST['email']==""){
			$err=$err."Veuillez fournir l'e-mail.<br/>";
		}
		if(!isset($_POST['camp']) or $_POST['camp']==""){
			$err=$err."Veuillez fournir le campus.<br/>";
		}
		if(!isset($_POST['vil']) or $_POST['vil']==""){
			$err=$err."Veuillez fournir la ville.<br/>";
		}
		if(!isset($_POST['pass']) or $_POST['pass']==""){
			$err=$err."Veuillez fournir le mot de passe.<br/>";
		}
		if(!isset($_POST['pass2']) or $_POST['pass2']==""){
			$err=$err."Veuillez fournir la confimartion du mot de passe.<br/>";
		}
		if(!isset($_POST['mois']) or $_POST['mois']==""){
			$err=$err."Veuillez fournir le mois de naissance.<br/>";
		}
		if(!isset($_POST['annee']) or $_POST['annee']==""){
			$err=$err."Veuillez fournir l'année de naissance.<br/>";
		}
		
		if($err==""){
			if(!email_valid($_POST['email'])){
				$err=$err."Veuillez entrer un e-mail valide !<br/>";
			}
			if($_POST['pass']!=$_POST['pass2']){
				$err=$err."Veuillez entrer un mot de passe identique dans les 2 champs.";
			}			
		}
	}
		//	
	
	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Freetu</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='css/connec.css' />
		<script type='text/javascript' src='connec.js' ></script>
		<script type='text/javascript' src='js/formInscription.js' ></script>
	</head>
	<body>
		<div class="connec">
			<form name="connec" method="post">
				<table>
					<tr>
						<td>
							<input value="" placeholder="Email" class="em" id="em" name="em" type="text" />
						</td>
					</tr>
					<tr>
						<td>
							<input value="" placeholder="Mot de passe" class="mp" name="mp" id="mp" type="password" />
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
			<?php echo $err;?>
			
		</div>
		<form name="insc" method="post">
			<div class="bigbox">
				<div class="desc">
					<h2>Créer un compte</h2>
					<p> Rejoignez notre réseau de co-voiturage en quelques secondes, c'est simple, rapide et efficace</p>
					<input type="submit" name="inscription" value="Valider" />
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
							<label for="camp">Campus: </label>
							<input name="camp" id="camp" type="text" />
							<select name="camp" id="camp">
								
							</select>
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
					<tr>
						<td>
							<label for="ine">Date de naissance: </label>
							<select name="mois" >
								<?php
								for ($i=1; $i<=12; $i++) { 
									echo "<option value='" . $i . "'>" . mois($i) . "</option>";
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
				</table>
			</div>
		</form>
	</body>
</html>