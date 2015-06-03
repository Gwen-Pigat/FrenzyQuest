<?php 

session_start();

if (empty($_SESSION['myusername'])) {

	session_destroy();

	header('Location: index.html');
}

include "include/header.php"; 

extract($_POST);

$_POST['myusername'] = $_SESSION['myusername'];

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");

$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";

$result = mysql_query($sql);

$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>

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