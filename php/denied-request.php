<?php include "../include/header.php" ?>
<?php include "../include/connexion.php" ?>

<?php  

$myaccount = $_SESSION['myusername'];
$user = $_GET['user'];

$sql = "SELECT username FROM members WHERE id='$user'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$user = $row['username'];

$ajout = date("Y-m-d H:i:s");

	mysqli_query("DELETE FROM RequeteAmi WHERE (Nom='$myaccount') AND (Invite='$user)");
	mysqli_query("DELETE FROM RequeteAmi WHERE (Nom='$user') AND (Invite='$myaccount')");

?>

<div class="container text-center">

	<br><br><br>
	<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Invitation refusée
	<br><br><br><br><br>
		<i class='fa fa-spinner fa-pulse fa-5x'></i>
	
</div>

<?php header('refresh: 1; url=../liste-utilisateurs.php'); ?>