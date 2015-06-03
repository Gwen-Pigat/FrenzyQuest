<?php 

session_start();

if (empty($_SESSION['myusername'])) {

	session_start();
	session_destroy();

	header('Location: index.html');
}

include "include/header.php"; 

extract($_POST);

$host = "localhost";
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";

$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>

<div class="liste-defis">

<h2>Mes défis</h2>


<?php 

$sql = "SELECT * FROM quests WHERE Expediteur='$_SESSION[myusername]'";

$result = mysql_query($sql);



	while ($row = mysql_fetch_assoc($result)) {
		echo ("<ul><li><strong>Défi</strong> : '$row[Defi]' <br />
					   <strong>Catégorie</strong> : '$row[Type]' <br />
					   <strong>Description</strong> : '$row[Description]' <br />
					   Ce défi est actuellement : <br /><strong>'$row[Validation]'</strong><br />
			   		   <strong>Prime</strong> : '$row[Bounty] C' <br />
			   </li></ul>");
	}

?>

 </div>