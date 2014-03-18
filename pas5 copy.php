<?php
 
 var_dump("ok"); die();
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
$pass=netejar($_POST[nomtutor]).$idpare;

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
traspas_correcte($_POST[email1], $_POST[nomtutor],$pass, $idioma);

//correu a kinobs
noumembre($_POST[email1], $_POST[nomtutor], $_POST[cognomstutor], $_POST[tel1], $_POST[tel2], $idpare, $idioma);



include('data-europeu.php'); 

?>



<?php

include_once('phpToPDF.php') ;
// Assign html code into php variable:-
    $html ='

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="'.$idioma.'"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Comprovant Inscripció</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<script src="js/parsley.min.js"></script>
	<script src="js/i18n/es.js"></script>
	
	<link rel="stylesheet" href="js/parsley.css">
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
	
	

<script type="text/javascript" src="js/tipped.js"></script>
<script type="text/javascript" src="js/imagesloaded/imagesloaded.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tipped.css"/>
		

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

<div class="bandkinobs">
	<img src="/img/logo-kinobs.png">
</div>

<div class="bandheader">
	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Comprovant d\'inscripció</h1>
		</div>
	</div>
</div><!--end bandheader-->




<div class="bandformtutor">
	<div class="container">
	<div class="sixteen columns">
	
	<h2>Dades del tutor legal</h2>
	
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			'.ucfirst($_POST[nomtutor]).'&nbsp;'.$_POST[cognomstutor].'<br>
			Telèfon 1:'.$_POST[tel1].'<br>
			Telèfon 2:'.$_POST[tel2].'<br>
			Telèfon 3:'.$_POST[tel3].'<br>	
			
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">			
			Email 1: '.$_POST[email1].'<br>
			DNI: '.$_POST[dni].'<br>
			Numero carnet família monoparental: '.$_POST[fammono].'<br>
			Numero carnet família nombrosa: '.$_POST[famnum].'<br>
			
		</div><!--one-third-->
		
		<div class="one-third column">
			<!--aquí estaven les dades bancaries que hem decidit no posar-->    
		</div><!--one-third column-->
	</div><!--end container-->
</div><!--end bandform tutors-->


	<div class="bandresum">
	<div class="container">
	
		<div class="sixteen columns">
							
<h1></h1>
 
<table id="taularesum" width="100%" class="tablesorter">
	<thead>
		<tr>
		<th>Nom</th>
		<th>Activitat</th>
		<th>Inici</th>
		<th>Final</th>
		<th>Preu</th>
	</th>
	</thead>'; 
 
  
 //FOREACH de les dades del formulari anterior per fer el resum
foreach ($llista as $value) {
$coses=explode('/',$value);
$nom=$coses[0];
$naixament=$coses[1];
$idmodul=$coses[2];
$llista_reduida[]=$nom.'/'.$naixament;

$moduls=mysql_query("select moduls.dinici,moduls.dfinal,moduls.edat,moduls.preu,moduls.maximnens, moduls.id as idmodul, activitats.id, activitats.nomca as nomactivitatca, activitats.nomes as nomactivitates from moduls inner join activitats on activitats.id=moduls.idactivitat where moduls.id=$idmodul",$cxn);
while($row=mysql_fetch_array($moduls)){ $nomactivitatca=$row[nomactivitatca]; $dinici=$row[dinici]; $dfinal=$row[dfinal]; $preu=$row[preu]; $preutotal[]=$row[preu];

	$inici= FechaFormateada_ca(strtotime($row[dinici]));
	$final= FechaFormateada_ca(strtotime($row[dfinal])); }
	
	$html .='
	
	<tr>
		<td>'.ucfirst($nom).'</td>
		<td>'.$nomactivitatca.'</td>
		<td>'.$inici.'</td>
		<td>'.$final.'</td>
		<td>.'$preu.'</td>
	</tr>';
	
return $html;
	
} //tanca foreach

$html .='
<tfoot>
	<tr>
		<td colspan="5">';
			
			$suma=array_sum($preutotal); echo 'Total: <strong>'.$suma.'</strong>€';		

$html .='
		
		</td>
	</tr>
</tfoot>
</table>


	</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->';

//FOR PER LOOPEJAR ELS NENS
for ($n=1; $n<=$numeronens; $n++){
	
$html .='
<div class="bandformnen">
<div class="container">
<div class="sixteen columns">

<h1>'.ucfirst($_POST['nom'.$n]).'</h1>

</div>

<div class="five columns">
			
			'.$_POST['nom'.$n]).' '.$_POST['cognoms'.$n].'<br/>
			'.$_POST['adreca'.$n].'<br>
			'.$_POST['poblacio'.$n].'<br>
			'.$_POST['cp'.$n].'<br>
			'.$_POST['cursacabat'.$n].'<br>			
			'.$_POST['escolaultim'.$n].'<br>
			<strong>Autorització mèdica:</strong> '.$_POST['autoritzaciomedica'.$n].'<br>

</div>

<div class="ten columns">
			<div class="four columns">			
			<strong>Antitetànica:</strong> .'$_POST['antitetanica'.$n].'<br>		
			<strong>Alèrgia:</strong> .'$_POST['alergia'.$n].'<br>
			<strong>Enfermetats cròniques:</strong> .'$_POST['croniques'.$n].'<br>
			<strong>Intervingut:</strong> .'$_POST['intervingut'.$n].'<br>
		</div><!--end four columns-->
				
</div><!--end ten columns-->
</div><!--end container-->
</div><!-- end bandform-->';

return $html;

} //tanca FOR DE NANUS

$html ='	
	
	
</div>
</div>';


phptopdf_html($html,'pdf/', 'my_pdf_filename.pdf');
echo "<a href='pdf/my_pdf_filename.pdf'>Download PDF</a>";
?>