<?php 

session_start();

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

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2>Liste des utilisateurs</h2>

<?php

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "members";


mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


$sql = "SELECT * FROM $tbl_name WHERE username!='$_SESSION[myusername]'";


$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
	echo "<li><a href=profile.php?user=$row[username]><strong>'$row[username]'</strong></a><br /></li>";
}

?>

</div>

<center>
<a href="defi.php">
<button class="btn-lg btn-purple">Proposer un défi</button></a>
<a href="login_success.php">
<button class="btn-lg btn-purple">Accueil</button></a>
</center>