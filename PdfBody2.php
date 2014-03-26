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
			<p>Id Comanda: '.$idcomanda.' Data: '.$myDate.'</p>
			<h1 class="remove-bottom" style="margin-top: 40px">'.$word['comprovant'][$idioma].'</h1>
			<p>'.$word['textcomprovant'][$idioma].'</p>
		</div>
	</div>
</div><!--end bandheader-->


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

foreach ($llista as $value) {
$coses=explode('/',$value);
$id=$coses[0];
$idmodul=$coses[1];
$nom=$coses[2];
	
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
	</div><!--end bandresum-->

	
</div>
</div>';

?>