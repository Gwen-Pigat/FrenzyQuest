<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<div class="container text-center">

<h1>Bienvenue à vous <strong>'<?php echo $_SESSION['myusername']; ?>'</strong> !!</h1>



<a href="liste-utilisateurs.php">
<button class="btn btn-info">Liste des utilisateurs</button></a>

<a href="defi.php">
<button class="btn btn-success">Proposer un défi</button></a>

<?php if ($_SESSION['myusername'] == "Admin")
{	
?>

<br><br>

<a href="liste-des-defis.php">
<button class="btn btn-primary">Liste des défis</button></a>




<br><br><br> 
<form action="php/ajout-credit.php" method="POST">
<button class="btn btn-primary">+99 C</button>
</form>
<form action="php/reset.php" method="POST">
<button class="btn btn-primary">Reset</button>
</form>
<?php 
} 
?>


</div>