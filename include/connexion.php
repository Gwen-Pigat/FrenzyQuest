<?php 

session_start();

extract($_POST);
$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

mysql_connect("$host","$username","$password")or die("Cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

    echo "Loggé en tant que : <strong>'$_SESSION[myusername]'</strong> , <a href=index.html><button class='btn btn-warning'><span class='glyphicon glyphicon-user'></span> Déconnexion</button></a>
    Vous disposez de : '<strong>$row[credits] C</strong>'";


?>