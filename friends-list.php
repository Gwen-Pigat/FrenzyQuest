<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>FrenzyQuest | Liste d'amis</title>

<div class="liste-defis">

	<h2><i class="fa fa-users"></i> Amis</h2>

<?php

$sql_liste = "SELECT id FROM members WHERE username='$_SESSION[myusername]'"; 
$result_liste = mysql_query($sql_liste);

$row_liste = mysql_fetch_assoc($result_liste);


$sql = "SELECT * FROM Amis WHERE (Utilisateur_first!='$row_liste[id]') OR (Utilisateur_second!='$row_liste[id]')";
$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {

	echo "<li>$row[Utilisateur_second]</li>";
}

?>

</div>

<a class="text-center" href="login_success.php"><button class="btn btn-purple">Retour</button></a>