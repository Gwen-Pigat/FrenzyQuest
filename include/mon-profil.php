<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2>Liste des utilisateurs</h2>

<?php

$sql = "SELECT * FROM $tbl_name WHERE username!='$_SESSION[myusername]'";
$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
	echo "<li><a href=profile.php?user=$row[id]><strong>'$row[username]'</strong></a><br /></li>";
}

?>

</div>

