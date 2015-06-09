<?php include "../include/header.php"; ?>
<?php include "../include/connexion.php"; ?>

<title>Requête accepté</title>


<?php 

$user = $_GET['user'];
$myaccount = $_SESSION['myusername'];

$sql = "SELECT * FROM members WHERE id='$user'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$user = $row['username'];

$sql = "UPDATE RequeteAmi SET Statut='Requête acceptée' WHERE Nom='$user' AND Invite='$myaccount'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM RequeteAmi WHERE Statut='Requête acceptée'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


if ($row['Statut'] == 'Requête acceptée') {
	$sql = "INSERT INTO Amis(Utilisateur_first, Utilisateur_second) VALUES ('$user', '$myaccount')";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
}

?>

<div class="container text-center">

	<br><br><br>
	<h3><i class='fa fa-check-circle-o fa-2x'></i>Cet utilisateur est désormais votre ami
	<br><br><br><br><br>
		<i class='fa fa-spinner fa-pulse fa-5x'></i>
	
</div>


<?php header('refresh: 1; url=../liste-utilisateurs.php'); ?>