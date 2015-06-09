<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2><i class="fa fa-users"></i> Utilisateurs</h2>

<?php

$sql = "SELECT * FROM $tbl_name WHERE username!='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);
$quest = $_GET['quest'];


	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li><a href='quest.php?quest=$quest&send-to=$row[id]'><strong><i class='fa fa-user'></i> $row[username]</strong></a><br />
			<a href='quest.php?quest=$quest&send-to=$row[id]'>
			<button class='btn btn-warning'>Envoyer</button></li></a>";
	}

?>

</div>

<a class="text-center" href="login_success.php">
	<button class="btn btn-purple">Retour</button></a>