<?php 

session_start();

include "include/header.php"; 

extract($_POST);

$_POST['myusername'] = $_SESSION['myusername'];

$host = "localhost"; 
$username = "root"; 
$password = "war12wick69bass"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

$sql = "SELECT credits FROM $tbl_name WHERE username='$_SESSION[myusername]'";

$result = mysql_query($sql);

$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.php><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>

<h1>Mon profil</h1>

<p>Nom d'utilisateur : <?php echo $_SESSION['myusername'] ?></p>
<p>Mot de passe : <?php echo $_SESSION['mypassword'] ?></p>
<p>Email : <?php echo $_SESSION['email'] ?></p>
<p>Téléphone : <?php echo $_SESSION['telephone'] ?></p>