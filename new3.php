<?php
session_start();
if(!isset($_GET['idioma'])){  
	if(isset($_POST['idioma'])){ $idioma=$_POST['idioma']; } else { $idioma='ca';} 
} else {$idioma=$_GET['idioma'];}

//connectem a la base de dades
include('bdcon.php');
include('functions.php');
include('textos.php');

//Rebem les dades estructurals
$llista=$_POST[llista];


//Insertem la comanda
mysql_query("INSERT INTO comandes (fecha, idpare) values (NOW(),'$_SESSION[s_iduser]')",$cxn);

$idcomanda=mysql_insert_id();
$myDate = date('Y/m/d');


//FOREACH de les dades del formulari anterior per fer el resum
foreach ($llista as $value) {
$coses=explode('/',$value);
$id=$coses[0];
$idmodul=$coses[1];
$nom=$coses[2];

//INSERTEM LES DADES DELS XAVALS AL HISTORIAL dins del foreach del nens
mysql_query("insert into historial (idnen,idmodul,status,idcomanda) VALUES ('$id','$idmodul','preinscrit','$idcomanda')",$cxn);

} //tanca foreach



//ENVIEM UN CORREU AL PARE I UN ALTRE A KINOBS
include('admin/MailFunctions.php');

//correu al pare
traspas_correcte_login($_SESSION['s_email'], $_SESSION['s_nom'], $idioma);

//correu a kinobs
re_inscripcio($_SESSION['s_email'], $_SESSION['s_nom'], $_SESSION['s_cognoms'], $_SESSION['s_iduser'], $idcomanda, $idioma);


include('data-europeu.php'); 

//==============================================================
//ARRANQUEM EL MÒDUL DE GENRACIÓ DE PDF'S
//==============================================================

//Contingut del html que convertim en pdf
include("PdfBody2.php");
//Funció que converteix
include("mpdf/mpdf.php");

$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$mpdf->Output("pdf/$idcomanda.pdf","F");
//==============================================================
//==============================================================


//==============================================================
//ARRANQUEM PHPMAILER PER ENVIAR L'ARXIU ADJUNT

$email=$_SESSION['s_email'];
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "mail.joanriba.net"; // SMTP server

$mail->From     = "no-reply@kinobs.com";
$mail->FromName = 'Kinobs';
$mail->AddAddress($email);

$mail->IsHTML(true);

$mail->AddEmbeddedImage('logo-kinobs.png', 'logo-kinobs', 'logo-kinobs.png');
$mail->Subject  = "Resguard de Preinscripció";
$mail->Body     = 'Hola '.$_SESSION[s_nom].', <br> T\'adjuntem el teu resguard de preinscripció<br>Recorda que tens 10 díes hàbils per entregar-lo a Kinobs per així formalitzar el pagament i la inscripció final. Gràcies de nou per la teva atenció.<br> Cordialment,<br> Equip de Kinobs<br><img src="cid:logo-kinobs" />';
$mail->AltBody="Hola ".$_SESSION[s_nom].", \n\n T\'adjuntem el teu resguard de preinscripció \n\n Recorda que tens 10 díes hàbils per entregar-lo a Kinobs per així formalitzar el pagament i la inscripció final. Gràcies de nou per la teva atenció. \n\n Cordialment, \n\n Equip de Kinobs.";
$mail->WordWrap = 50;


$path='pdf/'.$idcomanda.'.pdf';

$mail->AddAttachment($path);

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  //echo 'Message has been sent.';
}

//==============================================================


//MOSTREM PÀGINA D'EXIT
?>


 	<html lang="<?=$idioma?>"><head>
	<meta charset="utf-8">
	<title><?=$word['success'][$idioma]?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/base.css"><link rel="stylesheet" href="css/skeleton.css"><link rel="stylesheet" href="css/layout.css"></head><body>
	<div class="bandkinobs"><img src="/img/logo-kinobs.png"></div>
	<div class="bandalert"><div class="container">
<div class="four columns"><img src="/img/okbig.png"></div>
<div class="twelve columns">
    <p><?=$word['success2'][$idioma];?><p>
    <a class="button" href="download.php?idcomanda=<?=$idcomanda?>"><?=$word['downloadpdf'][$idioma]?></a>
    <a class="button" href="pdf/<?=$idcomanda?>.pdf" target="_blank"><?=$word['openpdf'][$idioma]?></a>
    <a class="button" href="index.php?idioma=<?=$idioma?>" target="_blank"><?=$word['backtopanel'][$idioma]?></a>
	</div></div></div></body></html>

