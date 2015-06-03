<div class="container text-center">

<a href="liste-utilisateurs.php">
<button class="btn btn-info"><i class="fa fa-users"> Liste des utilisateurs </i></button></a>
<br><br>
<a href="defi.php">
<button class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Proposer un défi</button></a>

<?php if ($_SESSION['myusername'] == "Admin") { ?>

<br><br>

<a href="liste-des-defis.php">
<button class="btn btn-primary">Liste des défis</button></a>
<br><br>
<form action="php/ajout-credit.php" method="POST">
<button class="btn btn-primary">+10 C</button>
</form>
<form action="php/reset.php" method="POST">
<button class="btn btn-primary">Reset</button>
</form>

<?php } ?>

</div>