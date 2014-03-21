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

			<h2>Historial de comandes</h2>


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
					</thead>
					
					<tbody>
					
					
								<? $consulta=mysql_query("select historial.id, nens.id as idnen,nens.nom as nomnen, pares.id as idpare, pares.nom as nompare, pares.cognoms as cognomspare, activitats.nomca as nomactivitat, moduls.dinici,moduls.dfinal,moduls.preu,historial.status,categories.nomca as categoria from historial inner join nens on historial.idnen=nens.id inner join pares on nens.idpare=pares.id inner join moduls on moduls.id=historial.idmodul inner join activitats on activitats.id=moduls.idactivitat inner join categories on categories.id=activitats.categoria",$cxn);
			while($row=mysql_fetch_array($consulta)){ 
			
			
				
				$inici= FechaFormateada_ca(strtotime($row[dinici]));
				$final= FechaFormateada_ca(strtotime($row[dfinal]));
				
			?>
					
						<tr>
							<td><?=$row[nomnen]?></td>
							<td><?=$row[nompare]?> <?=$row[cognomspare]?></td>
							<td><?=$row[nomactivitat]?></td>
							<td><?=$inici?></td>
							<td><?=$final?></td>
							<td><?=$row[preu]?></td>
							<td><?=$row[status]?></td>
							<td><?=$row[categoria]?></td>
						</tr>
					
						<? } ?>	
					
					</tbody>
					
				</table>
				
		</div><!--end sixteen-->
	</div><!--end container-->
</div><!--end band-->