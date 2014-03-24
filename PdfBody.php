<?php
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

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="css/layout.css">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

<div class="bandkinobs">
	<img src="img/logo-kinobs.png">
</div>

<div class="bandheader">
	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">'.$word['comprovant'][$idioma].'</h1>
			<p>'.$word['textcomprovant'][$idioma].'</p>
		</div>
	</div>
</div><!--end bandheader-->




<div class="bandformtutor">
	<div class="container">
	<div class="sixteen columns">
	
	<h2>'.$word['dadestutor'][$idioma].'</h2>
	</div><!--end sixteen-->
	
		<div class="one-third column">
	
	
			'.ucfirst($_POST[nomtutor]).'&nbsp;'.$_POST[cognomstutor].'<br>
			'.$word['tel1'][$idioma].': '.$_POST[tel1].'<br>
			'.$word['tel2'][$idioma].': '.$_POST[tel2].'<br>
			'.$word['tel3'][$idioma].': '.$_POST[tel3].'<br>	
			
		</div><!--tanca primer one-third-->
		
		<div class="one-third column">			
			'.$word['email'][$idioma].': '.$_POST[email1].'<br>
			'.$word['dni'][$idioma].': '.$_POST[dni].'<br>
			'.$word['carnetmonoparental'][$idioma].': '.$_POST[fammono].'<br>
			'.$word['carnetnombrosa'][$idioma].': '.$_POST[famnum].'<br>
			
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
		<th>'.$word['pnom'][$idioma].'</th>
		<th>'.$word['nactivitat'][$idioma].'</th>
		<th>'.$word['ninici'][$idioma].'</th>
		<th>'.$word['nfinal'][$idioma].'</th>
		<th>'.$word['npreu'][$idioma].'</th>
	</th>
	</thead>'; 
	
	
//FOREACH de les dades del formulari anterior per fer el resum

$table = "";
foreach($llista as $value){
	
	$coses = explode("/", $value);
	$nom=$coses[0];
	$naixament=$coses[1];
	$idmodul=$coses[2];
	$llista_reduida[]=$nom.'/'.$naixament;
	
	$moduls = mysql_query("select moduls.dinici,moduls.dfinal,moduls.edat,moduls.preu,moduls.maximnens, moduls.id as idmodul, activitats.id, activitats.nomca as nomactivitatca, activitats.nomes as nomactivitates from moduls inner join activitats on activitats.id=moduls.idactivitat where moduls.id=$idmodul",$cxn);
	
	while($row=mysql_fetch_array($moduls)){ 

		$nomactivitatca=$row[nomactivitatca]; $nomactivitates=$row[nomactivitates]; $dinici=$row[dinici]; $dfinal=$row[dfinal]; $preu=$row[preu]; $preutotal[]=$row[preu];
	
		$inicica= FechaFormateada_ca(strtotime($row[dinici]));
		$finalca= FechaFormateada_ca(strtotime($row[dfinal])); 
		$inicies= FechaFormateada_es(strtotime($row[dinici]));
		$finales= FechaFormateada_es(strtotime($row[dfinal])); 
		
		if($idioma=='ca'){ $nomactivitat=$nomactivitatca and $inici=$inicica and $final=$finalca;} else if($idioma=='es'){ $nomactivitat=$nomactivitatca and $inici=$inicies and $final=$finales;}
		 
    }
    
    
    	$table .='
    	<tr>
			<td>'.ucfirst($nom).'</td>
			<td>'.$nomactivitat.'</td>
			<td>'.$inici.'</td>
			<td>'.$final.'</td>
			<td>'.$preu.'</td>
		</tr>';
}


$html .= $table;

$html .='
<tfoot>
	<tr>
		<td colspan="5">';
		

$suma=array_sum($preutotal); //echo 'Total: <strong>'.$suma.'</strong>€';		

$html .='
		
		Total: <strong>'.$suma.'</strong>€</td>
	</tr>
</tfoot>
</table>


	</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->';

//FOR PER LOOPEJAR ELS NENS



for ($n=1; $n<=intval($numeronens); $n++){
	
$html .='
<div class="bandformnen">
<div class="container">
<div class="sixteen columns">


<h2>'.$_POST["nom".$n].'&nbsp;'.$_POST["cognoms".$n].'</h2>


</div>

<div class="five columns">
			
			<strong>Direcció</strong>: '.$_POST["adreca".$n].'<br>
			'.$_POST["poblacio".$n].'<br>
			'.$_POST["cp".$n].'<br>
			<strong>Curs acabat:</strong> '.$_POST["cursacabat".$n].'<br>			
			<strong>Última escola on s\'ha estudiat:</strong> '.$_POST["escolaultim".$n].'<br>
			<strong>Autorització mèdica:</strong> '.$_POST["autoritzaciomedica".$n].'<br>

</div>

<div class="ten columns">
			<div class="four columns">			
			<strong>Antitetànica:</strong> '.$_POST["antitetanica".$n].'<br>		
			<strong>Alèrgia:</strong> '.$_POST["alergia".$n].'<br>
			<strong>Enfermetats cròniques:</strong> '.$_POST["croniques".$n].'<br>
			<strong>Intervingut:</strong> '.$_POST["intervingut".$n].'<br>
		</div><!--end four columns-->
				
</div><!--end ten columns-->
</div><!--end container-->
</div><!-- end bandform-->';


} //tanca FOR DE NANUS


	
$html .= '	
</div>
</div>';

?>