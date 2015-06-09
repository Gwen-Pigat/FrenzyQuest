<?php 

include "../include/header.php";
include "../include/connexion.php";

if (isset($_GET['delete'])) {

	$user = $_GET['delete'];

	$sql = "SELECT * FROM members WHERE id='$user'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql = mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$row[username]') OR (Invite='$row[username]')");
	$sql = mysqli_query($link, "DELETE FROM Amis WHERE (Utilisateur_second='$row[username]') OR (Utilisateur_first='$row[username]')");
	$result = mysqli_fetch_assoc($sql);


?>
<div class="container text-center">

	<br><br><br>
	<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Requête annulée
	<br><br><br><br><br>
		<i class='fa fa-spinner fa-pulse fa-5x'></i>
	
</div>

<?php header('refresh: 1; url=../liste-utilisateurs.php');

}

else{
	echo "Une erreur est survenue lors de votre demande de suppression, veuillez ré-essayer ultérieurement !! <br />
		  <button class='btn btn-purple'>Ré-essayer</button>";
}

?>