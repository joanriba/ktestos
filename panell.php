<?
session_start();
$idioma=$_GET[idioma];
if($idioma==""){ $idioma='ca';}
include('data-europeu.php');
include('bdcon.php');
include('header.php');
?>

<div class="bandformtutor">
	<div class="container">
	
		
		<?
		//Accedim a la DB per agafar les dades del tutor segons el seu id recollida en la sessió
		$darespare=mysql_query("select * from pares where id='".$_SESSION[s_iduser]."'",$cxn);
		while($row=mysql_fetch_array($darespare)){ ?>
			
			<div class="one-third column">
	
				<strong>Telèfon 1:</strong> <?=$row[tel1]?><br>
				<strong>Telèfon 2:</strong> <?=$row[tel2]?><br>
				<strong>Telèfon 3:</strong> <?=$row[tel3]?><br>
				<strong>Email 1:</strong> <?=$row[email1]?><br>	

			</div><!--tanca primer one-third-->
		
		<div class="one-third column">	
				
			<strong>DNI:</strong> <?=$row[dni]?><br>
			<strong>Numero carnet família monoparental:</strong> <?=$row[fammono]?><br>
			<strong>Numero carnet família nombrosa:</strong> <?=$row[famnum]?><br>
			
		</div><!--one-third-->
		
		<div class="one-third column">	
				
			<a href="dades-editar.php?id=<?=$_SESSION[s_iduser]?>&idioma=<?=$idioma?>" class="button">Editar dades</a><br>
			<a href="changepassword.php?id=<?=$_SESSION[s_iduser]?>&idioma=<?=$idioma?>" class="button">Canviar contrasenya</a>
			
			
		</div><!--one-third-->
		
			
		<? }//end while ?>
		
		
				
	
	</div><!--end container-->
</div><!--end bandtutor-->


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