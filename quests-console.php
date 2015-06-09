<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Les défis</title>

<?php 

$sql = "SELECT Destinataire FROM SendQuest WHERE Destinataire='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

 ?>

<div class="container text-center">
<br><br><br><br>
	<a href="mes-defis.php"><button class='btn-lg btn-primary'>Mes défis</button></a>
	<?php if ($row){ ?>
	<a href="mes-defis-recus.php"><button class='btn-lg btn-danger'>Défis recus</button></a>	
	<?php } ?>
</div>

<br><br>

<center>
<a href="login_success.php"><button class="btn btn-purple">Retour</button></a>
</center>