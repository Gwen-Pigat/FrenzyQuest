<?php 


session_start();


if ($_SESSION['myusername'] != 'Admin') {
	header('Location: index.html');
}


include "include/header.php"; 

extract($_POST);
$host = "localhost"; $username = "root"; $password = "motdepasselocalhostgwen"; $db_name = "QuitDouble"; $tbl_name = "members";
mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT * FROM $tbl_name WHERE username='Admin'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>

<div class="liste-defis">

<h2>A valider</h2>


<?php

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "quests";


mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


$sql = "SELECT * FROM $tbl_name WHERE Validation='En attente de validation'";

$result = mysql_query($sql);


while ($row = mysql_fetch_assoc($result)) {
	echo "<li><strong>'$row[Defi]' - '$row[Validation]'</strong></li>

<a href=php/delete-record.php?del=$row[id]>
<button class=btn btn-danger>Enlever</button></a>
	  <a href=php/update-record.php?update=$row[id]>
<button class=btn btn-info>Validé</button></a>
<br><br>";
 } ?>

</div>
<center>
<a href="defi.php">
<button class="btn-lg btn-purple">Proposer un défi</button></a>
<a href="login_success.php">
<button class="btn-lg btn-purple">Accueil</button></a>
</center>