<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2>Liste des utilisateurs</h2>

<?php

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