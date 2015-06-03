<?php 

session_start();

include "include/header.php"; 

extract($_POST);

$_POST['myusername'] = $_SESSION['myusername'];

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

$sql = "UPDATE members SET username='$_POST[myusername]'";

$result = mysql_query($sql);

$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.php><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

header('Location: profil.php');

?>



