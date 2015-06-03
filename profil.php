<?php 

session_start();

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
<div class="liste-defis">

<h2>Mon profil</h2>


<p>Nom d'utilisateur : <strong>'<?php echo $_SESSION['myusername'] ?>'</strong></p>
<p>Mot de passe : <strong>'<?php echo $_SESSION['mypassword'] ?>'</strong></p>
<p>Email : <strong>'<?php echo $row['email'] ?></strong>'</p>
<p>Téléphone : <strong>'<?php echo $row['telephone'] ?>'</strong></p>

</div>
<!-- 
<a href="modifier-profil.php">
<button class="btn btn-purple">Modifier ?</button></a>
 -->