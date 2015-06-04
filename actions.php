<?php include "include/header.php" ?>
<?php include "include/connexion.php" ?>

<?php  

$action = $_GET['action'];
$user = $_GET['user'];


if ($action == 1) {
	mysql_query("INSERT INTO RequeteAmi(Nom, Invite) VALUES ('$_SESSION[myusername]', '$user')");
}

header('Location: fiche-profile.php?user=$user');

?>