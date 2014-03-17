<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$category=$_GET[category];
?>

<div class="bandcontent-admin">
	<div class="container">
		<div class="sixteen columns">
			<!--imprimim el títol segons la categoria-->
			<h1>Nens</h1>
			
			<div class="new"><a class="submit" href="nen_publicar.php">Afegir nen manualment</a><br><br></div>
		</div>
		
		
		
		
			<div class="sixteen columns entry">
				
				
				<script>
					$(document).ready(function() 
						{ 
							$("#taulanens").tablesorter(); 
						} 
					); 
				</script>
					
					<table id="taulanens" class="nens tablesorter">
						<thead> 
						<tr>
							<th>Nom</td>
							<th>Cognoms</td>
							<th>Edat</td>
							<th>Tutor</td>
							<th>Poblacio</td>
							<th>CP</td>
							<th>Eines</td>
						</tr>
						</thead>
						
						<tbody>
						
						<? $nens=mysql_query("select nens.*, pares.id as idpare,pares.nom as nompare, pares.cognoms as cognomspare from nens inner join pares on nens.idpare=pares.id",$cxn);
			while($row=mysql_fetch_array($nens)){
			
				$birthday = new DateTime($row[birthdate]);
				$interval = $birthday->diff(new DateTime);
				
			?>	
						
						<tr>
							<td><a href="nen.php?id=<?=$row[id]?>"><?=$row[nom]?></a></td>
							<td><?=$row[cognoms]?></td>
							<td><? echo $interval->y;?></td>
							<td><a href="pare.php?idpare=<?=$row[idpare]?>"><?=$row[nompare]?> <?=$row[cognomspare]?></a></td>
							<td><?=$row[poblacio]?></td>
							<td><?=$row[cp]?></td>
							<td>
								<a href="nen_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>&nbsp;
								<a href="nen_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
							</td>
						</tr>
					
					<? } ?>	
						
						</tbody>
					</table>
						
												
			</div>	
			
		
		
		<div class="sixteen columns">
			<div class="new"><a class="submit" href="nen_publicar.php">Afegir nen manualment</a><br><br></div>
		</div>
		
	
		</div><!--container-->
</div><!-- tanca bandcontent-admin-->