<?php include "../include/header.php";  include "../include/connexion.php"; ?>


<title>Friends Request</title>


<?php

if (isset($_SESSION['myusername'])) {

	if (isset($_GET['accept_quest'])) {

		$start = date("Y-m-d H:i:s");
		$end = date("Y-m-d H:i:s", time()+24*3600);

		$id = $_GET['accept_quest'];
		$sql = "UPDATE SendQuest SET Statut='En cours', Start='$start', End='$end' WHERE id_quest='$id' ";
		$result = mysqli_query($link, $sql); ?>

		<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-check-circle-o fa-2x'></i>La quête débute maintenant !!!
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
		</div>

<?php }

	elseif (isset($_GET['refuse_quest'])) {

		$id = $_GET['refuse_quest'];
		$sql = "UPDATE SendQuest SET Statut='Refusé' WHERE id_quest='$id'";
		$result = mysqli_query($link, $sql); ?>

		<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-ban fa-2x'></i>Quête refusée
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
		</div>

<?php }

	else{
		echo "Erreur, veuillez recommencer";
	}

}

header("Refresh: 2; url=../quests-console.php");

?>