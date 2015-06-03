<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>FrenzyQuest | Liste d'amis</title>

<div class="liste-defis">

	<h2>Mes amis</h2>

<?php

$row = "SELECT id FROM members WHERE username='$_SESSION[myusername]'"; 
$result_liste = mysql_query($row);

$sql = "SELECT Utilisateur_second FROM Amis WHERE Utilisateur_second!='$row[id]'";
$result = mysql_query($sql);

while (mysql_fetch_assoc($result_liste)) {
	echo "<li>$row[username]</li>";
}

?>

<?php include "include/menu.php"; ?>

</div>