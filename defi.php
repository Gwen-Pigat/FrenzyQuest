<?php 

session_start();

if (empty($_SESSION['myusername'])) {
	session_start();
	session_destroy();

	header('Location: index.html');
}

include "include/header.php"; 

extract($_POST);
$host = "localhost"; $username = "root"; $password = "motdepasselocalhostgwen"; $db_name = "QuitDouble"; $tbl_name = "members";
mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT credits FROM $tbl_name WHERE username='$_SESSION[myusername]'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>



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
<meta charset="utf-8">
	<a href="login_success.php">
	<button class="btn-lg btn-purple">Retour à l'Accueil</button></a>

</div>