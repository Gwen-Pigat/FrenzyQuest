<?php 

session_start();

if (isset($_SESSION['myusername']) && !empty($_SESSION['myusername'])) {


extract($_POST);
$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";
$result = mysqli_query($link ,$sql);
$row = mysqli_fetch_assoc($result);

    echo "Salut <span class='user'> $_SESSION[myusername] </span> !!      
    <a href=php/logout.php><button class='btn btn-warning container'><i class='glyphicon glyphicon-user'></i> Déconnexion</button></a><br />";
    if ($row['credits'] < 1) {
   	echo "Crédits : <span class='danger'> $row[credits] <i class='glyphicon glyphicon-piggy-bank'></i></span>";
    }
    else{
    echo "Crédits : <span class='user'> $row[credits] <i class='glyphicon glyphicon-piggy-bank'></i></span>";
	}
}

else{
	header('Location: php/logout.php');
}

$sql = "SELECT * FROM SendQuest WHERE Destinataire='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if ($row["Statut"] == "En attente") { ?>
<br>
<div class="absolute red">
<a href="quests-console.php"><img src="icons/quest_new.png" width="25"> Défi disponible</a>
</div>
<?php }

elseif($row['Statut'] == "En cours"){ ?>
<br>
<div class="absolute blue">
<a href="quests-console.php"><img src="icons/quest_load.png" width="25"> Défi en cours</a>
</div>
<?php } ?>
