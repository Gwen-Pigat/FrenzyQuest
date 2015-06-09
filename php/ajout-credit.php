<?php 

session_start();

include "../include/header.php"; 

extract($_POST);

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");


$sql = "SELECT credits FROM $tbl_name WHERE username='Admin'";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


$base = $row['credits'];
$base = $base + 10;


$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

header('Location: ../login_success.php');


?>