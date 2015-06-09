<?php include "../include/header.php" ?>
<?php include "../include/connexion.php" ?>

<?php  

$user = $_GET['user'];

$sql = "SELECT username FROM members WHERE id='$user'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$ajout = date("Y-m-d H:i:s");

	mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$_SESSION[myusername]' AND Invite='$row[username]')");

?>

<div class="container text-center">

	<br><br><br>
	<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Requête annulée
	<br><br><br><br><br>
		<i class='fa fa-spinner fa-pulse fa-5x'></i>
	
</div>

<?php header('refresh: 1; url=../liste-utilisateurs.php'); ?>