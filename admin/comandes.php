<?php 
include('../bdcon.php');
include('security.php');
include('menu.php');
?>

<div class="bandcontent-admin">

	
<? 
$consulta=mysql_query("select comandes.id as idcomanda, comandes.paid, pares.id as idpare, pares.nom, pares.cognoms,comandes.fecha   from comandes inner join pares on comandes.idpare = pares.id",$cxn);
$numcomandes=mysql_num_rows($consulta);

$pagades=mysql_query("select paid from comandes where paid='si'",$cxn); $countpagades=mysql_num_rows($pagades);
$nopagades=mysql_query("select paid from comandes where paid='no'",$cxn); $countnopagades=mysql_num_rows($nopagades);

?>

<h3>Comandes (<?=$numcomandes?>)</h3> <p>Pagades: <span style="color: green;"><?=$countpagades?></span> &nbsp;&nbsp;&nbsp; No pagades: <span style="color: red;"><?=$countnopagades?></span></p>

<script>$(document).ready(function() { $("#taulahistorial").tablesorter(); } ); </script>


		<table id="taulahistorial" class="tablesorter">
					<thead>
						<th>Id Comanda.</th>						
						<th>Nom del tutor</th>
						<th>Data de creació</th>
						<th>Productes</th>
						<th>Pagada</th>
						<th>Resguard</th>
						<th>Borrar</th>
					</thead>
					
					<tbody>


			<? while($row=mysql_fetch_array($consulta)){  $fechafinal= FechaFormateada_ca(strtotime($row[fecha])); ?>
					
						<tr class="white">
							<td><a class="button-small" href="historial.php?idcomanda=<?=$row[idcomanda]?>">veure comanda <?=$row[idcomanda]?></a></td>
							<td><a href="nen.php?id=<?=$row[idpare]?>"><?=$row[nom]?>&nbsp;<?=$row[cognoms]?></a></td>
							<td><?=$fechafinal?></td>
							<td>
								<? $historial=mysql_query("select * from historial where idcomanda='$row[idcomanda]'",$cxn);
								$numrows=mysql_num_rows($historial); echo $numrows; ?>
							</td>
							<td>
							
								<? if($row[paid]=="si"){ ?>
								
									<a href="paid.php?paid=<?=$row[paid]?>&id=<?=$row[idcomanda]?>" class="green">Pagada</a>
								
								<? } else if($row[paid]=="no") { ?>
									
									<a href="paid.php?paid=<?=$row[paid]?>&id=<?=$row[idcomanda]?>" class="red">No Pagada</a>									
									
								<? }?>
							</td>
							<td><a href="/pdf/<?=$row[idcomanda]?>.pdf" target="_blank"><img src="/img/admin/pdf.png" width="20"></a>
							<td><a href="comandes_publicar.php?id=<?=$row[idcomanda]?>&borrar=yes"><img src="/img/admin/borrar.png"></a></td>
						</tr>
					
						<? } ?>	
					
					</tbody>
					
				</table>
				

</div><!--end band-->

<? include('footer.php');?>