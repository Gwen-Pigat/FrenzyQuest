<?php include "../include/header.php" ?>
<?php include "../include/connexion.php" ?>

<?php  

$user = $_GET['user'];

$sql = "SELECT username FROM members WHERE id='$user'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


$ajout = date("Y-m-d H:i:s");

	mysqli_query($link, "INSERT INTO RequeteAmi(Nom, Invite, date) VALUES ('$_SESSION[myusername]', '$row[username]', '$ajout')");

$sql = "SELECT username FROM members WHERE id='$user'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

?>

<div class="container text-center">

	<br><br><br>
	<h3><i class='fa fa-check-circle-o fa-2x'></i> Requête envoyée
	<br><br><br><br><br>
		<i class='fa fa-spinner fa-pulse fa-5x'></i>
	
</div>

<?php header('refresh: 1; url=../liste-utilisateurs.php'); ?>