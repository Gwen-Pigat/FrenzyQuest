<?php 

session_start();

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "quests";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");


if (isset($_GET['del']) ) {
	$id = $_GET['del'];
	$sql = "DELETE FROM $tbl_name WHERE id='$id'";
	$result = mysqli_query($link, $sql);

	$sql = "DELETE FROM SendQuest WHERE id_quest='$id'";
	$result = mysqli_query($link, $sql);
	echo "<meta http-equiv='refresh' content='0;url=../liste-des-defis.php'>"; 
}

?>