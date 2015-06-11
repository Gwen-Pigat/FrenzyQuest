<?php include "include/header.php"; include "include/connexion.php"; ?>

<title>Les défis</title>

<?php 


//Quêtes en cours de réalisation

	if (isset($_GET['quest_loading'])) { ?>

	<div class="liste-defis">

		<h2>Défis en cours</h2>

	<?php

	$myaccount = $_SESSION['myusername'];

	$sql_send = "SELECT * FROM SendQuest WHERE Destinataire='$myaccount' AND statut='En cours'";
	$result_send = mysqli_query($link, $sql_send);
	
	while ($row_quest = mysqli_fetch_assoc($result_send)) {

			$sql = "SELECT * FROM quests WHERE id='$row_quest[id_quest]'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			echo "
			<ul><li>Défi de <strong><span class='user'>$row[Expediteur]</span></strong> accepté.<br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			id : <strong><span class='user'>$row[id]</span></strong><br>
			La prime est de : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br>
			<button class='btn btn-success'>Début : $row_quest[Start]</button>
			<button class='btn btn-danger'>Fin : $row_quest[End]</button></li></ul><br>
			<center><button style='margin: auto' class='btn btn-purple'>Vous avez fini ?</button></center>";
	}
?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>

<?php } 


//Quêtes recues


	elseif (isset($_GET['quest_receive'])) { ?>

	<div class="liste-defis">

		<h2>Défis recus</h2>

	<?php

	$myaccount = $_SESSION['myusername'];

	$sql_send = "SELECT * FROM SendQuest WHERE Destinataire='$myaccount' AND statut='En attente'";
	$result_send = mysqli_query($link, $sql_send);

	if (mysqli_num_rows($result_send) == 0) {
			echo "<center><a href='defi.php'><button class='btn btn-danger'>
			<i class='glyphicon glyphicon-edit'></i> Aucune défi ? Lancez-vous !!</button></a></center>";
			}
	
	while ($row_quest = mysqli_fetch_assoc($result_send)) {

			$sql = "SELECT * FROM quests WHERE id='$row_quest[id_quest]'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			echo "<ul><li>L'utilisateur <strong><span class='user'>$row[Expediteur]</span></strong> vous défie !!<br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			id : <strong><span class='user'>$row[id]</span></strong><br>
			Prime : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br>
			<a href='php/quests-choice.php?refuse_quest=$row_quest[id_quest]'>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Refuser</button></a>
	  		<a href='php/quests-choice.php?accept_quest=$row_quest[id_quest]'>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Accepter</button></a></li></ul>
			<br>";
	}
?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>

<?php } 



//Quêtes refusées

	elseif (isset($_GET['quest_refused'])) { ?>

	<div class="liste-defis">

		<h2>Défis refusés</h2>

	<?php

	$myaccount = $_SESSION['myusername'];

	$sql_send = "SELECT * FROM SendQuest WHERE Destinataire='$myaccount' AND statut='Refusé'";
	$result_send = mysqli_query($link, $sql_send);

	if (mysqli_num_rows($result_send) == 0) {
			echo "<center><a href='defi.php'><button class='btn btn-success'>
			<i class='glyphicon glyphicon-edit'></i> Aucune défi ? Lancez-vous !!</button></a></center>";
			}
	
	while ($row_quest = mysqli_fetch_assoc($result_send)) {

			$sql = "SELECT * FROM quests WHERE id='$row_quest[id_quest]'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			echo "<ul><li>L'utilisateur <strong><span class='user'>$row[Expediteur]</span></strong> vous défie !!<br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			id : <strong><span class='user'>$row[id]</span></strong><br>
			Prime : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br>
			<a href='php/quests-choice.php?refuse_quest=$row_quest[id_quest]'>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Refuser</button></a>
	  		<a href='php/quests-choice.php?accept_quest=$row_quest[id_quest]'>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Accepter</button></a></li></ul>
			<br>";
	}
?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>

<?php } 



