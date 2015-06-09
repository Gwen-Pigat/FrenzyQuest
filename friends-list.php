<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>FrenzyQuest | Liste d'amis</title>

<div class="liste-defis">

	<h2><i class="fa fa-users"></i> Amis</h2>

<?php

$myaccount = $_SESSION ['myusername'];


$sql = "SELECT * FROM Amis";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if ($row == 0) {
	echo "<a href='liste-utilisateurs.php'><button class='btn btn-success'><i class='fa fa-user-plus'></i> Ajouter un ami</button></a>";
}
else{
	echo "<li>$row[Utilisateur_first]</li>
	<li>$row[Utilisateur_second]</li>";
}

?>

</div>

<a class="text-center" href="login_success.php"><button class="btn btn-purple">Retour</button></a>