<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--imprimim el títol segons la categoria-->



<div class="bandformnen">
	<div class="container">
		<div class="sixteen columns">


<? 
//Si està enviada la id per $_GET ensenyem només els nanus que s'hagin apuntat a aquest mòdul
if(isset($_GET[id])){


	
$consulta=mysql_query("select historial.id, nens.id as idnen,nens.nom as nomnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria where historial.idmodul='$_GET[id]'",$cxn);

$consulta_mini=mysql_query("select historial.id, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,historial.status from historial inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat  where historial.idmodul='$_GET[id]'",$cxn);

	
	//Extraiem nom activitat inici i final per al títol
	while($raw=mysql_fetch_array($consulta_mini)){ $activitat=$raw[nomactivitat]; 
		
				$dinici= FechaFormateada_ca(strtotime($raw[dinici]));
				$dfinal= FechaFormateada_ca(strtotime($raw[dfinal]));		
	}
	
	
} else {

//Si no hi ha cap $_GET els mostrem tots
$consulta=mysql_query("select historial.id, nens.id as idnen,nens.nom as nomnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria",$cxn);

}?>



			<h2><? if(isset($_GET[id])){ 
			
					$result2=mysql_num_rows($consulta); 
					if($result2==0){ echo 'No hi ha nens apuntats a aquest mòdul';} else { echo 'Comandes per a '.$activitat.'<br> del '.$dinici.'<br> al '.$dfinal; }
					
					} else { echo 'Historial de comandes';}?></h2>


<script>$(document).ready(function() { $("#taulahistorial").tablesorter(); } ); </script>

		



		<table id="taulahistorial" class="tablesorter">
					<thead>
						<th>Fill</th>
						<th>Pare/Tutor</th>
						<th>Activitat</th>
						<th>Inici</th>
						<th>Final</th>
						<th>Preu</th>
						<th>Status</th>
						<th>Categoria</th>
						<th>Borrar</th>
					</thead>
					
					<tbody>


			<? while($row=mysql_fetch_array($consulta)){ 
				$inici= FechaFormateada_ca(strtotime($row[dinici]));
				$final= FechaFormateada_ca(strtotime($row[dfinal]));?>
					
						<tr>
							<td><a href="nen.php?id=<?=$row[idnen]?>"><?=$row[nomnen]?></a></td>
							<td><?=$row[nompare]?> <?=$row[cognomspare]?></td>
							<td><?=$row[nomactivitat]?></td>
							<td><?=$inici?></td>
							<td><?=$final?></td>
							<td><?=$row[preu]?></td>
							<td><? if($row[status]=='preinscrit'){?><a class="red" href="changestatus.php?id=<?=$row[idnen]?>"><?=$row[status]?></a><? } ?></td>
							<td><?=$row[categoria]?></td>
							<td><a href="historial_publicar.php?id=<?=$row[id]?>&borrar=yes"><img src="/img/admin/borrar.png"></a></td>
						</tr>
					
						<? } ?>	
					
					</tbody>
					
				</table>
				
		</div><!--end sixteen-->
	</div><!--end container-->
</div><!--end band-->