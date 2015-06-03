<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2><i class="fa fa-users"></i> Liste des utilisateurs</h2>

<?php

$sql = "SELECT * FROM $tbl_name WHERE username!='$_SESSION[myusername]'";
$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
	echo "<li><a href=fiche-profile.php?user=$row[id]><strong><i class='fa fa-user'></i> $row[username]'</strong></a><br /></li>";
}

?>

</div>

<a class="text-center" href="login_success.php">
	<button class="btn btn-purple">Retour</button></a>