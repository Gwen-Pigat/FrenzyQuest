<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>


<title>Soumettre un défi</title>

	<div class="container text-center">

		<h4>Votre défi</h4>

			<form class="form-inscription" method="POST" action="submit.php">
				<select class="btn btn-purple"name="select"> 
				   <option value="Autre">Musique</option> 
				   <option value="Trash">Trash</option> 
				   <option value="Musique">Musique</option> 
				   <option value="Sport">Sport</option> 
				</select><br>
				<input maxlength="65" type="text" placeholder="Nom du défi" x-moz-errormessage="Veuillez entrer une adresse e-mail valide" name="defi" required><br>	
				<textarea maxlength="255" type="text" placeholder="Entrez la description de votre défi" style="margin: 0px; height: 59px; width: 290px;" name="description" required></textarea><br>
				<input class="chiffre" type="number" placeholder="Votre mise pour ce défi" name="chiffre" required><br>
				<input class="btn btn-danger" type="submit" value="Envoyer">
			</form>

			<br>
			
			<a href="login_success.php">
			<button class="btn-lg btn-purple">Retour à l'Accueil</button></a>

	</div>