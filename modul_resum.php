<h1><?=$word['summary'][$idioma]?></h1>
 
<script>$(document).ready(function() { 


 Tipped.create('.demo', 'Lorem ipsum dolor sit amet consecteur ellis enum dolor');
$("#taularesum").tablesorter(); 
	
	
	
} ); </script> 
 
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
$nom=$coses[0];
$naixament=$coses[1];
$idmodul=$coses[2];
$llista_reduida[]=$nom.'/'.$naixament;

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

<tfoot>
	<tr>
		<td colspan="5">
			<? $suma=array_sum($preutotal); echo 'Total: <strong>'.$suma.'</strong>€';?>		
		</td>
	</tr>
</tfoot>

</table>
