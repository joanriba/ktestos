<?php
include('security.php');
include('bdcon.php');
//REBEM LES DADES ESTRUCTURALS
$idioma=$_POST[idioma];
include('header.php');
include('data-europeu.php');
$llista=$_POST[xaval];
?>
	<div class="bandresum">
	<div class="container">
		<div class="sixteen columns">
		
					
<!--*********************************************-->

<h1><?=$word['nsummary'][$idioma]?></h1>
 
<script>$(document).ready(function() { $("#taularesum").tablesorter(); } ); </script> 
 
 
<?=$word['summary'][$idioma]?>
 
<table id="taularesum" width="100%" class="tablesorter">
	<thead>
		<tr>
		<th><?=$word['pnom'][$idioma]?></th>
		<th><?=$word['nactivitat'][$idioma]?></th>
		<th><?=$word['ninici'][$idioma]?></th>
		<th><?=$word['nfinal'][$idioma]?></th>
		<th><?=$word['npreu'][$idioma]?></th>
	</thead> 
 
<?  
 //FOREACH de les dades del formulari anterior per fer el resum
foreach ($llista as $value) {
$coses=explode('/',$value);
$id=$coses[0];
$idmodul=$coses[1];
$nom=$coses[2];



$moduls=mysql_query("select moduls.dinici,moduls.dfinal,moduls.edat,moduls.preu,moduls.maximnens, moduls.id as idmodul, activitats.id, activitats.nomca as nomactivitatca, activitats.nomes as nomactivitates from moduls inner join activitats on activitats.id=moduls.idactivitat where moduls.id=$idmodul",$cxn);
while($row=mysql_fetch_array($moduls)){ $nomactivitatca=$row[nomactivitatca]; $nomactivitates=$row[nomactivitates]; $dinici=$row[dinici]; $dfinal=$row[dfinal]; $preu=$row[preu]; $preutotal[]=$row[preu];

	$inici= FechaFormateada_ca(strtotime($row[dinici]));
	$final= FechaFormateada_ca(strtotime($row[dfinal])); } ?>
	
	<tr>
		<td><?=ucfirst($nom)?></td>
		<td><? if($idioma=='ca'){ echo $nomactivitatca;} else if($idioma=='es'){ echo $nomactivitates;}?></td>
		<td><?=$inici?></td>
		<td><?=$final?></td>
		<td><?=$preu?></td>
	</tr>
<? } //tanca foreach ?>

<tfoot><tr><td colspan="5"><? $suma=array_sum($preutotal); echo 'Total: <strong>'.$suma.'</strong>€';?></td></tr></tfoot></table>
<!--*********************************************-->


	</div><!--end sixteen-->
	</div><!--end container-->
	</div><!--end bandresum-->




<div class="container">
<div class="sixteen columns">

<!--ENVIEM LA LLISTA DE COMANDES-->	
<form method="post" action="new3.php">
	<input type="hidden" name="idioma" value="<?=$idioma?>">		
	<? foreach ($llista as $value) { $coses=explode('/',$value); $id=$coses[0]; $idmodul=$coses[1]; $nom=$coses[2];?>
	<input type="hidden" name="llista[]" value="<?=$id?>/<?=$idmodul?>/<?=$nom?>/"><? } ?>
	<a class="button" href="www.kinobs.com" onclick="window.history.go(-1); return false;"><?=$word['previous'][$idioma]?></a>
	<input type="submit" name="submit" value="<?=$word['finalitzar'][$idioma]?>"/>
</form>
<!-- END LLISTA DE COMANDES-->

</div>
</div><!--end container-->
