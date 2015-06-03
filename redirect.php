<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<meta charset="utf-8">

<?php 

 $base = mysql_connect("localhost","root","motdepasselocalhostgwen");
         mysql_select_db("QuitDouble", $base);
$query = mysql_query("SELECT * FROM members WHERE username='$_POST[myusername]' OR email='$_POST[email]'");


if (mysql_num_rows($query)) { ?>

<div class="container text-center">
  <br><br>
  <p><strong>Nom ou adresse e-mail déja utilisé</strong></p><br />
<a href="creation-compte.php">
<button class="btn btn-purple">Ré-essayer</button> </a>

  
 <?php }

else { ?>

Bienvenue à vous "<strong><?php echo $_POST["myusername"]; ?></strong>" !!<br />
Votre compte à bien été crée !!

<br>

<a href="index.html"><button>Se connecter</button></a>


<?php

//ENVOI EN BDD

  if (isset($_POST) && isset($_POST['myusername']) && isset($_POST['mypassword']) && isset($_POST['email']) && isset($_POST['telephone'])) {
    if(!empty($_POST['myusername']) && !empty($_POST['mypassword']) && !empty($_POST['email']) && !empty($_POST['telephone'])){

      extract($_POST);
      $credit = 10;

      $base = mysql_connect("localhost","root","motdepasselocalhostgwen");
      mysql_select_db("QuitDouble", $base);
      mysql_query("INSERT INTO members(username, password, email, telephone, credits) VALUES ('$myusername', '".md5($mypassword)."', '$email', '$telephone', '$credit')");

      mysql_close();
      
    }
  }


//PHPMAILERl

  if (isset($_POST) && isset($_POST['myusername']) && isset($_POST['mypassword']) && isset($_POST['email']) && isset($_POST['telephone'])) {
    if(!empty($_POST['myusername']) && !empty($_POST['mypassword']) && !empty($_POST['email']) && !empty($_POST['telephone'])){


    extract($_POST);


    require "PHPMailer/class.phpmailer.php";

    $mail = new phpmailer();

    $mail->FromName = "Nouveau membre - QuitDouble";
    $mail->Subject = "$myusername - $email";
    
    $body = "Un nouveau membre a rejoint la meute :\n\n\n
    Nom :           $myusername \n
    Mot de passe :        $mypassword \n
    Email :       $email \n
    Téléphone :         $telephone\n\n\n\n\n


    J’accepte les CGV et donne expressément mandat à la société LEGASPHERE de saisir en mon nom et pour mon compte la juridiction compétente.\n\n\n

    Le robot achat Toutelajustice.com.\n
    ---------------------------------------\n
    Ceci est un mail automatique, Merci de ne pas y répondre.";

    $mail->Body = $body;

    // Add a recipient address
    $mail->AddAddress('0651148158','pixofheaven@gmail.com');

    if(!$mail->Send())
        echo ('');
    else
        echo ('');
    }

  }

}

 ?>