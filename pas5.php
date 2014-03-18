<?php
 
 //var_dump("ok"); die();
//connectem a la base de dades
include('bdcon.php');
include('functions.php');


//Rebem les dades estructurals
$idioma=$_POST[idioma];
$llista=$_POST[llista];
$numeronens=$_POST[numeronens];


//*********************************
//Incorporem les dades a les taules
//*********************************


//TUTOR LEGAL
mysql_query("INSERT INTO pares (nom,cognoms,tel1,tel2,tel3,email1,dni,famnum,fammono) VALUES('$_POST[nomtutor]','$_POST[cognomstutor]','$_POST[tel1]','$_POST[tel2]','$_POST[tel3]','$_POST[email1]','$_POST[dni]','$_POST[famnum]','$_POST[fammono]')",$cxn);

$idpare= mysql_insert_id(); 

//Generem un password pel pare
$pass = md5($_POST["nomtutor"].time()); 
$pass2 = $_POST["nomtutor"].time();

$nomnet=netejar($_POST[nomtutor]);

mysql_query("update pares set password='$pass' where id='$idpare'",$cxn);



//NENS
for ($n=1; $n<=$numeronens; $n++){
	
$nom=$_POST['nom'.$n];$cognoms=$_POST['cognoms'.$n];$birthdate=$_POST['birthdate'.$n];$adreca=$_POST['adreca'.$n];$poblacio=$_POST['poblacio'.$n];$cp=$_POST['cp'.$n];$escolaultim=$_POST['escolaultim'.$n];$cursacabat=$_POST['cursacabat'.$n];$antitetanica=$_POST['antitetanica'.$n];$nomantitetanica=$_POST['nomantitetanica'.$n];$alergia=$_POST['alergia'.$n];$nomalergia=$_POST['nomalergia'.$n];$croniques=$_POST['croniques'.$n];$nomcroniques=$_POST['nomcroniques'.$n];$intervingut=$_POST['intervingut'.$n];$nomintervingut=$_POST['nomintervingut'.$n];$discapacitat=$_POST['discapacitat'.$n];$nomdiscapacitat=$_POST['nomdiscapacitat'.$n];$caracter=$_POST['caracter'.$n];$patologies=$_POST['patologies'.$n];$patologies2=$_POST['patologies2'.$n];$autoritzaciomedica=$_POST['autoritzaciomedica'.$n];


mysql_query("INSERT INTO nens (idpare, nom, cognoms,birthdate,adreca,poblacio,cp,escolaultim,cursacabat,antitetanica,nomantitetanica,alergia,nomalergia,croniques,nomcroniques,intervingut,nomintervingut,discapacitat,nomdiscapacitat,caracter,patologies,patologies2,autoritzaciomedica) VALUES('$idpare','$nom','$cognoms','$birthdate','$adreca','$poblacio','$cp','$escolaultim','$cursacabat','$antitetanica','$nomantitetanica','$alergia','$nomalergia','$croniques','$nomcroniques','$intervingut','$nomintervingut','$discapacitat','$nomdiscapacitat','$caracter','$patologies','$patologies2','$autoritzaciomedica')",$cxn);

$idnen= mysql_insert_id();


 //FOREACH de les dades del formulari anterior per fer el resum
foreach ($llista as $value) {
$coses=explode('/',$value);
$nomar=$coses[0];
$naixament=$coses[1];
$idmodul=$coses[2];
$llista_reduida[]=$nomar.'/'.$naixament;

if($nomar==$nom and $naixament==$birthdate) { $idmodulbo=$idmodul;
	
	//HISTORIAL dins del for del nens
	mysql_query("insert into historial (idmodul, idnen, status) VALUES ('$idmodulbo','$idnen','preinscrit')",$cxn);
	
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

?>



<?php

include_once('phpToPDF.php') ;

//contingut $html;
include('PdfBody.php');
//prenem el moment d'ara mateix per insertar en el nom del pdf
$ara= time();

//AMB TOT AIXÒ MUNTEM UN PDF DE COLLONS
phptopdf_html($html,'pdf/', $nomnet.'_'.$idpare.'_'.$ara.'.pdf');
echo '<a class="button" href="pdf/'.$nomnet.'_'.$idpare.'_'.$ara.'.pdf">Download PDF</a>';



?>