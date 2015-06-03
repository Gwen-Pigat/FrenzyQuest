<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>


<title>En attente</title>


<div class="container text-center">

  <?php if ($_POST['chiffre'] > $row['credits']) { ?>

  <br><br><br>

  La mise sur votre défi dépense la somme totale de votre compte !!<br />
  <a href="defi.php">
  <button class="btn btn-danger">Ré-essayer</button></a>

  <?php } else{ ?>

<h2>Votre proposition de défi nous a bien été envoyée.</h2>
<h3>A présent, celui-ci va être vérifié par notre équipe avant d'être validé.</h3>

<a href="defi.php">
<button class="btn btn-success">Proposer un défi</button></a>

</div>

<?php if ($_SESSION['myusername'] == 'Admin') {
 ?>
 
<a href="liste-des-defis.php">
<button class="btn btn-primary">Liste des défis</button></a>

<?php } ?>




<?php 

//GENERATION DU PDF


require_once('tcpdf/tcpdf.php');



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// var_dump($pdf);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gwenaël Pigat');
$pdf->SetTitle('Facture');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


// Set some content to print

$nom = mb_strtoupper($_SESSION['nom'] ,'UTF-8');
$prenom = mb_strtoupper($_POST['p_prenom'] ,'UTF-8');
$adresse = mb_strtoupper($_POST['p_adresse'] ,'UTF-8');
$ville = mb_strtoupper($_POST['p_ville'] ,'UTF-8');
$codepostal = mb_strtoupper($_POST['p_codepostal'] ,'UTF-8');
$email = mb_strtoupper($_POST['p_email'] ,'UTF-8');
$telephone = mb_strtoupper($_POST['p_telephone'] ,'UTF-8');
$date = date("d.m.y");

$random = rand(1, 100000);


$html = <<<HEREDOC
<span style="color: #0088CC">
<strong>SARL Légasphère</strong></span>
<span style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facture No.</span>
<br />
<span style="color: #0088CC; font-size: 12px">
21bis, rue Carnot</span>
<span style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>FA$random</strong></span>
<br />
<span style="color: #0088CC; font-size: 12px">
&nbsp;La ferté Bernard<br>
&nbsp;72400<br>
<span style="font-size: 20px">R.C.S Le Mans n°</span>800 249 997<br>
contact@toutelajustice.com</span><br>
<br><br>
<p style="font-size: 14px">
<strong>CLIENT :</strong><br />
  $nom<br />
</div>
<p style="font-size: 12px; border: 1px black solid">
<strong>\t\t\t Description de l'offre choisie</strong>
</p>
<p style="font-size: 12px; border: 1px black solid;">
&nbsp; RSI / URSSAF / CPAM, Offre 1 : "Procédure amiable"
</p>
<br /><br /><br /> 
<p style="font-size: 12px; border: 1px black solid">
<strong>\t\t\t Son prix</strong>
</p>
<p style="font-size: 12px; border: 1px black solid">
&nbsp; 79,90 €
</p>
<br /><br /><br />
<br /><br /><br /> 
<br /><br /><br /> 
<p style="text-align: center; font-size: 12px; color: #0088CC"><em>Paiement effectué le $date</em></p>
HEREDOC;


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$download = $pdf->Output('Facture_'.$nom.'_'.$date.'.pdf', 'S');


//PHPMAILERl

if (isset($_POST) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['select'])) {
  if(!empty($_POST['nom']) && !empty($_POST['description'])){


    extract($_POST);


    require "PHPMailer/class.phpmailer.php";

    $mail = new phpmailer();
    $mail->AddStringAttachment($download, 'Facture_'.$nom.'_'.$date.'.pdf');

    $mail->FromName = "Un challenge vient d'arriver !!";
    $mail->Subject = "$defi - Défi proposé";
    
    $body = "L'utilisateur $_SESSION[myusername] a proposé un défi, voici ses infos :\n\n\n
    Nom du défi:           $nom
    Sa description : $description\n\n\n\n\n


    J’accepte les CGV et donne expressément mandat à la société LEGASPHERE de saisir en mon nom et pour mon compte la juridiction compétente.\n\n\n

    Le robot achat PixOFHeaven.\n
    ---------------------------------------\n
    Ceci est un mail automatique, Merci de ne pas y répondre.";

    $mail->Body = $body;

    // Add a recipient address
    $mail->AddAddress('pixofheaven@gmail.com');

    if(!$mail->Send())
        echo ('');
    else
        echo ('');
    }

}


//ENVOI EN BDD

  if (isset($_POST) && isset($_POST['defi']) && isset($_POST['description']) && isset($_POST['select']) && isset($_POST['chiffre'])) {
    if(!empty($_POST['defi']) && !empty($_POST['description']) && !empty($_POST['chiffre'])){

      extract($_POST);

      $ajout =  date("Y-m-d H:i:s");
      $valeur = "En attente de validation";

      $base = mysql_connect("localhost","root","motdepasselocalhostgwen") or die("Erreur lors de la connexion a la BDD");
      mysql_select_db("QuitDouble", $base);
      mysql_query("INSERT INTO quests(expediteur, Type, defi, description, date, validation, bounty) VALUES ('$_SESSION[myusername]', '$select', '$defi', '$description', '$ajout', '$valeur', '$chiffre')");

      mysql_close();
      
    }
  }

}

?>