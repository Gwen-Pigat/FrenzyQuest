<script type="text/javascript">

var xhr = new XMLHttpRequest();
 
// Lorsqu'un réponse est émise par le serveur
xhr.onreadystatechange = function() {
    if (xhr.status == 200 && xhr.readyState == 4) {
        document.getElementById('content').innerHTML = xhr.responseText;
         
        // xhr.responseText contient exactement ce que la page PHP renvoi
    }
};
 
xhr.open('GET', 'session.php');

</script>


<?php 

session_start();



$host = "localhost";
$username = "root";
$password = "motdepasselocalhostgwen";
$db_name = "QuitDouble";
$tbl_name = "members";

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

$link = mysqli_connect("$host","$username","$password","$db_name");	
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='".md5($mypassword)."'";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

	if ($row){
		$_SESSION['myusername'] = $myusername;
		$_SESSION['mypassword'] = $mypassword;
		header('Location: login_success.php');
	}
	else{	
		echo "<h1>Mauvais mot de passe ou nom d'utilisateur !!</h1>";
		header('Refresh: 2;url=index.html');
	}

?>