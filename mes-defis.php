<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Mes défis</title>

<div class="liste-defis">

<h2>Mes défis</h2>

<?php

$sql = "SELECT * FROM quests WHERE Expediteur='$_SESSION[myusername]'";
$result = mysql_query($sql);

	while ($row = mysql_fetch_assoc($result)) {
		echo "<ul><li><strong>Défi</strong> : '$row[Defi]' <br />
					   <strong>Catégorie</strong> : '$row[Type]' <br />
					   <strong>Description</strong> : '$row[Description]' <br />";
					   ?>
					   <?php if ($row['Validation'] == "En attente de validation") {
					   	echo "<button class='btn btn-danger'>Ce défi est actuellement : <br /><strong>'$row[Validation]'</strong></button><br />";
					   		}
					   		else{
					   	echo "<button class='btn btn-success'>Ce défi est actuellement : <br /><strong>'$row[Validation]'</strong></button><br />
					   		  <a href='send-quest.php?quest=$row[id]'><button class='btn btn-purple'>Envoyer ce défi</button></a>";		
					   		}
					   ?>
					   
			   		   <?php  echo "<button class='btn btn-danger'><strong>Prime</strong> : $row[Bounty] C' </button><br />
			   </li></ul>";
	}

?>

 </div>

<a href="login_success.php"><button class="btn btn-purple center">Retour</button></a>