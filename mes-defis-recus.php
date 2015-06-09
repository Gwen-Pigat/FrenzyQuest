<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Les défis</title>

<div class="liste-defis">

	<h2>Défis recus</h2>

<?php 

	$myaccount = $_SESSION['myusername'];

	$sql = "SELECT * FROM SendQuest WHERE Destinataire='$myaccount'";
	$result = mysqli_query($link, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
	
			$sql = "SELECT * FROM quests WHERE id=$row[id_quest]";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);

			echo "<li>L'utilisateur <strong><span class='user'>$row[Expediteur]</span></strong> vous défie !!<br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			Prime : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br><br>
			<a href=''>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Refuser</button></a>
	  		<a href=''>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Accepter</button></a></li></ul>
			<br>";
	}
?>

</div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>
<br><br>