//Quêtes terminées

	elseif (isset($_GET['quest_done'])) { ?>

	<div class="liste-defis">

		<h2>Défis terminés</h2>

	<?php

	$myaccount = $_SESSION['myusername'];

	$sql_send = "SELECT * FROM SendQuest WHERE Destinataire='$myaccount' AND statut='Validé'";
	$result_send = mysqli_query($link, $sql_send);

	if (mysqli_num_rows($result_send) == 0) {
	echo "<center><a href='defi.php'><button class='btn btn-warning'>
	<i class='glyphicon glyphicon-edit'></i> Aucune défi ? Lancez-vous !!</button></a></center>";
	}
	
	while ($row_quest = mysqli_fetch_assoc($result_send)) {

			$sql = "SELECT * FROM quests WHERE id='$row_quest[id_quest]'";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			echo "<ul><li>L'utilisateur <strong><span class='user'>$row[Expediteur]</span></strong> vous défie !!<br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			id : <strong><span class='user'>$row[id]</span></strong><br>
			Prime : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br>
			<a href='php/quests-choice.php?refuse_quest=$row_quest[id_quest]'>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Refuser</button></a>
	  		<a href='php/quests-choice.php?accept_quest=$row_quest[id_quest]'>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Accepter</button></a></li></ul>
			<br>";
	}
?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>

<?php } 


//Mes défis

	elseif (isset($_GET['quests'])) { ?>

	<div class="liste-defis">

		<h2>Mes défis</h2>

	<?php

$sql = "SELECT * FROM quests WHERE Expediteur='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0) {
	echo "<center><a href='defi.php'><button class='btn btn-success'>
	<i class='glyphicon glyphicon-edit'></i> Aucune défi ? Lancez-vous !!</button></a></center>";
}

else{

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<ul><li><strong>Défi</strong> : '$row[Defi]' <br />
					   <strong>Catégorie</strong> : '$row[Type]' <br />
					   <strong>Description</strong> : '$row[Description]' <br /><br />";
					   ?>
					   <?php if ($row['Validation'] == "En attente de validation") {
					   		echo "<button class='btn btn-danger'><strong>Défi '$row[Validation]'</strong></button>";
					   		}
					   		else{
					   		echo "<button class='btn btn-success'><strong>Défi '$row[Validation]'</strong></button>
					   		  <a href='send-quest.php?quest=$row[id]'><button class='btn btn-warning'>Envoyer ce défi</button></a>";		
					   		}

					   		$sql_credits = "SELECT credits FROM members WHERE username ='$_SESSION[myusername]'";
							$result_credits = mysqli_query($link, $sql_credits);
							$row_credits = mysqli_fetch_assoc($result_credits);

					   		if ($row['Bounty'] > $row_credits['credits']) {
					   		echo "<button class='btn btn-danger'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i> </button><br><br>
			   				</li></ul>";	
					   		}
					   		else{
				   			echo "<button class='btn btn-success'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i> </button><br><br></li></ul>";
					   		}
	}
}

?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>

<?php } 


//Page de base, chaque button applique une méthode GET et génère dynamiquement le contenu des conditions précédentes

else{

$sql = "SELECT * FROM SendQuest WHERE Destinataire='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);




 ?>

<div class="container text-center">
<br><br><br><br>

	<?php 

	echo "<a href='quests-console.php?quests=$row[Destinataire]'><button class='btn-lg btn-primary'>Mes défis</button></a><br><br>";

		if ($row['Statut'] == "En attente" || $row['Statut'] == "En cours" || $row['Statut'] == "Terminé" || $row['Statut'] == "Refusé"){
	echo "<a href='quests-console.php?quest_receive=$row[Destinataire]'><button class='btn btn-danger'>Recus</button></a>";	
	echo "<a href='quests-console.php?quest_loading=$row[Destinataire]'><button class='btn btn-info'>En cours</button></a><br>";
	echo "<a href='quests-console.php?quest_done=$row[Destinataire]'><button class='btn btn-warning'>Terminés</button></a>";		
	echo "<a href='quests-console.php?quest_refused=$row[Destinataire]'><button class='btn btn-success'>Refusés</button></a>";	
	 }

	// elseif ($row['Statut'] == "En cours"){ 
	// echo "<a href='quests-console.php?quest_loading=$row[Destinataire]'><button class='btn-lg btn-info'>Défis en cours</button></a><br>";	
	//  }

	// elseif ($row['Statut'] == "Terminé"){ 
	// echo "<a href='quests-console.php?quest_done=$row[Destinataire]'><button class='btn-lg btn-success'>Défis terminés</button></a><br>";	
	//  }
	// elseif ($row['Statut'] == "Refusé"){ 
	// echo "<a href='quests-console.php?quest_refused=$row[Destinataire]'><button class='btn-lg btn-success'>Défis refusés</button></a>";	
	//  } 

	 ?>

</div>

<br><br>

<center>
<a href="login_success.php"><button class="btn btn-purple">Retour</button></a>
</center>

<?php } ?>