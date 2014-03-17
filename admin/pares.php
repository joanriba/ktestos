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
			<h1>Pares</h1>
			
			<div class="new"><a class="submit" href="pare_publicar.php">Afegir pare manualment</a><br><br></div>
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
							<th>tel1</td>
							<th>tel2</td>
							<th>email1</td>
							<th>email2</td>
							<th>Eines</td>
						</tr>
						</thead>
						
						<tbody>
						
						<? $pares=mysql_query("select * from pares",$cxn);
			while($row=mysql_fetch_array($pares)){
			
			?>	
						
						<tr>
							<td><a href="pare.php?id=<?=$row[id]?>"><?=$row[nom]?></a></td>
							<td><?=$row[cognoms]?></td>
							<td><?=$row[tel1]?></td>
							<td><?=$row[tel2]?></td>
							<td><?=$row[email1]?></td>
							<td><?=$row[email2]?></td>
							<td>
								<a href="pare_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>&nbsp;
								<a href="pare_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
							</td>
						</tr>
					
					<? } ?>	
						
						</tbody>
					</table>
						
												
			</div>	
			
		
		
		<div class="sixteen columns">
			<div class="new"><a class="submit" href="pare_publicar.php">Afegir pare manualment</a><br><br></div>
		</div>
		
	
		</div><!--container-->
</div><!-- tanca bandcontent-admin-->