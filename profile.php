<?php 

session_start();

include "include/header.php"; 

extract($_POST);
$host = "localhost"; $username = "root"; $password = "motdepasselocalhostgwen"; $db_name = "QuitDouble"; $tbl_name = "members";
mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

		echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class=btn btn-danger>se déconnecter ?</button></a>
		Vous disposez de : '<strong>$row[credits] C</strong>'";

?>

<title>Profil</title>

<div class="liste-defis">

	<?php if (isset($_GET['user']) && !empty($_GET['user'])): ?>

	<h2><?php echo $_GET['user']; ?></h2>

	<?php endif ?>

	<?php 


	$myaccount = $_SESSION['myusername'];
	$user = $_GET['user'];

	if ($user != $myaccount) {

		$friend = mysql_query("SELECT id FROM Amis WHERE (Utilisateur_first='$myaccount' AND Utilisateur_second='$user') OR (Utilisateur_first='$user' AND Utilisateur_second='$myaccount')");	

		$result = mysql_fetch_assoc($friend);

		if ($result == 1) {
			echo "Already Friends";
		}
		else{
			echo "Pas ami";
		}
	} 



	?>

