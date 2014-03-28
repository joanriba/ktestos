<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$category=$_GET[category];
?>

<div class="bandcontent-admin">
			<!--imprimim el títol segons la categoria-->
			
			
			<? $nens=mysql_query("select nens.*, pares.id as idpare,pares.nom as nompare, pares.cognoms as cognomspare from nens inner join pares on nens.idpare=pares.id",$cxn);?>
			
			
			<h1>Nens (<? echo mysql_num_rows($nens);?>)</h1>
			
			<a class="submit2" href="nen_publicar.php">Afegir nen manualment</a><br><br>

				
				<script>$(document).ready(function() {$("#taulahistorial").tablesorter(); });</script>
					
					<table id="taulahistorial" class="nens tablesorter">
						<thead> 
						<tr>
							<th>Nom</td>
							<th>Cognoms</td>
							<th>Edat</td>
							<th>Tutor</td>
							<th>Poblacio</td>
							<th>CP</td>
							<th>Última escola</th>
							<th>Curs acabat</th>
							<th>Alèrgies</th>
							<th>Autoritz. 1</td>
							<th>Autoritz. 2</th>
							<th>Eines</td>
						</tr>
						</thead>
						
						<tbody>
						
			<? while($row=mysql_fetch_array($nens)){
				$birthday = new DateTime($row[birthdate]);
				$interval = $birthday->diff(new DateTime);	
			?>	
						
						<tr class="white">
							<td><a href="nen.php?id=<?=$row[id]?>"><?=$row[nom]?></a></td>
							<td><?=$row[cognoms]?></td>
							<td><? echo $interval->y;?></td>
							<td><a href="pare.php?idpare=<?=$row[idpare]?>"><?=$row[nompare]?> <?=$row[cognomspare]?></a></td>
							<td><?=$row[poblacio]?></td>
							<td><?=$row[cp]?></td>
							<td><?=$row[escolaultim]?></td>
							<td><?=$row[cursacabat]?></td>
							<td><?=$row[alergia]?></td>
							<td><?=$row[autoritzaciomedica]?></td>
							<td><?=$row[autoritzaciomedica]?></td>
							<td>
								<a href="nen_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>&nbsp;
								<a href="nen_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
							</td>
						</tr>
					
					<? } ?>	
						
						</tbody>
					</table>
		
	<a class="submit2" href="nen_publicar.php">Afegir nen manualment</a>
		

</div><!-- tanca bandcontent-admin-->

<? include('footer.php');?>