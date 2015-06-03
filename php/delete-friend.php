<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "Amis";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

if (isset($_GET['delete'])) {

	$sql = mysql_query("DELETE FROM Amis WHERE Utilisateur_second='$_GET[delete]'") or die("Erreur : " .mysql_error());

	$result = mysql_fetch_assoc($sql);

header('Location: ../liste-utilisateurs.php');
}

else{
	echo "Une eereur est survenue lors de votre demande de suppression, veuillez ré-essayer ultérieurement !! <br />
		  <button class='btn btn-purple'>Ré-essayer</button>";
}




?>