<?php
//var_dump("ok"); die();
if(!isset($_GET['idioma'])){  
	if(isset($_POST['idioma'])){ $idioma=$_POST['idioma']; } else { $idioma='ca';} 
} else {$idioma=$_GET['idioma'];}

//connectem a la base de dades
include('bdcon.php');
include('functions.php');
include('textos.php');

//Rebem les dades estructurals
$idioma=$_POST[idioma];
$llista=$_POST[llista];
$numeronens=$_POST[numeronens];


//Verifiquem que el correu no està en ús
$query1=mysql_query("select email1 from pares",$cxn);
$sql=mysql_query("SELECT email1 FROM pares WHERE email1='$_POST[email1]'");
 if(mysql_num_rows($sql)>=1){ ?>
   
   
	<html lang="ca"><head>
	<meta charset="utf-8">
	<title><?=$word['titleemailused'][$idioma]?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/base.css"><link rel="stylesheet" href="css/skeleton.css"><link rel="stylesheet" href="css/layout.css"></head><body>
	<div class="bandkinobs"><img src="/img/logo-kinobs.png"></div>

<div class="bandalert"><div class="container">

<div class="four columns"><img src="/img/emailalert.png"></div>

<div class="twelve columns">
  
    <?=$word['emailused'][$idioma];?><br><br>
    <a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a>
    <a class="button" href="index.php?idioma=<?=$idioma?>"><?=$word['loginpage'][$idioma]?></a>
    
		</div></div></div></body></html>
    
    
   <? } else {
    
  
//*****************************************************
//Si el correu és nou Incorporem les dades a les taules
//*****************************************************


//TUTOR LEGAL
mysql_query("INSERT INTO pares (nom,cognoms,tel1,tel2,tel3,email1,dni,famnum,fammono) VALUES('$_POST[nomtutor]','$_POST[cognomstutor]','$_POST[tel1]','$_POST[tel2]','$_POST[tel3]','$_POST[email1]','$_POST[dni]','$_POST[famnum]','$_POST[fammono]')",$cxn);

$idpare= mysql_insert_id(); 

//Insertem la comanda
mysql_query("INSERT INTO comandes (fecha, idpare) values (NOW(),'$idpare')",$cxn);

$idcomanda=mysql_insert_id();


//Generem un password pel pare
$pass = md5($_POST["nomtutor"].time()); 
$pass2 = $_POST["nomtutor"].time();

$nomnet=netejar($_POST[nomtutor]);

mysql_query("update pares set password='$pass' where id='$idpare'",$cxn);



//NENS
for ($n=1; $n<=$numeronens; $n++){

$nom=$_POST['nom'.$n];$cognoms=$_POST['cognoms'.$n];$birthdate=$_POST['birthdate'.$n];$adreca=$_POST['adreca'.$n];$poblacio=$_POST['poblacio'.$n];$cp=$_POST['cp'.$n];$escolaultim=$_POST['escolaultim'.$n];$cursacabat=$_POST['cursacabat'.$n];$antitetanica=$_POST['antitetanica'.$n];$nomantitetanica=$_POST['nomantitetanica'.$n];$alergia=$_POST['alergia'.$n];$nomalergia=$_POST['nomalergia'.$n];$croniques=$_POST['croniques'.$n];$nomcroniques=$_POST['nomcroniques'.$n];$intervingut=$_POST['intervingut'.$n];$nomintervingut=$_POST['nomintervingut'.$n];$discapacitat=$_POST['discapacitat'.$n];$nomdiscapacitat=$_POST['nomdiscapacitat'.$n];$caracter=$_POST['caracter'.$n];$patologies=$_POST['patologies'.$n];$patologies2=$_POST['patologies2'.$n];$autoritzaciomedica=$_POST['autoritzaciomedica'.$n];$autoritzaciomedica2=$_POST['autoritzaciomedicab'.$n];


mysql_query("INSERT INTO nens (idpare, nom, cognoms,birthdate,adreca,poblacio,cp,escolaultim,cursacabat,antitetanica,nomantitetanica,alergia,nomalergia,croniques,nomcroniques,intervingut,nomintervingut,discapacitat,nomdiscapacitat,caracter,patologies,patologies2,autoritzaciomedica,autoritzaciomedica2) VALUES('$idpare','$nom','$cognoms','$birthdate','$adreca','$poblacio','$cp','$escolaultim','$cursacabat','$antitetanica','$nomantitetanica','$alergia','$nomalergia','$croniques','$nomcroniques','$intervingut','$nomintervingut','$discapacitat','$nomdiscapacitat','$caracter','$patologies','$patologies2','$autoritzaciomedica','$autoritzaciomedica2')",$cxn);

$idnen= mysql_insert_id();


//busquem la seguent id
$carpeta="/fitxes/"; //Definim carpeta on aniran els arxius

//amb la seguent linia guardariem la imatge original amb el nom id
copy($_FILES['fitxa'.$n]['tmp_name'],$carpeta.'/'.$idnen.'.pdf');


 //FOREACH de les dades del formulari anterior per fer el resum
foreach ($llista as $value) {
$coses=explode('/',$value);
$nomar=$coses[0];
$naixament=$coses[1];
$idmodul=$coses[2];
$llista_reduida[]=$nomar.'/'.$naixament;

if($nomar==$nom and $naixament==$birthdate) { $idmodulbo=$idmodul;
	
	//HISTORIAL dins del for del nens
	mysql_query("insert into historial (idmodul,idnen,status,idcomanda) VALUES ('$idmodulbo','$idnen','preinscrit','$idcomanda')",$cxn);
	
} //tanca if

} //tanca foreach

} //tanca FOR DE NANUS

//ENVIEM UN CORREU AL PARE I UN ALTRE A KINOBS

include('admin/MailFunctions.php');

//correu al pare
//traspas_correcte($_POST[email1], $_POST[nomtutor],$pass2, $idioma);

//correu a kinobs
//noumembre($_POST[email1], $_POST[nomtutor], $_POST[cognomstutor], $_POST[tel1], $_POST[tel2], $idpare, $idioma);


include('data-europeu.php'); 



//==============================================================
//ARRANQUEM EL MÒDUL DE GENRACIÓ DE PDF'S
//==============================================================

//Contingut del html que convertim en pdf
include("PdfBody.php");
//Funció que converteix
include("mpdf/mpdf.php");

$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================

} //tanca if email is not in use

?>