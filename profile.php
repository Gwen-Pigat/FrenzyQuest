<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Profil</title>

<div class="liste-defis">

	<?php if (isset($_GET['user']) && !empty($_GET['user'])){ 

		$user = $_GET['user'];

		?>

	<h2><?php echo $_GET['user']; ?></h2>

	<?php } ?>

	<?php 


	$myaccount = $_SESSION['myusername'];
	

	if ($user != $myaccount) {

		$friend = mysql_query("SELECT id FROM Amis WHERE (Utilisateur_first='$myaccount' AND Utilisateur_second='$user') OR (Utilisateur_first='$user' AND Utilisateur_second='$myaccount')");	

		$result = mysql_fetch_assoc($friend);

		if ($result == 1) {
			echo "<p>Already Friends</p>";
		}
		else{
			echo "<p>Pas ami</p>";
		}
	} 



	?>

