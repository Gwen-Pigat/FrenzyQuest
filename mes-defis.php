<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Mes défis</title>

<div class="liste-defis">

<h2>Mes défis</h2>

<?php

$sql = "SELECT * FROM quests WHERE Expediteur='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);


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

?>

 </div>
<center>
<a href="quests-console.php"><button class="btn btn-purple center">Retour</button></a>
</center>