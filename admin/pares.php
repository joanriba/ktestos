<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
$category=$_GET[category];
?>

<div class="bandcontent-admin">
	<!--<div class="container">
		<div class="sixteen columns">-->
			<!--imprimim el títol segons la categoria-->
			
			<? $pares=mysql_query("select * from pares",$cxn);?>
			
			<h1>Pares (<? echo mysql_num_rows($pares);?>)</h1>
			
			<a class="submit2" href="pare_publicar.php">Afegir pare manualment</a><br><br>
		
	
				<script>$(document).ready(function() {$("#taulahistorial").tablesorter(); } ); </script>
					
					<table id="taulahistorial" class="nens tablesorter">
						<thead> 
						<tr>
							<th>Nom</td>
							<th>tel1</td>
							<th>tel2</td>
							<th>email1</td>
							<th>email2</td>
							<th>Com. Realitzades</th>
							<th>Fam Monoparental</th>
							<th>Fam Nombrosa</th>
							<th>Eines</td>
						</tr>
						</thead>
						<tbody>
						
						<? while($row=mysql_fetch_array($pares)){?>	
						
						<tr class="white">
							<td><a href="pare.php?id=<?=$row[id]?>"><?=$row[nom]?> <?=$row[cognoms]?></a></td>
							<td><?=$row[tel1]?></td>
							<td><?=$row[tel2]?></td>
							<td><?=$row[email1]?></td>
							<td><?=$row[email2]?></td>
							<td>
								<? $comandespare=mysql_query("select * from comandes where idpare='$row[id]'",$cxn);
								echo mysql_num_rows($comandespare); ?>
								
							</td>
							<td><?=$row[fammono]?></td>
							<td><?=$row[famnum]?></td>
							<td>
								<a href="pare_publicar.php?id=<?=$row[id]?>" title="editar"><img src="../img/admin/editar.png" alt="editar item"/></a>&nbsp;
								<a href="pare_publicar.php?id=<?=$row[id]?>&borrar=yes" title="borrar"><img src="../img/admin/borrar.png" alt="borrar item"/></a>
							</td>
						</tr>
					
					<? } ?>	
						
						</tbody>
					</table>
						
				
		
		<div class="sixteen columns">
			<div class="new"><a class="submit2" href="pare_publicar.php">Afegir pare manualment</a><br><br></div>
		</div>
		
	
		<!--</div>container-->
</div><!-- tanca bandcontent-admin-->

<? include('footer.php');?>