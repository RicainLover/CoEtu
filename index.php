<?php
	session_start();
	$err = "";
	require_once 'lib/sql.php';
	if(isset($_POST["em"]) && isset($_POST["mp"])){
		if(!verifConnexion($_POST["em"], $_POST["mp"])){
			$err = "erreur login";
		}
        else{
			getIDEtudiant();
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
			<span>Ici ce place la description du site ou une phrase.</span>
		</div>
		<div class="err">
<?php echo $err; ?>
		</div>
		<div class="bigbox">
			<div class="desc">
				<h2>Créer un compte</h2>
				<p>et la du bla bla avant de creer son compte car j'ai envie de metre du blabla meme sis c'est archi nul et que ca sert à rien et que c'est vraiment archi nul. il y en a qui mettent des truc en lation ici colcomme ca on comprend rien au betise qu'ils ecrivent.</p>
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
						<input name="annee" type="text" />
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
	</body>
</html>