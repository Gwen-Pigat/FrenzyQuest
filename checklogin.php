<?php 

session_start();

include "include/header.php";

$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "members";


mysql_connect("$host","$username","$password")or die("Cannot connect");	
mysql_select_db("$db_name")or die("cannot select DB");


$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

$result = mysql_query($sql);


$count = mysql_num_rows($result);


	if ($count == 1) {
		

		$_SESSION['myusername']=$myusername;
		$_SESSION['mypassword']=$mypassword;

		// session_register("myusername");
		// session_register("mypassword");
		header('Location: login_success.php');

	}

	else{	
		echo "Wrong username or password";
	}

 ?>