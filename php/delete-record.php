<?php 

session_start();

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "quests";


mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


if (isset($_GET['del']) ) {
	$id = $_GET['del'];
	$sql = "DELETE FROM quests WHERE id='$id'";
	$result = mysql_query($sql) or die("Failed".mysql_error());
	echo "<meta http-equiv='refresh' content='0;url=../liste-des-defis.php'>"; 
}

?>