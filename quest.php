<?php include "include/header.php"; include "include/connexion.php";

	  
if (isset($_SESSION['myusername']) && !empty($_SESSION['myusername'])) {

      $myaccount = $_SESSION['myusername'];
      $user = $_GET['send-to'];

      $sql = "SELECT * FROM members WHERE id='$user'";
      $result = mysqli_query($link, $sql);
      $row = mysqli_fetch_assoc($result);


     echo "<h3><i class='fa fa-check fa-2x'></i> Défi envoyé à :<br />
     <strong><h2>'".$row['username']."'<h2></strong></h3>
     <br /><br /><br /><em><i class='fa fa-circle-o-notch fa-spin'></i> Vous allez être redirigé automatiquement</em>";
	

	  $user = $_GET['send-to'];
	  $quest = $_GET['quest'];

    $sql = "SELECT * FROM members WHERE id='$user'";
	  $result = mysqli_query($link, $sql);
	  $row = mysqli_fetch_assoc($result);

	  $sql_quest = "SELECT * FROM quests WHERE id='$quest'";
	  $result_quest = mysqli_query($link, $sql_quest);
	  $row_quest = mysqli_fetch_assoc($result_quest);


    $sql = "INSERT INTO SendQuest(Expediteur, Destinataire, id_quest) VALUES ('$myaccount', '$row[username]', '$quest')";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

	//PHPMAILERl

    // require "PHPMailer/class.phpmailer.php";

    // $mail = new phpmailer();
    // // $mail->AddStringAttachment($download, 'Facture_'.$nom.'_'.$date.'.pdf');

    // $mail->FromName = "Un utilisateur vous à défié !!";
    // $mail->Subject = "$row_quest[Defi] - Défi proposé";
    
    // $body = "L'utilisateur $_SESSION[myusername] vous à envoyé un défi, voici ses infos :\n\n\n
    // Nom du défi:           $row_quest[Defi]
    // Sa description : $row_quest[Description]\n\n\n\n\n


    // J’accepte les CGV et donne expressément mandat à la société LEGASPHERE de saisir en mon nom et pour mon compte la juridiction compétente.\n\n\n

    // Le robot achat PixOFHeaven.\n
    // ---------------------------------------\n
    // Ceci est un mail automatique, Merci de ne pas y répondre.";

    // $mail->Body = $body;

    // // Add a recipient address
    // $mail->AddAddress('$row[email]');

    // if(!$mail->Send())
    //     echo ('');
    // else
    //     echo ('');
    // 
  }

	  header( "refresh:2; url=mes-defis.php" ); ?>