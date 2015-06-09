<?php 

session_start();

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

if (isset($_GET['add'])) {

	$row = mysqli_query("SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'");
	$result_m = mysqli_fetch_assoc($row);

	$sql = mysqli_query("INSERT INTO Amis (Utilisateur_first, Utilisateur_second) VALUES ($result_m[id], $_GET[add])") or die("Erreur : " .mysqli_error());

	$result = mysqli_fetch_assoc($sql);

header('Location: ../liste-utilisateurs.php');
}

else{
	echo "Erreur :( !!";
}




?>