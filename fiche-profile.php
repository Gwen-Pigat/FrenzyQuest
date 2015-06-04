<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Profil</title>

<div class="liste-defis">

	<?php if (isset($_GET['user']) && !empty($_GET['user'])){ 

		$sql = mysql_query("SELECT * FROM members WHERE id='$_GET[user]'");
		$row = mysql_fetch_assoc($sql);

	?>

	<h2><i class="fa fa-user"></i> <?php echo $row['username']; ?></h2>

	<?php } else{ header('Location: liste-utilisateurs.php'); } ?>

	<?php 

	$myaccount = $_SESSION['myusername'];
	$user = $_GET['user'];

	if ($user != $myaccount) {

			$sql = mysql_query("SELECT * FROM members WHERE username='$_SESSION[myusername]'");
			$row = mysql_fetch_assoc($sql);

			$friend = mysql_query("SELECT * FROM Amis WHERE (Utilisateur_first='$row[id]' AND Utilisateur_second='$user') OR (Utilisateur_first='$user' AND Utilisateur_second='$row[id]')");	

			if (mysql_num_rows($friend) == 1) {
				echo "<p>Cet utilisateur est votre ami</p><br />
					  <a href='php/delete-friend.php?delete=$user'>
					  <button class='btn btn-danger'><i class='fa fa-user-times'> Enlever </i></button></a>";
			}
			else{

				// $sql = mysql_query("SELECT * FROM members WHERE username='$_SESSION[myusername]'");
				// $row = mysql_fetch_assoc($sql);

				// $to_query = mysql_query("SELECT id FROM RequeteAmi WHERE Nom='$row[id]' AND Invite='$user'");
				// $from_query = mysql_query("SELECT id FROM RequeteAmi WHERE Nom='$user' AND Invite='$myaccount'");

				// if (mysql_num_rows($from_query) == 1) {
				// 	echo "<a href='#' class='btn btn-purple'>Ignore</a> | <a href='#' class='btn btn-purple'>Accept</a>";
				// }

				// elseif (mysql_num_rows($to_query) == 1) {
				// 	echo "<a href='#'>Cancel request</a>";
				// }
				
				// else{
				// 	echo "<a href='actions.php?action=send&user=$user'>Send Friend request</a>";
				// }

				echo "<p>Cet utilisateur ne fait pas encore partie de votre liste d'amis</p><br />
					  <a href='php/add-friend.php?add=$user'>
					  <button class='btn btn-success'><i class='fa fa-user-plus'> Ajouter </i></button></a>";
			}	
	} 

	?>

</div>

	<a class="text-center" href="liste-utilisateurs.php">
	<button class="btn btn-purple">Retour</button></a>