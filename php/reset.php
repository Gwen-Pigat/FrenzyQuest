<?php 

session_start();

include "../include/header.php"; 

extract($_POST);

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


$sql = "SELECT * FROM $tbl_name";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

$base = 0;

$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

header('Location: ../login_success.php');

?>