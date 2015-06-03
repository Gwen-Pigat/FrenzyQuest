<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "Amis";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

if (isset($_GET['add'])) {

	$row = mysql_query("SELECT * FROM members");
	$result_m = mysql_fetch_assoc($row);

	$sql = mysql_query("INSERT INTO Amis (Utilisateur_first, Utilisateur_second) VALUES ($result_m[id], $_GET[add])") or die("Erreur : " .mysql_error());

	$result = mysql_fetch_assoc($sql);

header('Location: ../liste-utilisateurs.php');
}

else{
	echo "Erreur :( !!";
}




?>