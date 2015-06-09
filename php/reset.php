<?php 

session_start();

extract($_POST);

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");


$sql = "SELECT * FROM $tbl_name";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$base = 0;

$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

header('Location: ../login_success.php');

?>