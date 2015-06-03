<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "ListeAmis";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


if (isset($_GET['add']) ) {

	$id = $_GET['add'];

	$sql = "SELECT * FROM $tbl_name WHERE Nom='$_SESSION[myusername]'";
	$result = mysql_query($sql) or die("Failed".mysql_error());
	$row = mysql_fetch_assoc($result);

	if ($_SESSION['myusername'] == $row['Nom'] && $id == $row['Invite']) {
		echo "Votre demande pour cet utilisateur à déja été envoyée"; 
	}

	else{

	$ajout = date("Y-m-d H:i:s");

	$sql = "INSERT INTO $tbl_name(Nom, Invite, Statut, date) VALUES ('$_SESSION[myusername]', '$id', 0, '$ajout')";
	$result = mysql_query($sql) or die("Failed".mysql_error());
	echo "<meta http-equiv='refresh' content='0;url=../liste-utilisateurs.php'>"; 
	}
}

?>